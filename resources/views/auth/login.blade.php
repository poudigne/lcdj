@extends('dashboard/layout')

@section('title', 'Page Title')

@section('content')

@if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
<form method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}" /> 
<input type="text" name="email" />
<input type="password" name="password" />
<input type="submit" />
</form>
@stop