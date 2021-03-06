<?php

namespace App\Http\Controllers;

use App\Product;
use App\Store;
use App\Setting;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = Product::all();
        // dd($product);
        return view('products', ['products' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('createproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product = new Product;
        $product->SKU = $request->SKU;
        $product->name = $request->name;
        $product->price = $request->price;

        $product->save();

        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = ['id'=>$id];
        return view('updateproduct',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id = $request->id;
        $product = Product::find($id);
        $product->id = $id;
        $product->name = $request->name;
        $product->SKU = $request->SKU;
        $product->price = $request->price;
        
        $product->save();
        // dd($admin);
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function productuser()
    {
        $prods = Store::with('products')->get();
        $result = array('products' => $prods);
        // dd($result);
        return view('productuser',$result);
    }

    public function recommendation()
    {
        $batas = Setting::all();
        // dd($batas[0]->limit);
        $store = Store::with('products')->get();
        $data = [
                'store' => $store ,
                'limit' =>$batas[0]->limit
        ];
        
        return view('recommend',['store'=>$store, 'limit'=>$batas[0]->limit]);
    }
}
