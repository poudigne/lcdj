@extends('layout')

@section('title', 'Page Title')


@section('content')
    <div class="container"">
      @if (isset($success) && $success == '1')
        <p>Category added added !</p>
      @endif
      
    	<form method="post" action="CreateCategory">
    		<div css="form-group">
    			<label for="inputGameTitle">Category</label>
    			<input id="inputGameTitle" name="Name" type="text" class="form-control" placeHolder="Title"/>
    		</div>
    		<div css="form-group">
    			<label for="inputGameCategory">Description</label>
    			<textarea id="" name="Description" type="text" class="form-control" placeHolder="Description"></textarea>
    		</div>
		  	<button type="submit" class="btn btn-primary">Submit</button>
     	 	{!! csrf_field() !!}
    	</form>
    </div>
@stop