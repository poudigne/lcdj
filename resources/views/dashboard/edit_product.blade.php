@extends('../dashboard/layout')

@section('title', 'Page Title')

@section('content')

    <h2 class="header">Create new products</h2>

	<form method="post" action="{{ route('dashboard::product.edit.post', ['id' => $product->id]) }}" files="true" enctype="multipart/form-data">
        @include("dashboard.partials.product_form")
	</form>
    {{-- dd($product->getMedia()) --}}
    @foreach($product->getMedia() as $media)
        <div class="col-sm-5 col-lg-3" style="display:flex; flex-wrap: wrap;">
            <div class="thumbnail" data-field-id="{{ $product->id }}">
                <img data-holder-rendered="true" src="{{ $media->getUrl() }}" style="width: 100%; display: block;"  alt="100%x200">
                <button type="button" class="btn-delete-image btn btn-default btn-xs btn-edit glyphicon glyphicon-pencil" href="{{ route('dashboard::product.edit', ['id'=>$media->id]) }}" />
            </div>
        </div>
    @endforeach
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example-getting-started').multiselect();
            var player_range = $("input#player_range").bootstrapSlider()
                .on('slide', update_player_number)
                .data('slider_player');
            var age_range = $("input#age_range").bootstrapSlider()
                .on('slide', update_age_number)
                .data('slider_age');

            update_player_number();
            update_age_number();

        });
        var update_range = function(elementId, rangeValue, customText){
            var values = rangeValue.split(",")
            $(elementId+"-min").val(values[0]);
            $(elementId+"-max").val(values[1]);
            $(elementId).html(customText.replace('%min',values[0]).replace('%max',values[1]));
        };
        var update_player_number = function() {
            update_range("#input-players", player_range.value, "%min à %max joueurs");
        };
        var update_age_number = function() {
            update_range("#input-age", age_range.value, "%min à %max ans");
        };
        $(".thumbnail").hover(function(){
            $(this).closest(" ")
        })
    </script>
@stop
