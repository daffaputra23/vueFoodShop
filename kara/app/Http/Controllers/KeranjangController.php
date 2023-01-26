<?php

namespace App\Http\Controllers;

use App\Models\keranjang;
use Illuminate\Support\Facades\DB;
use App\Models\bestFood;
use App\Http\Requests\StorekeranjangRequest;
use App\Http\Requests\UpdatekeranjangRequest;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keranjang = keranjang::join('best_food','best_food.id','=','keranjangs.id')->get(['best_food.nama','keranjangs.jumlah_pemesanan','best_food.harga']);
        // $keranjang = keranjang::join('bestFood','bestFood.id','=','keranjang.id')->select('bestFood.*')->get();
        // $keranjang = DB::table('keranjang')->join('bestFood','bestFood.id','=','keranjang.id')->select('keranjang.*','bestFood.*')->get();
                // $keranjang = keranjang::latest()->get();
        return response([
            'data' => $keranjang
        ], 200);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorekeranjangRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StorekeranjangRequest $request)
    // {
        
    // }

    public function store(StorekeranjangRequest $request)
    {
        // $image_path = $request->file('image')->store('image', 'public');
        $post = keranjang::create([
            // 'kode' => $request->kode,
            'products' => $request->products,
            'jumlah_pemesanan' => $request->jumlah_pemesanan,
            'keterangan' => $request->keterangan,
            'image' => $request->image,
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
     * @param  \App\Models\keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function show(keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function edit(keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatekeranjangRequest  $request
     * @param  \App\Models\keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatekeranjangRequest $request, keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function destroy(keranjang $keranjang)
    {
        //
    }


}
