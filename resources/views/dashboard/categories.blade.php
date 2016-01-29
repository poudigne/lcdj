@extends('dashboard/layout')

@section('title', 'Page Title')

@section('content')


<h2 class="header">List of categories</h2>

<div class="btn-group">
  <button type="button" class="btn btn-default" id="btn_action_create_category">Create new</button>
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a id="delete-request" data-field-link="{{ route('dashboard::category.delete.post') }}">Delete</a></li>
  </ul>
</div>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th data-field="delete"><input type="checkbox" id="check-all" value="0"/></th>
      <th data-field="title">Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categoryList as $set)
      <tr>
        <td style="width:3%;"><input type="checkbox" data-field-id="{{ $set->id }}" class="check-box" /></td>
        <td>{{ $set->name }}</td>
        <td>{{ $set->description }}</td>
      </tr>
    @endforeach
  </tbody>
</table>


<script type="text/javascript">

  $("#btn_action_create_category").on('click',function(){
    window.location.href = "{{ route('dashboard::category.create') }}";
  });

</script>

       
        
@stop