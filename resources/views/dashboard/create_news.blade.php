@extends('../dashboard/layout')

@section('title', 'Page Title')

@section('content')
    <h2 class="header">Créé une nouvelle</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif
	<form method="post" action="{{ route('dashboard::news.create.post') }}">
        <!-- Titre du produit -->
        <div class="form-group row">
            <label for="product_title" class="col-sm-2 form-control-label">* Titre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="news_title" value="{{ old('news_title') }}" id="news_title" placeholder="Titre du produit">
            </div>
        </div>  

        <!-- Texte de la nouvelles -->
        <div class="form-group row">
            <label for="product_title" class="col-sm-2 form-control-label">* Texte</label>
            <div class="col-sm-10">
                <textarea id="input_text" name="news_text" type="text" class="materialize-textarea form-control" placeHolder="Texte...">{!! old("news_text") !!}</textarea>
            </div>
        </div> 

        <!-- Categorie -->
        <div class="form-group row">
            <label for="product_title" class="col-sm-2 form-control-label">Categorie</label>
            <div class="col-sm-10">
                <select id="example-getting-started" name="news_categories[]" multiple="multiple" class="form-control">
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach 
                </select>
            </div>
        </div>  
		
        <button type="submit" class="btn btn-primary">Submit</button>
        {!! csrf_field() !!}
	</form>

    <script type="text/javascript">
    
        $(document).ready(function() {
            $('#example-getting-started').multiselect();
        });

    </script>
@stop
