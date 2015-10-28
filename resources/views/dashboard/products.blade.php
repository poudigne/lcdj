@extends('dashboard/layout')

@section('title', 'Page Title')


@section('dashboard/content')
<div class="row">
    <div class="col s3">
        <nav>
            <ul class="right hide-on-med-and-down">
                <li><a href="#!">First Sidebar Link</a></li>
                <li><a href="#!">Second Sidebar Link</a></li>
            </ul>
            <ul id="slide-out" class="side-nav">
                <li><a href="#!">First Sidebar Link</a></li>
                <li><a href="#!">Second Sidebar Link</a></li>
            </ul>
        </nav>
    </div>
    <div class="col s9">
        @if (isset($result))
        dd({{ $result }})
        @endif
    </div>
</div>
@stop