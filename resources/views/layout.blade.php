<html>
<head>
@include('meta')
</head>
<body style="background-color:#e6eff2">
	@include('menu')
	@include('header')
	<main>
		<div class="container">
			<div class='row'>
				<div class="col s12 m9 l10">
					@yield('content')
				</div>
			</div>
		</div>
	</main>
	<div class='row'>
		@include('footer')
	</div>
</body>
</html>

