@extends('dashboard/layout')

@section('title', 'Page Title')

@section('content')
@if (isset($deleted))
  @if ($deleted == '1')
    <script type="text/javascript">
      Materialize.toast('Category successfuly deleted !', 4000);
    </script>
  @else
    <script type="text/javascript">
      Materialize.toast('Error has occured : {{ $deleted }}', 4000);
    </script>
  @endif
@endif

<h2 class="header">List of categories</h2>
<a class="btn-floating disabled" href="/CreateCategory"><i class="small material-icons">add</i></a>
<table class="highlight responsive-table bordered">
  <thead>
    <tr>
      <th data-field="title">Name</th>
      <th data-field="description">Description</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categoryList as $set)
      <tr>
        <td>{{ $set->name }}</td>
        <td>{{ $set->description }}</td>
        <td>
          <a href="/Categories/delete/{{ $set->id }}" data-method="delete" data-request="Are you sure?">Delete</a>
          <a href=""></a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

       
        
@stop