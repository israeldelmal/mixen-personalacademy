<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Mixen: Boosting Brands">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link rel="icon" type="image/png" href="{{ asset('assets/images/icon.png') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>
<body>
	<div id="errors">
		<div>
			<h1>@yield('h1')</h1>
			<sub>Serás redirigido</sub>
		</div>
		<div style="background-image: url('{{ asset('assets/images/clases/fondo.jpg') }}');"></div>
	</div>
	<script>
		function redireccionarPagina() {
			window.location.href = "{{ url('/') }}";
		}

		setTimeout("redireccionarPagina()", 5000);
	</script>
</body>
</html>