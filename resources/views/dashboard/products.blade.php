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
      <th data-field="delete"><input type="checkbox" id="check-all" value="0"/></th>
      <th data-field="title">Name</th>
      <th data-field="description">Description</th>
      <th data-field="player_range">Nombre de joueur</th>
      <th data-field="age_range">Ages</th>
      <th data-field="category_id">Item Category</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($products as $set)
      <tr>
        <td style="width:3%;"><input type="checkbox" data-field-id="{{ $set['product']->id }}" class="check-product" /></td>
        <td>{{ $set['product']->title }}</td>
        <td>{{ $set['product']->description }}</td>
        <td>{{ $set['product']->min_player }} à {{ $set['product']->max_player }}</td>
        <td>
          @if ($set['product']->max_age >= 18)
            {{ $set['product']->min_age }} ans et +
          @else
            {{ $set['product']->min_age }} à {{ $set['product']->max_age }} ans
          @endif
        </td>
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

  $("#check-all").click(function(){
    var is_checked = $(this).prop('checked');
    $(".check-product").each(function(){
      $(this).prop('checked', is_checked);
    });
  });
  $(".check-product").change(function() {
    var product_id = $(this).attr("data-field-id");
    if (this.checked){
      bulk_action_json.push(product_id)
    }
    else{
      for(var i = 0, j = bulk_action_json.length; i < j; ++i) {
        if (bulk_action_json[i] == product_id){
          bulk_action_json.splice(i, 1);
          break;
        }
      }
    }
  });


  var bulk_action_json = [];

</script>
@stop