@extends('layout')

@section('title', 'Page Title')


@section('content')
    <div class="container"">
    TEST 2
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
    		 <div class="form-group">
		    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
		    <div class="input-group">
		      <div class="input-group-addon">$</div>
		      <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">
		      <div class="input-group-addon">.00</div>
		    </div>
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
    	</form>
    </div>
@stop