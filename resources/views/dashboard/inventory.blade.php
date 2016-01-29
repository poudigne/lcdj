@extends('dashboard/layout')

@section('title', 'Page Title')

@section('content')
  <style>

    .thumbnail{
      width:    300px;
      height:   400px;
      overflow: auto;
    }

    .product-description {
      display:          block;
      height:           100px;
      padding-bottom:   3px;
      width:            100%;
    }

      .in-stock-text{
          height:       25px;
          line-height:  25px;
          margin:       0 0 0 3px;
      }
  </style>

<h2 class="header">Inventory</h2>

<div class="row">
  <div class="col-lg-3 btn-group">
    <button type="button" class="btn btn-default" id="btn_action_create_product">Create new product</button>
  </div>

  <div class="col-lg-4 float-right">
      <form method="POST" action="{{ route('dashboard::inventory.search.post') }}">
    <div class="input-group">

        <input type="text" class="form-control" id="search-product" placeholder="Search for...">
        <span class="input-group-btn">
            <button id="btn-search" class="btn btn-default" type="button">Go!</button>
        </span>
        {!! csrf_field() !!}
    </div>
      </form>

  </div>
</div>

  <div id="product-content" class="row">

@foreach ($products as $set)
  <div class="col-sm-5 col-lg-3" style="display:flex; flex-wrap: wrap;">
    <div class="thumbnail" data-field-id="{{ $set->id }}">
      <img data-holder-rendered="true" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTUyODRlOTcwODAgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTI4NGU5NzA4MCI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44NTAwMDAzODE0Njk3MyIgeT0iMTA1LjciPjI0MngyMDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" style="height: 200px; width: 100%; display: block;" data-src="holder.js/100%x200" alt="100%x200">
      <div class="caption">
        <h4>{{ $set->title }}</h4>
        <p class="product-description"><small>{{ $set->description }}</small></p>
        <div style="height: 25px;">
          <a class="inv-dec float-left btn btn-xs btn-default glyphicon glyphicon-minus" role="button"></a>
          <a class="inv-inc float-left btn btn-xs btn-default glyphicon glyphicon-plus" role="button"></a>
            <span class="in-stock-text"><small data-field-quantity="">
                @if ($set->inventory->quantity == 0)
                    out of stock
                @else
                    {{ $set->inventory->quantity }} in stock
                @endif
                </small></span>
          <div class="btn-group float-right">
            <button type="button" class="btn btn-xs btn-default" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
          </div>
        </div>
      </div>
    </div>
  </div>

@endforeach
    <div class="row">
      <div class="col-lg-12">
        {!! $products->render() !!}
      </div>
    </div>

</div>
<script type="text/javascript">
    $("#btn_action_create_product").on('click',function(){
        window.location.href = "{{ route('dashboard::product.create') }}";
    });

    $('.inv-dec').click(function(){
        // decrease quantity
        var found = $(this).closest("div[data-field-id]");
        var product_id = found.attr('data-field-id')
        sendAjaxRequest('dec', product_id);
    });
    $('.inv-inc').click(function(){
        var found = $(this).closest("div[data-field-id]");
        var product_id = found.attr('data-field-id')
        sendAjaxRequest('inc', product_id);
    });
    var sendAjaxRequest = function(modifier, product_id){
        var link = '';
        if (modifier == 'inc')
            link = '{{ route("dashboard::inventory.inc.post") }}'
        else if (modifier == 'dec')
            link = '{{ route("dashboard::inventory.dec.post") }}'

        $.ajax({
            url: link,
            type: "post",
            data: {
                "product_id"  : product_id,
                "_token" : "{{ csrf_token() }}"
            },
            dataType: "json"
        }).always(function(data) {
            var found = $(document).find("div[data-field-id='" + data.product_id+"']");

            $(found).find('[data-field-quantity]').html(getStockString(data.quantity));
        });
    };

    var getStockString = function($quantity){
        var string = $quantity + " in stock";
        if ($quantity == 0)
            string = 'out of stock'
        return string;
    }

</script>
@stop