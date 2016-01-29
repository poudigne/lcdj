@extends('../dashboard/layout')

@section('title', 'Page Title')

@section('content')

    <h2 class="header">Create new products</h2>

	<form method="post" action="{{ route('dashboard::product.edit.post', ['id' => $product->id]) }}" files="true" enctype="multipart/form-data">
        @include("dashboard.partials.product_form")
	</form>

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
    </script>
@stop
