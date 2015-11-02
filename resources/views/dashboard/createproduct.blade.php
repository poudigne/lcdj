@extends('dashboard/layout')

@section('title', 'Page Title')

@section('content')
      @if (isset($success) && $success == '1')
        <script type="text/javascript">
          Materialize.toast('Product added successfuly!', 4000);
        </script>
      @endif
      <h2 class="header">Create new products</h2>
    	<form method="post" action="CreateProduct" files="true" enctype="multipart/form-data">
    		<div class="row">
                <div class="input-field col s6">
                    <input id="inputGameTitle" name="Title" type="text" class="form-control" placeHolder="Title"/>
                </div>
            </div>
    		<div class="row">
                <div class="input-field col s6">
                    <select>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach 
                    </select>
                </div>
    		</div>
    		<div class="row">
                <div class="input-field col s6">
        			<textarea id="inputGameDescription" name="Description" type="text" class="materialize-textarea" placeHolder="Description"></textarea>
                </div>
    		</div>
    		<div class="row">
                <div class="file-field input-field col s6">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" name="images[]" class="form-control" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <span id="slider-snap-value-lower-age">0</span>
                    <span>to</span>
                    <span id="slider-snap-value-upper-age">100</span>
                    <div id="slider_age_range"></div>
                    <input id="input-age-min" type="hidden" name="age-min" value="0" />
                    <input id="input-age-max" type="hidden" name="age-max" value="100" />
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <span id="slider-snap-value-lower-players">2</span>
                    <span>to</span>
                    <span id="slider-snap-value-upper-players">5</span>
                    <div id="slider_players_range"></div>
                    <input id="input-players-min" type="hidden" name="players_min" value="2" />
                    <input id="input-players-max" type="hidden" name="players_max" value="5" />
                </div>
            </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
          {!! csrf_field() !!}
    	</form>
<script type"text/javascript">
    $(document).ready(function() {
        // Select init
        $('select').material_select();
        
        // noUiSlider init
        initSlider('age',0,100,0,100);
        initSlider('players',1,15,2,5);
        
        var snapValuesAge = [
            document.getElementById('slider-snap-value-lower-age'),
            document.getElementById('slider-snap-value-upper-age')
        ];
        var hiddenValueAge = [
            document.getElementById('input-age-min'),
            document.getElementById('input-age-max')
        ];
        var snapValuesPlayers = [
            document.getElementById('slider-snap-value-lower-players'),
            document.getElementById('slider-snap-value-upper-players')
        ];
        var hiddenValuePlayers = [
            document.getElementById('input-players-min'),
            document.getElementById('input-players-max')
        ];
        
        document.getElementById('slider_age_range').noUiSlider.on('update', function( values, handle ) {
            snapValuesAge[handle].innerHTML = values[handle];
            hiddenValueAge[handle].innerHTML = values[handle];
        });
        document.getElementById('slider_players_range').noUiSlider.on('update', function( values, handle ) {
            snapValuesPlayers[handle].innerHTML = values[handle];
            hiddenValuePlayers[handle].innerHTML = values[handle];
        });
        
    });
    
    function initSlider(name,min,max,defaultMin,defaultMax){
        var slider = document.getElementById('slider_'+name+'_range');
        noUiSlider.create(slider, {
            start: [defaultMin, defaultMax],
            connect: true,
            step: 1,
            range: {
                'min': min,
                'max': max
            },
            format: wNumb({
                decimals: 0
            })
        });
    }
</script>
@stop
