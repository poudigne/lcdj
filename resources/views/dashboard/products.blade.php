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
<a class="btn-floating disabled" href="/CreateProduct"><i class="small material-icons">add</i></a>
<table class="highlight responsive-table bordered">
  <thead>
    <tr>
      <th data-field="title">Name</th>
      <th data-field="description">Description</th>
      <th data-field="price">Item Price</th>
      <th data-field="category_id">Item Category</th>
      <th data-field="action">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($products as $set)
      <tr>
        <td>{{ $set->title }}</td>
        <td>{{ $set->description }}</td>
        <td>{{ $set->price }}</td>
        <td>{{ $set->name }}</td>
        <td>
          <a href="/Products/delete/{{ $set->id }}" data-method="delete" data-request="Are you sure?">Delete</a>
          <a href=""></a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

       
        
@stop