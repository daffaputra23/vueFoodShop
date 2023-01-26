<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\keranjang;
use App\Models\bestFood;

class Keranjang2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCart()
    {
        $cart = keranjang::latest()->get()->load(['bestFood']);

        return response([
            'success' => true,
            'message' => 'cart Retrieved',
            'data' => $cart
        ], 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addCart(Request $request)
    {
        $post = keranjang::create([
            // 'kode' => $request->kode,
        
            'jumlah_pemesanan' => $request->jumlah_pemesanan,
            'keterangan' => $request->keterangan,
            'product_id' => $request->product_id,
            // 'image' => $request->image,
            // 'category_id' => $request->category_id
        ]);

        

        if($post){
            return response()->json([
                'success' => true,
                'message' => 'Post Berhasil Disimpan!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post Gagal Disimpan!',
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function deleteCart($id)
    {
        $cart = keranjang::find($id);
        if($cart){
            $cart->delete();
            return response ([
                'message' => 'Product Deleted',
                'code' => true
            ]);
        } else {
            return response ([
                'message' => 'Product Not Found',
                'code' => 400
            ]);
        }
    }
}
