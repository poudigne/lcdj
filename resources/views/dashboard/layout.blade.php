<html>
<head>
@include('../meta')

<style>
header, main, footer {
    padding-left: 240px;
  }

  @media only screen and (max-width : 992px) {
    header, main, footer {
      padding-left: 0;
    }
  }
</style>
</head>
<body>

	<div class="row">
		@include('dashboard/header')
	</div>
	<!--<div class="container">-->
		<div class='row'>

			<nav class="col s3">
				<ul class="right">
					<li><a href="/Products">Manage products</a></li>
					<li><a href="#!">Manage News</a></li>
				</ul>
				<ul id="slide-out" class="side-nav">
					<li><a href="/Products">Manage products</a></li>
					<li><a href="#!">Manage News</a></li>
				</ul>
				<a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
			</nav> 
			<div class="col s9">
				@yield('content')
			</div>
		</div>
	<!--</div>-->
	<div class='row'>
		@include('dashboard/footer')
	</div>
	<script type="text/javascript">
		$('.button-collapse').sideNav();
	</script>
</body>
</html>

