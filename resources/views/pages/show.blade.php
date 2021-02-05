<!doctype html>
<html lang="en" prefix="og: http://ogp.me/ns#">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="theme-color" content="#1b2432" />
	<link rel="preconnect" href="https://fonts.gstatic.com"> {{--
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet"> --}}
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/assets/css/app.css">
	<title>{{ $filename }} - @app_name</title>
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<meta property="og:site_name" content="Imgfy" />
	<meta property="og:title" content="{{ $filename }}" />
	<meta property="og:description" content="Uploaded via imgfy.cf" />
	<meta property="og:url" content="{{$link}}" />
	<meta property="og:image" content="{{ $link }}" />
	<meta property="og:image:alt" content="{{ $filename }}" />
	<meta property="og:type" content="website" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:image" content="{{ $link }}" />
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
	(function(m, e, t, r, i, k, a) {
		m[i] = m[i] || function() {
			(m[i].a = m[i].a || []).push(arguments)
		};
		m[i].l = 1 * new Date();
		k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
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
	<div class="mx-auto">
		<div class="flex h-screen">
			<div class="m-auto">
				<div id="preview" class="p-5" style="cursor: -moz-zoom-in; cursor: -webkit-zoom-in; cursor: zoom-in;"> {{--
					<div id="preload" class="font-bold text-gray-200 animate-pulse"> loading </div> --}} <img id="image" class="h-auto" src="{{ $link }}" loading="lazy" alt="Image"> </div>
			</div>
		</div>
	</div>
	<script src="/assets/js/app.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js" integrity="sha512-m5kAjE5cCBN5pwlVFi4ABsZgnLuKPEx0fOnzaH5v64Zi3wKnhesNUYq4yKmHQyTa3gmkR6YeSKW1S+siMvgWtQ==" crossorigin="anonymous"></script>
	<script>
	$(document).ready(function() {
		$('#preview').zoom({
			on: "grab",
			magnify: 1.7,
			touch: false,
		});
	});
	</script>
</body>

</html>