<div class="col s4">
	<nav>
		<ul class="right hide-on-med-and-down">
			<li><a href="#!">First Sidebar Link</a></li>
			<li><a href="#!">Second Sidebar Link</a></li>
		</ul>
		<ul id="slide-out" class="side-nav">
			<li><a href="#!">First Sidebar Link</a></li>
			<li><a href="#!">Second Sidebar Link</a></li>
		</ul>
		<a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
	</nav>
</div>
<script type="text/javascript">
$(".button-collapse").sideNav();

$('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      edge: 'right', // Choose the horizontal origin
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
  );
</script>