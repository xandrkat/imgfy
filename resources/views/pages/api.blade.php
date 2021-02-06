<!doctype html>
<html lang="en" prefix="og: http://ogp.me/ns#">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#1b2432" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/app.css">

    <title>API - @app_name</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode
                .insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
        ym(71457547, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/71457547" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
</head>

<body class="bg-gray-800">
    
    @include('includes.header')

    <div class="container px-4 mx-auto">
        <div class="flex justify-center items-center">
            <div class="max-w-2xl w-full text-gray-300 text-xs mt-4">

                <div class="mt-4 font-bold text-xl">
                    Upload Images
                </div>

                <div class="mt-3 bg-gray-900 bg-opacity-30 p-3 rounded-md">
                    <div class="font-bold text-sm uppercase">Endpoint</div>
                    <div class="mt-2 bg-purple-600 font-bold rounded-md px-3 py-2 text-sm">
                        <code>
                            <pre>POST: /api/v1/upload</pre>
                        </code>
                    </div>

                    <div class="font-bold mt-3 text-sm uppercase">Parameters</div>
                    <div class="mt-2 mb-4"><strong class="px-2 py-1 bg-purple-600 rounded-md mr-1">images</strong> Form-data
                        files, max. 10 files.</div>
                    <div class="mt-2 mb-2"><strong class="px-2 py-1 bg-purple-600 rounded-md mr-1">secret</strong> Make
                        super-secretly link. [Optional]</div>

                    <div class="mt-4">For PHP you can use <a href="https://github.com/chipslays/imgfy-api"
                            target="_blank" class="font-bold hover:underline">this wrapper</a>.</div>
                </div>


            </div>
        </div>
    </div>

    @include('includes.footer')

</body>

</html>