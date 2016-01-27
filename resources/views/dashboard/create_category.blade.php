@extends('dashboard/layout')

@section('title', 'Page Title')

@section('content')
  @if (isset($success) && $success == '1')
    <script type="text/javascript">
      Materialize.toast('Category added added !', 4000);
    </script>
  @endif
  <h2 class="header">Create new category</h2>
  <form method="post" action="{{ route('dashboard::create_category.post') }}">
    <!-- Nom de la categorie -->
    <div class="form-group row">
        <label for="category_name" class="col-sm-2 form-control-label">* Nom</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Nom de la catégorie">
        </div>
    </div>  

    <!-- Description de la categorie -->
    <div class="form-group row">
        <label for="category_description" class="col-sm-2 form-control-label">Description</label>
        <div class="col-sm-10">
            <textarea id="category_description" name="category_description" type="text" class="form-control" placeHolder="Description"></textarea>
        </div>
    </div>  
    <button type="submit" class="btn btn-primary">Submit</button>
    {!! csrf_field() !!}
  </form>
@stop