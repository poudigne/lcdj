@extends('layout')

@section('title', 'Page Title')


@section('content')
    <div class="container"">
    	<form method="post" action="">
    		<div css="form-group">
    			<label for="inputGameTitle">Game title</label>
    			<input id="inputGameTitle" name="Title" type="text" class="form-control" placeHolder="Title"/>
    		</div>

    		<div css="form-group">
    			<label for="inputGameCategory">Category</label>
    			<input id="inputGameCategory" name="Catergory" type="text" class="form-control" placeHolder="Category"/>
    		</div>
    		<div css="form-group">
    			<label for="inputGameCategory">Description</label>
    			<textarea id="" name="Catergory" type="text" class="form-control" placeHolder="Description"></textarea>
    		</div>
    	</form>
    </div>
@stop