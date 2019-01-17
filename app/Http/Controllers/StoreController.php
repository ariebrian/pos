<?php

namespace App\Http\Controllers;

use App\Store;
use App\User;
use App\ProdUser;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use JWTFactory;
use Dirape\Token\Token;


class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stores = Store::all();
        // $stores1 = DB::table('stores')->get();
        // dd($stores);
        return view('stores', ['stores'=>$stores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('createstore');
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
        $store = new Store;
        $store->name = $request->name;
        $store->address = $request->address;
        $store->phone = $request->phone;
        $store->email = $request->email;
        $store->password = Hash::make($request->password);
        $token =  (new Token())->Unique('stores', 'token', 60);
        // dd($token);
        $store->token = $token;
        $store->save();

        return redirect('stores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('updatestore', ['id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id = $request->id;
        $store = Store::find($id);
        $store->id = $id;
        $store->name = $request->name;
        $store->address = $request->address;
        $store->phone = $request->phone;
        $store->email = $request->email;
        $store->password = $store->password;
        $store->token = $store->token;

        $store->save();
        // dd($admin);
        return redirect('stores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }
}
