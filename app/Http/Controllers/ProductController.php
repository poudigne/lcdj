<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\UploadedFile;
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
        $productList = $product
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.title', 'products.description', 'products.price','products.id','categories.name')
            ->get();
        return view('dashboard/products')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category;
        $categories = $category->get();
        return view('dashboard/createproduct')->with('categories', $categories);
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
        $category = new Category;
        
        $files = $request->file('images');
        foreach($files as $file) {
            $folder = $product->title . "_" . $product->id;
            $fulldir = 'uploads/'. $folder . "/";

            if (!is_dir($fulldir)) 
                mkdir($fulldir);         

            $md5 = md5($folder . "/" . $$file->getFilename());
            $file->move($fulldir, $md5 . ".jpg");
            InsertFileInDatabase($product, $md5);
        } 
        $categories = $category->get();
        return view('dashboard/createproduct')->with('success', 1)->with('categories', $categories);
    }

    public function InsertFileInDatabase(Product $product, $md5){
        $images = new Images;
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
        $product = new Product;
        Product::find($id)->delete();
        $products = $product
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.title', 'products.description', 'products.price','products.id','categories.name')
        ->get();
        $category = new Category;
        $categories = $category->get();
        return view('dashboard/products')->with('products', $products)->with('categories', $categories)->with('deleted', 1);
    }
}
