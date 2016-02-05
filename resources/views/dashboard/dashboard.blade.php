@extends('dashboard/layout')

@section('title', 'Page Title')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">02/05/2016 Update </h3>
        </div>
        <div class="panel-body">
            <ul><b>Fix:</b>
                <li>Fixed a bug where the quantity of an item would not show up when page is loaded. <a href="https://github.com/poudigne/lcdj/commit/c48d29978234f4913a19968edb6359e9cf6fc051">[c48d299]</a></li>
            </ul>
            <ul><b>Added:</b>
                <li>Added cost and sale price to the product. <a href="https://github.com/poudigne/lcdj/commit/f0d0b2297ea2c9aa040549593abc567b456307ff">[f0d0b22]</a></li>
                <li>Decrease quantity in the inventory now create a new sales.  <a href="https://github.com/poudigne/lcdj/commit/390bd8ba2ad97f08b4b70a56f31cdc051edb5357">[390bd8b]</a></li>
            </ul>
        </div>
    </div>
@stop