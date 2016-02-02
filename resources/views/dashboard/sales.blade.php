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
  <button type="button" class="btn btn-default" id="btn_action_create_sale" data-field-link="">Create new</button>
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a id="delete-request" data-field-link="{{ route('dashboard::sale.delete.post') }}">Delete</a></li>
  </ul>
</div>



<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th data-field="delete"><input type="checkbox" id="check-all" value="0"/></th>
      <th></th>
      <th data-field="title">Name</th>
      <th data-field="description">Description</th>
      <th data-field="player_range">Nombre de joueur</th>
      <th data-field="age_range">Ages</th>
      <th data-field="category_id">Item Category</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($sales as $set)
      <tr class="@if ($set->is_published == 0) warning @endif">
        <td style="width:3%;"><input type="checkbox" data-field-id="{{ $set->id }}" class="check-box" /></td>
        <td style="width:3%;"><button type="button" class="btn btn-default btn-xs btn-edit glyphicon glyphicon-pencil" href="{{ route('dashboard::sale.edit', ['id'=>$set->id]) }}"></button></td>
        <td>{{ $set->title }}</td>
        <td>{{ $set->description }}</td>
        <td>{{ $set->min_player }} à {{ $set->max_player }}</td>
        <td>
          @if ($set->max_age >= 18)
            {{ $set->min_age }} ans et +
          @else
            {{ $set->min_age }} à {{ $set->max_age }} ans
          @endif
        </td>
        <td>

        </td>
      </tr>
    @endforeach
  </tbody>
</table>

<div class="row">
  <div class="col-lg-12">
    {!! $sales->render() !!}
  </div>
</div>
<script type="text/javascript">
  $("#btn_action_create_sale").on('click',function(){
    window.location.href = "{{ route('dashboard::sale.create') }}";
  });

</script>
@stop