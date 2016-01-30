@extends('../dashboard/layout')

@section('title', 'Page Title')

@section('content')

    <h2 class="header">Create new products</h2>

	<form method="post" action="{{ route('dashboard::product.edit.post', ['id' => $product->id]) }}" files="true" enctype="multipart/form-data">
        @include("dashboard.partials.product_form")
	</form>
    {{-- dd($product->getMedia()) --}}
    <div id="medias-thumbnail" class="row">
    @foreach($product->getMedia() as $media)
        <div class="col-sm-5 col-lg-3" style="display:flex; flex-wrap: wrap;">
            <div class="thumbnail" data-field-product="{{ $product->id }}" data-field-media="{{ $media->id }}">
                <img data-holder-rendered="true" src="{{ $media->getUrl() }}" style="width: 100%; display: block;"  alt="100%x200">
                <button type="button" class="btn-delete-image btn btn-default btn-xs btn-edit glyphicon glyphicon-trash" href="{{ route('dashboard::product.delete.media.post') }}" />
            </div>
        </div>
    @endforeach
    </div>

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
            $(this).find("button").css('visibility', 'visible')
        },function(){
            $(this).find("button").css('visibility', 'hidden')
        });

        $("button.btn-delete-image").click(function(){
            var link = $(this).attr('href');
            var media_id = $(this).parents().closest('div[data-field-media]').attr('data-field-media');
            var product_id = $(this).parents().closest('div[data-field-product]').attr('data-field-product');
            $.ajax({
                url: link,
                type: "post",
                data: {
                    "product_id"  : product_id,
                    "media_id"  : media_id,
                    "_token" : "{{ csrf_token() }}"
                },
                dataType: "json"
            }).done(function(response){
                toastr["success"]("The "+response.model_type+" has been successfuly deleted!","Success !");
            }).fail(function(response){
                toastr["error"]("{{ session('error') }}","Error !");
            }).always(function(response) {
                $("#medias-thumbnail").find("div.thumbnail[data-field-media='"+response+"']").parent().remove();
            });
        });
    </script>
@stop
