@extends('dashboard/layout')

@section('title', 'Page Title')

@section('content')
      @if (isset($success) && $success == '1')
        <script type="text/javascript">
          Materialize.toast('Category added added !', 4000);
        </script>
      @endif
      
    	<form method="post" action="CreateCategory">
    		<div class="row">
          <div class="col s6">
      			<input id="inputCategoryName" name="categoryName" type="text" class="form-control" placeHolder="Category"/>
          </div>
    		</div>
    		<div class="row">
          <div class="input-field col s6">
            <textarea id="inputGameDescription" name="categoryDescription" type="text" class="materialize-textarea" placeHolder="Description"></textarea>
          </div>
        </div>
		  	<button type="submit" class="btn btn-primary">Submit</button>
     	 	{!! csrf_field() !!}
    	</form>
@stop