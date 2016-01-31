@extends('dashboard/layout')

@section('title', 'Page Title')

@section('content')
  <style>

    .thumbnail{
      width:    300px;
      /*height:   400px;*/
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
      .top-spacer
      {
        margin-top: 15px;
      }
  </style>


  <h2 class="header">Inventory</h2>
<div class="row">
  <div class="col-lg-3 btn-group">
    <button type="button" class="btn btn-default" id="btn_action_create_product">Create new product</button>
  </div>

  <div class="col-lg-4 float-right">
    <div class="input-group">
        <input type="text" class="form-control" id="search-product" placeholder="Search for...">
        <span class="input-group-btn">
            <button id="btn-search" class="btn btn-default" type="button" href="{{ route('dashboard::inventory.search.post') }}">Go!</button>
        </span>
    </div>
  </div>

    <!-- Single button -->
    <div class="input-group  col-lg-2 float-right">
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
                @if (isset($sorttype))
                    @if ($sorttype == 0) A to Z @endif
                    @if ($sorttype == 1) Z to A @endif
                    @if ($sorttype == 2) Stock Asc @endif
                    @if ($sorttype == 3) Stock Desc @endif
                    @if ($sorttype == 4) Show 'out of stock' only @endif

                @else
                    Sort by ...
                @endif
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="{{ route('dashboard::inventory.sort',['sorttype' => 0]) }}">A to Z</a></li>
                <li><a href="{{ route('dashboard::inventory.sort',['sorttype' => 1]) }}">Z to A</a></li>
                <li><a href="{{ route('dashboard::inventory.sort',['sorttype' => 2]) }}">Stock Asc</a></li>
                <li><a href="{{ route('dashboard::inventory.sort',['sorttype' => 3]) }}">Stock Desc</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ route('dashboard::inventory.sort',['sorttype' => 4]) }}">Show 'out of stock' only</a></li>
            </ul>
        </div>
    </div>
</div>

<div id="product-content" class="row top-spacer">

@foreach ($products as $set)
  <div class="col-sm-5 col-lg-3" style="display:flex; flex-wrap: wrap;">
    <div class="thumbnail" data-field-id="{{ $set->id }}">
        {{-- <img data-holder-rendered="true" src="{{ $set->getMedia()->first()->getUrl() }}" style="height: 242px; width: 200px; display: block;" data-src="holder.js/100%x200" alt="100%x200"> --}}
      <img data-holder-rendered="true" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTUyODRlOTcwODAgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTI4NGU5NzA4MCI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44NTAwMDAzODE0Njk3MyIgeT0iMTA1LjciPjI0MngyMDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" style="height: 200px; width: 100%; display: block;" data-src="holder.js/100%x200" alt="100%x200">
      <div class="caption">
        <h4>{{ $set->title }}</h4>
        {{-- <p class="product-description"><small>{{ $set->description }}</small></p> --}}
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
            <button type="button" class=" btn-edit btn btn-xs btn-default glyphicon glyphicon-pencil" href="{{ route('dashboard::product.edit', ['id'=>$set->id]) }}" ></button>
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
        sendSearchRequest('dec', product_id);
    });
    $('.inv-inc').click(function(){
        var found = $(this).closest("div[data-field-id]");
        var product_id = found.attr('data-field-id')
        sendSearchRequest('inc', product_id);
    });
    var sendSearchRequest = function(modifier, product_id){
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

    $("#btn-search").click(function(){
        $.ajax({
            url: $(this).attr('href'),
            type: "post",
            data: {
                "keywords"  : $("#search-product").val(),
                "_token" : "{{ csrf_token() }}"
            },
            dataType: "json"
        }).done(function(data){
            $("#product-content").html("");
            console.log("length : "+ data.data.length)
            for(var i = 0, j =  data.data.length; i < j; ++i) {
                var product_data = data.data[i];
                card_html = ""
                $("#product-content").append(card_html);
            }
        }).fail(function(data) {
            console.log("fail");
        }).always(function(data) {
            console.log("always");
        });
    });

    var getStockString = function($quantity){
        var string = $quantity + " in stock";
        if ($quantity == 0)
            string = 'out of stock'
        return string;
    }

</script>

@stop