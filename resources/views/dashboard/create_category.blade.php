@extends('dashboard/layout')

@section('title', 'Page Title')

@section('content')
    <h2 class="header">Create new category</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

  <form method="post" action="{{ route('dashboard::category.create.post') }}">
    <!-- Nom de la categorie -->
    <div class="form-group row">
        <label for="category_name" class="col-sm-2 form-control-label">* Nom</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="category_name" name="category_name" value="{{ old('category_name') }}" placeholder="Nom de la catégorie">
        </div>
    </div>  

    <!-- Description de la categorie -->
    <div class="form-group row">
        <label for="category_description" class="col-sm-2 form-control-label">Description</label>
        <div class="col-sm-10">
            <textarea id="category_description" name="category_description" type="text" class="form-control" placeHolder="Description">{!! old("category_description") !!}</textarea>
        </div>
    </div>  
    <button type="submit" class="btn btn-primary">Submit</button>
    {!! csrf_field() !!}
  </form>
@stop