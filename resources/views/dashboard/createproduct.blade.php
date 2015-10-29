@extends('dashboard/layout')

@section('title', 'Page Title')

@section('content')
      @if (isset($success) && $success == '1')
        <script type="text/javascript">
          Materialize.toast('Product added successfuly!', 4000);
        </script>
      @endif
      
    	<form method="post" action="CreateProduct">
    		<div class="row">
                <div class="input-field col s6">
                    <input id="inputGameTitle" name="Title" type="text" class="form-control" placeHolder="Title"/>
                </div>
            </div>
    		<div class="row">
                <div class="input-field col s6">
                    <select>
                        @foreach ($categoryList as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach 
                    </select>
                </div>
    		</div>
    		<div class="row">
                <div class="input-field col s6">
        			<textarea id="inputGameDescription" name="Description" type="text" class="materialize-textarea" placeHolder="Description"></textarea>

                </div>
    		</div>
    		<div class="row">
                <div class="input-field col s6">
                    <input name="Price" type="text" class="form-control" id="InputAmount" placeholder="Amount">
                </div>
	        </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
      {!! csrf_field() !!}
    	</form>
@stop