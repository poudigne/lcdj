<html>
<head>
@include('../meta')
<body>
	<header>
		@include('dashboard/header')
		<div class="row">
			<ul id="slide-out" class="side-nav fixed">
				<li><a href="#!">First Sidebar Link</a></li>
				<li><a href="#!">Second Sidebar Link</a></li>
			</ul>
			<!--<a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>-->
		</div>
	</header>
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
		@include('dashboard/footer')
	</div>
	<script type="text/javascript">
		$(function(){
			// $('.button-collapse').sideNav();
			// $('.button-collapse').sideNav('show');
		}); // end of document ready
	</script>
</body>
</html>

