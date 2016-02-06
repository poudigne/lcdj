@extends('dashboard/layout')

@section('title', 'Page Title')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">02/05/2016 Update </h3>
        </div>
        <div class="panel-body">
            <ul><b>Fix:</b>
                <li>Fixed a bug where the quantity of an item would not show up when page is loaded. <a target="_blank" href="https://github.com/poudigne/lcdj/commit/c48d29978234f4913a19968edb6359e9cf6fc051">[c48d299]</a></li>

            </ul>
            <ul><b>Change:</b>
                <li>Added cost and sale price to the product. <a target="_blank" href="https://github.com/poudigne/lcdj/commit/f0d0b2297ea2c9aa040549593abc567b456307ff">[f0d0b22]</a></li>
                <li>Decrease quantity in the inventory now create a new sales. <a target="_blank" href="https://github.com/poudigne/lcdj/commit/390bd8ba2ad97f08b4b70a56f31cdc051edb5357">[390bd8b]</a></li>
                <li>Added the sales page. It display the list of sales. <a target="_blank" href="https://github.com/poudigne/lcdj/commit/29ae05cfec5bce12a0e6575e59ed90ff4dad1600">[29ae05c]</a></li>
                <li>Added button to delete a sale or all selected sales <a target="_blank" href="https://github.com/poudigne/lcdj/commit/c3843a5524b7b5c7dd06edc1a2ecc78df16fcbf2">[c3843a5]</a></li>
                <li>Changed some design in the database. Fixed the code accordingly. <a target="_blank" href="https://github.com/poudigne/lcdj/commit/45025ae57786d75b09eaba0a7c61415235decb8b">[45025ae]</a></li>
                <li>Added the product image in the inventory. <a target="_blank" href="https://github.com/poudigne/lcdj/commit/259de56f70f5a3855cd80ab5143549010eadd119">[259de56]</a></li>
                <li>Removed the product description in the inventory section. <a target="_blank" href="https://github.com/poudigne/lcdj/commit/cdd3541aa2d429804e4c2be41831df5dd84fd090">[cdd3541]</a></li>
                <li>Changed some design in the database. Fixed the code accordingly. <a target="_blank" href="https://github.com/poudigne/lcdj/commit/45025ae57786d75b09eaba0a7c61415235decb8b">[45025ae]</a></li>
            </ul>
        </div>
    </div>
@stop