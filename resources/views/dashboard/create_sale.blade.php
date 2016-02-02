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

            $("#add").on('click', function() {
                $('#sale-table tbody>tr:last').clone(true).insertAfter('#sale-table tbody>tr:last');
                return false;
            });
            $("#remove").on('click', function() {
                $('#sale-table tbody>tr:last').remove();
                return false;
            });
        });
    </script>
@stop
