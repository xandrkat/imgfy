<!doctype html>
<html lang="en" prefix="og: http://ogp.me/ns#">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="google" content="notranslate">
	<meta name="theme-color" content="#1b2432" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700;800;900&display=swap"
		rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
	<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
	<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
		rel="stylesheet">
	<link href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css" rel="stylesheet">
	<link rel="stylesheet" href="/assets/css/app.css">
	<title>@app_name</title>
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<meta property="og:site_name" content="Imgfy" />
	<meta property="og:title" content="IMGFY" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:url" content="https://imgfy.cf/" />
	<meta property="og:description" content="Forever free & unlimited service for storage images." />
	<meta property="og:image" content="https://imgfy.cf/s:Vwn1oWiaUqnn" />
	<meta property="og:type" content="website" />
	<style>
		.filepond--panel-root {
			background-color: #1b2432 !important;
		}

		.filepond--drip-blob {
			background-color: #141b25 !important;
		}

		.filepond--image-preview {
			background-color: #111720 !important;
		}

		[data-filepond-item-state='processing-complete'] .filepond--item-panel {
			background-color: rgb(97, 165, 97) !important;
		}

		.bg-dark-gray {
			background-color: #141b25;
		}

		/* для элемента input c type="checkbox" */

		.custom-checkbox {
			position: absolute;
			z-index: -1;
			opacity: 0;
		}

		/* для элемента label, связанного с .custom-checkbox */

		.custom-checkbox+label {
			display: inline-flex;
			align-items: center;
			user-select: none;
		}

		/* создание в label псевдоэлемента before со следующими стилями */

		.custom-checkbox+label::before {
			content: '';
			display: inline-block;
			width: 1em;
			height: 1em;
			flex-shrink: 0;
			flex-grow: 0;
			border: 2px solid #8b5cf6;
			border-radius: 0.25em;
			margin-right: 0.5em;
			background-repeat: no-repeat;
			background-position: center center;
			background-size: 50% 50%;
		}

		/* стили при наведении курсора на checkbox */

		.custom-checkbox:not(:disabled):not(:checked)+label:hover::before {
			border-color: rgb(136, 102, 216);
		}

		/* стили для активного чекбокса (при нажатии на него) */

		.custom-checkbox:not(:disabled):active+label::before {
			background-color: rgb(165, 133, 240);
			border-color: rgb(137, 107, 209);
		}

		/* стили для чекбокса, находящегося в фокусе */

		.custom-checkbox:focus+label::before {
			box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
		}

		/* стили для чекбокса, находящегося в фокусе и не находящегося в состоянии checked */

		.custom-checkbox:focus:not(:checked)+label::before {
			border-color: rgb(165, 133, 240);
		}

		/* стили для чекбокса, находящегося в состоянии checked */

		.custom-checkbox:checked+label::before {
			border-color: rgb(139, 92, 246);
			background-color: rgb(139, 92, 246);
			background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%23fff' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26 2.974 7.25 8 2.193z'/%3e%3c/svg%3e");
		}

		/* стили для чекбокса, находящегося в состоянии disabled */

		.custom-checkbox:disabled+label::before {
			background-color: rgb(165, 133, 240);
		}
	</style>
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
		(function (m, e, t, r, i, k, a) {
			m[i] = m[i] || function () {
				(m[i].a = m[i].a || []).push(arguments)
			};
			m[i].l = 1 * new Date();
			k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k,
				a)
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
			<div class="w-96">
				<div
					class="hidden sm:block my-5 md:my-8 text-center bg-clip-text text-transparent bg-gradient-to-r from-green-400 via-blue-500 to-purple-500">
					<div class="text-6xl font-black tracking-tighter">IMGFY</div>
					<div class="text-sm">upload something awesome</div>
				</div>
				<input type="file" class="mt-4 sm:mt-0">
				<div id="secret-toggler" class="text-center mb-4">
					<div
						class="focus:outline-none relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
						<input type="checkbox" name="secret" id="secret"
							class="focus:outline-none toggle-checkbox absolute block w-5 h-5 rounded-full border-gray-900 border-opacity-50 border-4 appearance-none cursor-pointer bg-gray-50" />
						<label for="secret"
							class="toggle-label block overflow-hidden h-5 rounded-full bg-gray-700 cursor-pointer"></label>
					</div>
					<label for="secret" class=" text-sm text-gray-500">Make super secret link</label>
				</div> {{--
				<div class="checkbox mb-2 text-center">
					<input class="custom-checkbox" type="checkbox" id="secret" name="secret">
					<label for="secret" class=" text-sm text-gray-500">Make super secret link</label>
				</div> --}}
				<div id="wrapper" class="hidden">
					<div class="flex">
						<input readonly type="text" name="link" id="link"
							class="mr-2 focus:outline-none transform transition duration-200 focus:ring-4 focus:ring-purple-500 text-gray-200 w-full px-5 py-2 rounded-md bg-dark-gray"
							placeholder="https://example.com/image.jpg">
						<a id="open" href="#" target="_blank"
							class="flex-auto focus:outline-none transform transition duration-200 hover:bg-opacity-100 hover:shadow-xl focus:ring-4 focus:ring-purple-500 focus:ring-opacity-60 rounded-md bg-dark-gray bg-opacity-80 px-5 py-2 text-white font-bold">
							<svg class="w-5 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
								xmlns="http://www.w3.org/2000/svg">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
								</path>
							</svg>
						</a>
					</div>
					<button id="copy" class="mt-4 w-full focus:outline-none transform transition duration-200 hover:bg-opacity-100 hover:shadow-xl focus:ring-4 focus:ring-purple-500 focus:ring-opacity-60 rounded-md bg-purple-500 bg-opacity-80 px-5 py-2 text-white font-bold">
						copy
					</button>

					<div class="flex justify-center mt-4">
						<a href="/" class="text-center text-gray-500 hover:text-purple-400">
							<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('includes.footer')

	<script src="/assets/js/app.js"></script>
	<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js">
	</script>
	<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js">
	</script>
	<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
	<script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
	<script src="https://unpkg.com/filepond-plugin-file-metadata/dist/filepond-plugin-file-metadata.js"></script>
	<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.3/dist/confetti.browser.min.js"></script>
	<script>
		$(document).ready(function () {
			$('#secret').change(function () {
				pond.setOptions({
					fileMetadataObject: {
						'secret': this.checked,
					},
				});
			});
		});
		FilePond.registerPlugin(FilePondPluginFileValidateType);
		FilePond.registerPlugin(FilePondPluginFileValidateSize);
		FilePond.registerPlugin(FilePondPluginImagePreview);
		FilePond.registerPlugin(FilePondPluginImageEdit);
		FilePond.registerPlugin(FilePondPluginFileMetadata);
		const inputElement = document.querySelector('input[type="file"]');
		const pond = FilePond.create(inputElement, {
			credits: false,
		});
		pond.setOptions({
			credits: false,
			fileMetadataObject: {
				'secret': false,
			},
			server: {
				process: {
					url: './upload/',
					method: 'POST',
					withCredentials: false,
					onload: (response) => {
						response = JSON.parse(response);
						if (response.ok) {
							$("#link").val(response.link);
							$("#open").attr('href', response.link);
							$("#wrapper").removeClass('hidden');
							setTimeout(() => {
								$("#copy").addClass('scale-105')
							}, 100);
							setTimeout(() => {
								$("#copy").removeClass('scale-105').addClass('scale-95');
							}, 300);
							setTimeout(() => {
								$("#copy").removeClass('scale-95');
							}, 450);
						} else {
							console.log(response);
						}
					},
				},
			},
			onaddfile: (file) => {
				$("#wrapper").addClass('hidden');
				$("#open").attr('href', '#');
				$("#secret-toggler").addClass('hidden');
			},
			instantUpload: true,
			dropOnPage: true,
			allowRevert: false,
			allowRemove: true,
			allowProcess: true,
			allowReorder: false,
			maxFileSize: '5MB',
			maxTotalFileSize: '5MB',
			acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'],
			labelIdle: 'Drag & drop or paste <code>(ctrl+v)</code><div class="font-bold cursor-pointer">Browse image</div>',
			fileValidateTypeLabelExpectedTypes: "File must be Image"
			// labelFileTypeNotAllowed: 'Неверный формат файла',
			// labelMaxFileSizeExceeded: 'Файл слишком большой',
			// labelMaxTotalFileSizeExceeded: 'Файл слишком большой',
			// labelMaxFileSize: 'Максимальный размер файла {filesize}',
			// labelMaxTotalFileSizeExceeded: 'Максимальный размер файла {filesize}',
			// labelFileProcessing: 'Загрузка',
			// labelFileProcessingComplete: 'Загрузка завершена',
			// labelFileProcessingAborted: 'Отменено',
			// labelFileProcessingError: 'Ошибка загрузки',
			// labelFileProcessingError: 'Ошибка отмены',
			// labelFileRemoveError: 'Ошибка удаления',
			// labelTapToCancel: 'Нажми, чтобы завершить',
			// labelTapToRetry: 'Нажми, чтобы повторить',
			// labelTapToUndo: 'Нажми, чтобы отменить',
			// labelButtonRemoveItem: 'Удалить',
			// labelButtonAbortItemLoad: 'Остановить',
			// labelButtonRetryItemLoad: 'Повторить',
			// labelButtonAbortItemProcessing: 'Отмена',
			// labelButtonUndoItemProcessing: 'Отмена',
			// labelButtonRetryItemProcessing: 'Повторить',
			// labelButtonProcessItem: 'Загрузить',
		});
		var copyTimeout;
		var buttonAnimation1;
		var buttonAnimation2;
		var buttonAnimation3;

		function copy() {
			this.innerHTML = "copied!";
			var copyText = document.querySelector("#link");
			copyText.select();
			document.execCommand("copy");
			clearTimeout(buttonAnimation1);
			clearTimeout(buttonAnimation2);
			clearTimeout(buttonAnimation3);
			$("#copy").addClass('scale-95')
			buttonAnimation1 = setTimeout(() => {
				$("#copy").removeClass('scale-95').addClass('scale-105')
			}, 150);
			buttonAnimation2 = setTimeout(() => {
				$("#copy").removeClass('scale-105').addClass('scale-95');
			}, 350);
			buttonAnimation3 = setTimeout(() => {
				$("#copy").removeClass('scale-95');
			}, 500);
			clearTimeout(copyTimeout);
			copyTimeout = setTimeout(() => {
				this.innerHTML = "copy";
			}, 2000);
			fire(0.25, {
				spread: 26,
				startVelocity: 55,
			});
			fire(0.2, {
				spread: 60,
			});
			fire(0.35, {
				spread: 100,
				decay: 0.91,
				scalar: 0.8
			});
			fire(0.1, {
				spread: 120,
				startVelocity: 25,
				decay: 0.92,
				scalar: 1.2
			});
			fire(0.1, {
				spread: 120,
				startVelocity: 45,
			});
		}
		document.querySelector("#copy").addEventListener("click", copy);
		var count = 200;
		var defaults = {
			origin: {
				y: 0.7
			}
		};

		function fire(particleRatio, opts) {
			confetti(Object.assign({}, defaults, opts, {
				particleCount: Math.floor(count * particleRatio)
			}));
		}
	</script>
</body>

</html>