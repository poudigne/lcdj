@extends('dashboard/layout')

@section('title', 'Page Title')

@section('content')
@if (isset($deleted))
  @if ($deleted == '1')
    <script type="text/javascript">
      Materialize.toast('Product successfuly deleted !', 4000);
    </script>
  @else
    <script type="text/javascript">
      Materialize.toast('Error has occured : {{ $deleted }}', 4000);
    </script>
  @endif
@endif

<h2 class="header">List of products</h2>

<div class="btn-group">
  <button type="button" class="btn btn-default" id="btn_action_create_product">Create new</button>
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="#">Delete</a></li>
    <li><a href="#">Publish</a></li>
    <li><a href="#">Unpublish</a></li>
  </ul>
</div>



<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th data-field="delete"><input type="checkbox" class="delete_product" /></th>
      <th data-field="title">Name</th>
      <th data-field="description">Description</th>
      <th data-field="player_range">Nombre de joueur</th>
      <th data-field="age_range">Ages</th>
      <th data-field="category_id">Item Category</th>
      <th data-field="action">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($products as $set)
      <tr>
        <td style="width:3%;"><input type="checkbox" value="{{ $set['product']->id }}" class="delete_product" /></td>
        <td>{{ $set['product']->title }}</td>
        <td>{{ $set['product']->description }}</td>
        <td>{{ $set['product']->min_player }} à {{ $set['product']->max_player }}</td>
        <td>
          @if ($set['product']->max_age > 18)
            {{ $set['product']->min_age }} ans et +
          @else
            {{ $set['product']->min_age }} à {{ $set['product']->max_age }} ans
          @endif
        </td>
        <td></td>
        <td>
          @foreach($set['categories'] as $cat)
            {{ $cat->name }},
          @endforeach
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<script type="text/javascript">
  $("#btn_action_create_product").on('click',function(){
    window.location.href = "{{ route('dashboard::product.create') }}";
  });
</script>
@stop