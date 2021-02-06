<?php

use Container\Container as App;
use Chipslays\Telegraph\Telegraph;

// TODO вынести все в контроллеры

$app->router()->get('/', function () {
    App::render('pages/index', [
        'totalImagesCount' => number_format(App::db()->table('images')->count(), 0, '', ' '),
    ]);
});

$app->router()->get('/terms', function () {
    App::render('pages/terms', [
        'totalImagesCount' => number_format(App::db()->table('images')->count(), 0, '', ' '),
    ]);
});

$app->router()->get('/api', function () {
    App::render('pages/api', [
        'totalImagesCount' => number_format(App::db()->table('images')->count(), 0, '', ' '),
    ]);
});

$app->router()->post('/upload/', function () {
    $headers = getallheaders();

    if (
        (strpos(@$headers['Referer'], 'image.chipslays.ru') === false && strpos(@$headers['Referer'], 'imgfy.cf') === false)
        || (strpos(@$headers['Origin'], 'image.chipslays.ru') === false  && strpos(@$headers['Origin'], 'imgfy.cf') === false)
        || (strpos(@$headers['Host'], 'image.chipslays.ru') === false && strpos(@$headers['Host'], 'imgfy.cf') === false)
        || strpos(@$headers['Content-Type'], 'multipart/form-data') === false
        || trim(@$headers['User-Agent']) == ''
    ) {
        return [
            'ok' => false,
            'error' => 'Something wrong',
        ];
    }

    $file = array_shift($_FILES);

    if (substr($file['type'], 0, 6) !== 'image/') {
        return [
            'ok' => false,
            'error' => 'Invalid image format',
        ];
    }

    if ($file['size'] > (int) 5e+6) {
        return [
            'ok' => false,
            'error' => 'Invalid image size',
        ];
    }

    $filepond = json_decode($_REQUEST['filepond']);

    if (@$filepond->secret == 'Y') {
        $code = getRandomCode(1, range('a', 'z')) . ':' . getRandomCode(12);
        while (App::db()->table('images')->where('code', $code)->exists()) {
            $code = getRandomCode(1, range('a', 'z')) . ':' . getRandomCode(12);
        }
    } else {
        $code = incrementAphanumeric(App::db()->table('code')->where('id', 1)->first()->code);
        while (App::db()->table('images')->where('code', $code)->exists()) {
            $code = incrementAphanumeric($code);
        }
        App::db()->table('code')->where('id', 1)->update([
            'code' => $code,
        ]);
    }

    $links = Telegraph::upload($file['tmp_name']);
    $exploded = explode('.ph', $links[0]);
    $fileId = end($exploded);
    
    $insert = [
        'filename' => $file['name'],
        'code' => $code,
        'file_id' => $fileId,
        'author' => null,
        'date' => time(),
    ];

    App::db()->table('images')->insert($insert);

    bot()->sendMessage('436432850', "#WEB\n" . getUrl() . "/{$code}");

    return [
        'ok' => true,
        'link' => getUrl() . "/{$code}",
        'result' => $insert,
    ];
});

// TODO: объединить повторяющийся код web-upload с api-upload
$app->router()->post('/api/v1/upload/', function () {
    if ($_FILES === []) {
        return [
            'ok' => false,
            'error' => 'Image missed',
        ];
    }

    $countMax = 10;
    if (count($_FILES) > $countMax) {
        return [
            'ok' => false,
            'error' => "Allowed max. {$countMax} images per request",
        ];
    }

    $result = [];

    while($file = array_shift($_FILES)) {
        if (substr($file['type'], 0, 6) !== 'image/') {
            $result[] =  [
                'filename' => $file['name'],
                'error' => 'Invalid image format',
            ];
            continue;
        }
    
        if ($file['size'] > (int) 5e+6) {
            $result[] =  [
                'filename' => $file['name'],
                'error' => 'Invalid image size',
            ];
            continue;
        }
    
        $secret = !empty($_REQUEST['secret']);
    
        if ($secret) {
            $code = getRandomCode(1, range('a', 'z')) . ':' . getRandomCode(12);
            while (App::db()->table('images')->where('code', $code)->exists() && $code == 'upload') {
                $code = getRandomCode(1, range('a', 'z')) . ':' . getRandomCode(12);
            }
        } else {
            $code = incrementAphanumeric(App::db()->table('code')->where('id', 1)->first()->code);
            while (App::db()->table('images')->where('code', $code)->exists() && $code == 'upload') {
                $code = incrementAphanumeric($code);
            }
            App::db()->table('code')->where('id', 1)->update([
                'code' => $code,
            ]);
        }
    
        $links = Telegraph::upload($file['tmp_name']);
        $exploded = explode('.ph', $links[0]);
        $fileId = end($exploded);
        
        $insert = [
            'filename' => $file['name'],
            'code' => $code,
            'file_id' => $fileId,
            'author' => null,
            'date' => time(),
        ];
    
        App::db()->table('images')->insert($insert);
    
        bot()->sendMessage('436432850', "#API\n" . getUrl() . "/{$code}");

        $result[] =  [
            'filename' => $file['name'],
            'preview' => getUrl() . "/{$code}",
            'source' => getUrl() . $fileId,
        ];
    }

    return [
        'ok' => true,
        'result' => $result,
    ];
});

$app->router()->get('/api/v1/ping/', function () {
    return ['pong'];
});

$app->router()->get('/file/{fileId}', function ($fileId = null) {
    header("Location: https://telegra.ph/file/{$fileId}", true, 200);
    die;
});

$app->router()->get('/{code}', function ($code = null) {
    $image = App::db()->table('images')->select('filename', 'file_id')->where('code', $code)->first();

    if (!$image) {
        header("Location: /", true, 200);
        die;
    }

    App::render('pages/show', [
        'filename' => $image->filename,
        'link' => getUrl() . $image->file_id,
    ]);
});

function getUrl()
{
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
}

function getRandomCode(int $lenght = 6, array $chars = null)
{
    $chars = !$chars ? array_merge(range('a', 'z'), range('A', 'Z'), range(0, 1)) : $chars;

    shuffle($chars);

    $code = '';
    for ($i = 0; $i < $lenght; $i++) {
        $code .= $chars[array_rand($chars)];
    }

    return $code;
}

function incrementAphanumeric($string, $position = false)
{
    if (false === $position) {
        $position = strlen($string) - 1;
    }
    $increment_str = substr($string, $position, 1);
    switch ($increment_str) {
        case '9':
            $string = substr_replace($string, 'a', $position, 1);
            break;
        case 'z':
            if (0 === $position) {
                $string = substr_replace($string, '0', $position, 1);
                $string .= '0';
            } else {
                $inc_position = $position - 1;
                $string = incrementAphanumeric($string, $inc_position);
                $string = substr_replace($string, '0', $position, 1);
            }
            break;

        default:
            $increment_str++;
            $string = substr_replace($string, $increment_str, $position, 1);
            break;
    }
    return $string;
}

$app->router()->set404(function () {
    header("Location: /", true, 200);
    die;
});
