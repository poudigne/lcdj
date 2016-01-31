<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Inventory;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Session;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = new Product;
        $products = $product->with('categories')->orderBy('title')->paginate(20);

        return view('dashboard/inventory')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category;
        $categories = $category->orderBy('name')->get();
        return view('dashboard/create_product')->with('categories', $categories)->with('product', new Product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

    }

    public function search(Request $request){

        $keyword = $request->get('keywordz');
        Session::put("keyword", $keyword);
        $product = Product::with('categories')
            ->where('title', 'like', '%'.$keyword.'%')
            ->orwhere('description', 'like', '%'.$keyword.'%')
            ->paginate(20)->toJson();
        return $product;
    }
    /**
     * 0 = A to Z
     * 1 = Z to A
     * 2 = Stock Asc
     * 3 = Stock desc
     * 4 = Show out of stock only
     *
     * @param $sorttype
     * @return $this
     */
    public function sort($sorttype){
        Session::put("sort_type", $sorttype);

        $product = Product::leftJoin('inventories','products.id','=', 'inventories.id');
        $products = $this->sortInventory($product, $sorttype);
        return view('dashboard/inventory')->with('products', $products->paginate(20));
    }

    public function increase(Request $request) {
        return $this->modifyQuantity($request, 1);
    }

    public function decrease(Request $request) {
        return $this->modifyQuantity($request, -1);
    }

    private function modifyQuantity(Request $request, $modifier){
        $inventory = new Inventory;
        $item = $inventory->where("product_id", "=", $request->product_id)->first();
        $item->quantity = $item->quantity + $modifier;
        if($item->quantity < 0)
            $item->quantity = 0;
        $item->save();

        return json_encode($item);
    }

    private function sortInventory($products, $sorttype){

        switch($sorttype){
            case 0:
                return $products->orderBy("products.title",'asc');break;
            case 1:
                return $products->orderBy("products.title",'desc');break;
            case 2:
                return $products->orderBy("inventories.quantity",'asc');break;
            case 3:
                return $products->orderBy("inventories.quantity",'desc');break;
            case 4:
                return $products->where("inventories.quantity", 0);break;
            default:
                return $products;break;
        }
    }
}
?>