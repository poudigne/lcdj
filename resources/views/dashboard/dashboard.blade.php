@extends('dashboard/layout')

@section('title', 'Page Title')

@section('left-menu')
	<ul class="right">
			<li><a href="Products">Products</a></li>
			<li><a href="#!">News</a></li>
		</ul>
		<ul id="slide-out" class="side-nav">
			<li><a href="Products">Products</a></li>
			<li><a href="#!">News</a></li>
		</ul>
		<a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
@stop

@section('dashboard/content')
      <div class="col s12 m5">
        <div class="card-panel teal">
          <span class="white-text">I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
          </span>
        </div>
      </div>
	  <div class="col s12 m5">
        <div class="card-panel teal">
          <span class="white-text">I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
          </span>
        </div>
      </div>
@stop