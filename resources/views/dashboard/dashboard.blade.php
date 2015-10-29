@extends('dashboard/layout')

@section('title', 'Page Title')

@section('content')
<div class="col s6 m4" id="card-product">
    <div class="card-panel teal hoverable">
      <i class="large mdi-action-assignment-ind"></i>
      <h5 class="center-align white-text">Manage your product here</h5>
    </div>
</div>
<div class="col s6 m4" id="card-news">
  <div class="card-panel teal hoverable">
    <i class="large mdi-action-assignment-ind"></i>
    <h5 class="center-align white-text">Manage your news here</h5>
  </div>
</div>

<script type="text/javascript">
$("#card-product").on('click',function(){
  window.location.href = "/Products";
});

$("#card-news").on('click',function(){
  window.location.href = "/CreateProduct";
});
</script>
@stop