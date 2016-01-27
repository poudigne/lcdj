@extends('../dashboard/layout')

@section('title', 'Page Title')

@section('content')
    @if (isset($success) && $success == '1')
        <script type="text/javascript">
        </script>
    @endif


    <h2 class="header">Create new products</h2>
	<form method="post" action="{{ route('dashboard::product.create.post') }}" files="true" enctype="multipart/form-data">
        <!-- Titre du produit -->
        <div class="form-group row">
            <label for="product_title" class="col-sm-2 form-control-label">* Titre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="product_title" id="product_title" placeholder="Titre du produit">
            </div>
        </div>  

        <!-- Titre du produit -->
        <div class="form-group row">
            <label for="product_title" class="col-sm-2 form-control-label">Categorie</label>
            <div class="col-sm-10">
                <select id="example-getting-started" name="product_categories[]" multiple="multiple" class="form-control">
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach 
                </select>
            </div>
        </div>  

        <!-- Charger des images -->
        <div class="form-group row">
            <label for="product_title" class="col-sm-2 form-control-label">Upload images</label>
            <div class="col-sm-10">
                <input type="file" name="product_images[]" class="form-control" multiple>
            </div>
        </div> 
        <!-- Range du nombre de joueur --> 
        <div class="form-group row">
            <label for="product_title" class="col-sm-2 form-control-label">Nombre de joueurs</label>
            <div class="col-sm-10">
                <input type="text"  id="player_range" class="form-control slider" data-slider-value="[2,5]" data-slider-min="1" data-slider-max="15" />
                <span class="flavor-text" id="input-players"></span>
            </div>
        </div> 
    
        <!-- Range de l'age pour jouer -->
        <div class="form-group row">
            <label for="product_title" class="col-sm-2 form-control-label">Ages</label>
            <div class="col-sm-10">
                <input type="text" id="age_range" class="form-control slider" data-slider-value="[6,12]" data-slider-min="0" data-slider-max="50">
                <span class="flavor-text" id="input-age"></span>
            </div>
        </div> 
        
        <!-- Range de l'age pour jouer -->
        <div class="form-group row">
            <label for="product_title" class="col-sm-2 form-control-label">Description</label>
            <div class="col-sm-10">
                <textarea id="inputGameDescription" name="product_description" type="text" class="materialize-textarea form-control" placeHolder="Description"></textarea>
            </div>
        </div> 

		<div class="row">
            <div class="input-field col s6">
    			
            </div>
		</div>

        <input type="hidden" id="input-players-min" name="product_input-players-min" value="" />
        <input type="hidden" id="input-players-max" name="product_input-players-max" value="" />
        <input type="hidden" id="input-age-min" name="product_input-age-min" value="" />
        <input type="hidden" id="input-age-max" name="product_input-age-max" value="" />
        <button type="submit" class="btn btn-primary">Submit</button>
        {!! csrf_field() !!}
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
