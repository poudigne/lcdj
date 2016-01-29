<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\UploadedFile;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard/products')->with('products', Product::with('categories')->paginate(50));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/create_product')->with('categories', Category::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_title' => 'required'
        ]);

        $product = new Product;
        $product->title = $request->get('product_title');
        $product->description = $request->get('product_description');
        $product->price = 0;
        $product->min_player = $request->get('product_input-players-min');
        $product->max_player = $request->get('product_input-players-max');
        $product->min_age = $request->get('product_input-age-min');
        $product->max_age = $request->get('product_input-age-max');
        $product->save();

        if ($request->get('product_categories') != null){
            foreach ($request->get('product_categories') as $category_id) {
                $product->categories()->attach($category_id);
            }
        }

        $files = $request->file('product_images');
        $count = 0;
        foreach($files as $file) {
            if ($file == null)
                continue;
            $product->addMedia($file)->usingFileName($product->id. "_" . $count . "." . $file->getClientOriginalExtension())->toCollection('images');
            $count++;
        }


        Session::flash('flash_message', 'Product successfully added!');

        return view('dashboard/create_product')->with('categories', Category::get());
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
        $products = $product->join('categories', 'products.category_id', '=', 'categories.id')
                            ->select('products.title', 'products.description', 'products.price','products.id','categories.name')
                            ->get();
        $category = new Category;
        $categories = $category->get();
        return view('dashboard/products')->with('products', $products)->with('categories', $categories)->with('deleted', 1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function multiple_delete(Request $request)
    {
        Product::destroy($request->ids);
        $response = ['model_type' => 'Product', 'ids' => $request->ids];
        return json_encode($response);
    }
}
?>