@extends('dashboard/layout')

@section('title', 'Page Title')

@section('left-menu')

@stop

@section('dashboard/content')
      @if (isset($success) && $success == '1')
        <script type="text/javascript">
          Materialize.toast('Category added added !', 4000);
        </script>
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
@stop