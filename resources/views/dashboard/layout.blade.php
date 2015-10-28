<html>
<head>
@include('../meta')
</head>
<body>
	<div id="container">
		<div class="row">
			@include('dashboard/header')
		</div>
		<div class='row'>
			@include('dashboard/menu')
			@include('dashboard/content')
		</div>
		<div class='row'>
			@include('dashboard/footer')
		</div>
	</div>
</body>
</html>