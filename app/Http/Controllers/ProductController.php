<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = new Product;
        $results = $product
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.title', 'products.description', 'products.price','products.id','categories.name')
            ->get();
        return view('dashboard/products')->with("ProductList",$results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category;
        $res = $category->get();
        return view('dashboard/createproduct')->with("categoryList",$res);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->title = $request->get('Title');
        $product->description = $request->get('Description');
        $product->price = $request->get('Price');
        $product->category_id = '1';
        $product->save();
        return view('dashboard/createproduct')->with('success',1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $results = Product::find($id)->delete();
        $product = new Product;
        $getRes = $product
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.title', 'products.description', 'products.price','products.id','categories.name')
            ->get();
        return view('dashboard/products')->with('ProductList',$getRes);
    }
}
