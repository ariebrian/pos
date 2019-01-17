<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;

use App\Store;
use App\Product;
use App\ProdUser;
use App\Sales;
use App\Setting;

class ApiController extends Controller
{
    public function loginStore(Request $request)
    {
        // dd($request->password);
        $pass = Store::where('email', $request->email)->first()->password;
        // dd($pass);
        $checkPass = Hash::check($request->password, $pass);
        // dd($checkPass);
        if ($checkPass == false) {
            return response()->json('Email atau password salah', 400);
        } else {
            $data = [
                'store' => Store::where('email',$request->email)->first(),
                'status'=> $checkPass,
            ];
            return response()->json($data, 200);
        }
    }

    public function getProduct()
    {
        $products = Product::all();
        return response()->json($products, 200);
    }

    public function postProductUser(Request $request)
    {
        /**
         * store  -> header
         * product id -> milih
         * stock
         * status
         * 
         * store->attach product
         * save -> product_store
         */

        $storeId = Store::where('token', $request->header('Authorization'))->first();
        $prod = Product::where('id', $request->productId)->first();
        $stock = $request->stock;
        $satuan = $request->satuan;
        $status = $request->status;
        $storeId->products()->attach($prod->id, ['stock' => $stock, 'satuan' => $satuan, 'active' => $status ]);
        // $data = Store::with('products')->where('id',$storeId->id)->get();
        return response()->json('Success', 201);
    }

    public function upProductUser(Request $request)
    {
        /**
         * store  -> header
         * product id -> milih
         * stock
         * status
         * 
         * store->attach product
         * save -> product_store
         */

        $storeId = Store::where('token', $request->header('Authorization'))->first();
        // $prod = Product::where('id', $request->productId)->first();
        $prodUser = ProdUser::where('store_id', $storeId->id)
                            ->where('product_id', $request->productId);
        $prodUser->store_id = $storeId->id;
        $prodUser->product_id = $request->productId;
        $prodUser->satuan = $request->satuan;
        $prodUser->active = $request->active;
        $prodUser->save();
        return response()->json('Success', 201);
    }

    public function getProductUser(Request $request)
    {
        // dd($request->header('Authorization'));
        $prods = Store::with('products')->where('token',$request->header('Authorization'))->get();
        // dd($prods);
        return response()->json($prods, 200);
    }

    public function getSales(Request $request)
    {
        $storeId = Store::where('token', $request->header('Authorization'))->first();
        $sales = Sales::with('products')
                        ->with('stores')
                        ->where('store_id', $storeId->id)
                        ->orderBy('id_trans', 'desc')
                        ->get();
        return response()->json($sales, 200);
    }

    public function postSales(Request $request)
    {
        $storeId = Store::where('token', $request->header('Authorization'))->first();
        $prod = Product::where('id', $request->productId)->first();
        $prod2 = Product::where('id', $request->productId2)->first();
        $lastTrans = Sales::with('products')
                        ->with('stores')
                        ->orderBy('id_trans','desc')
                        ->first();
        $newId = $lastTrans->id_trans + 1;
        $id_length = 4;
        $saleId = substr("0000{$newId}", -$id_length);

        $sales = new Sales;
        $sales->store_id = $storeId->id;
        $sales->product_id = $prod->id;
        $sales->id_trans = $saleId;
        $sales->qty = $request->qty;
        // dd($sales);

        $store = Store::with('products')->find($storeId->id);
        $newProd = $store->products()->where('id',$prod->id)->first();
        // dd($newProd->pivot->stock);
        $newStock = $newProd->pivot->stock - $request->qty;
        $store->products()->updateExistingPivot($prod->id,['stock' => $newStock]);
        $sales->save();

        return response()->json($sales, 201); 
    }

    public function recommendation(Request $request)
    {
        $limit = Setting::all();
        $batas = $limit[0]->limit;
        // dd($batas);
        $storeId = Store::where('token', $request->header('Authorization'))->first();
        $store = Store::with('products')->find($storeId->id);
        $prod = $store->products()->get();
        $data = array();
        for ($i=0; $i < sizeof($prod); $i++) {
            // dd(gettype($prod[$i]->pivot->stock)); 
            if ($prod[$i]->pivot->stock < $batas) {
                $amount = $batas - $prod[$i]->pivot->stock;
                array_push($data,['prods'=>$prod[$i],'amount'=>$amount]);   
            }
        }
        return response()->json($data, 200);
    }
}
