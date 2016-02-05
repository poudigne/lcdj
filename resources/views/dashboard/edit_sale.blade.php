@extends('../dashboard/layout')

@section('title', 'Page Title')

@section('content')
    <h2 class="header">Create a new sale</h2>

	<form method="post" action="{{ route('dashboard::sale.create.post') }}">
        @include('dashboard.partials.sale_form')
	</form>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example-getting-started').multiselect();
        });
    </script>
@stop
