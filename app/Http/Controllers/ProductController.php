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
        $products = $product
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
        return view('dashboard/create_product')->with('categories', $categories);
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
        $product->title = $request->get('product_title');
        $product->description = $request->get('product_description');
        $product->price = 0;
        $product->min_player = $request->get('product_input-players-min');
        $product->max_player = $request->get('product_input-players-max');
        $product->min_age = $request->get('product_input-age-min');
        $product->max_age = $request->get('product_input-age-max');
        $product->save();
                
        foreach ($request->get('product_categories') as $category_id) {
            $product->categories()->attach($category_id);
        }

        //$files = $request->file('product_images');
        //foreach($files as $file) {
        //    $product->addMedia($file)->toCollection('images');
        //}

        $category = new Category;      
        $categories = $category->get();
        return view('dashboard/create_product')->with('success', 1)->with('categories', $categories);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $output = "";
        $product = Product::find($id);
        foreach($product->getMedia() as $media) {
            $output = "<img src='" . $media->getUrl() . "' /><br />";
        }

        return $output;
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
?>