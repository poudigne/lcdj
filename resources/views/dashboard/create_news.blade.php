@extends('../dashboard/layout')

@section('title', 'Page Title')

@section('content')
    @if (isset($success) && $success == '1')
        <script type="text/javascript">
        </script>
    @endif


    <h2 class="header">Créé une nouvelle</h2>
	<form method="post" action="{{ route('dashboard::news.create.post') }}">
        <!-- Titre du produit -->
        <div class="form-group row">
            <label for="product_title" class="col-sm-2 form-control-label">* Titre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="news_title" id="news_title" placeholder="Titre du produit">
            </div>
        </div>  

        <!-- Texte de la nouvelles -->
        <div class="form-group row">
            <label for="product_title" class="col-sm-2 form-control-label">* Texte</label>
            <div class="col-sm-10">
                <textarea id="input_text" name="news_text" type="text" class="materialize-textarea form-control" placeHolder="Texte..."></textarea>
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
