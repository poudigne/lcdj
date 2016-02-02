@include('dashboard.partials.error')

<?php
    $option = "<option value=''></option>";
    foreach ($products as $set)
    {
        $option .= "<option value='".$set->id."'>".$set->title."</option>";
    }
    $input = "<select class='form-control'>".$option."</select>";
?>

<table id="sale-table" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Unit price</th>
            <th>Total price</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>{!! $input  !!}</th>
            <th><input type="text" name="item_quantity" class="form-control" /></th>
            <th><input type="text" name="item_price" class="form-control" /></th>
            <th></th>
        </tr>
    </tbody>
</table>
<button type="button" id="remove" class="btn btn-default float-right glyphicon glyphicon-minus"></button>
<button type="button" id="add" class="btn btn-default float-right glyphicon glyphicon-plus"></button>

<button type="submit" class="btn btn-primary">Submit</button>
{!! csrf_field() !!}