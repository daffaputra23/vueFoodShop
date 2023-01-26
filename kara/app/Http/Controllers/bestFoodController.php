<?php

namespace App\Http\Controllers;

use App\Models\bestFood;
use App\Models\keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\File;

class bestFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts = bestFood::latest()->get();
        return response([
            'data' => $posts
        ], 200);
    }

    public function search(Request $request)
    {
        $searchResult = $request->get('search');
        $data=bestFood::where('nama','like',"%".$searchResult."%");
        
        // return response([
        //     'data' => $data
        // ]);
        return response()->json([
            'data'=>$data
        ]);

    }


    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    //     public function store(Request $request)
    // {
    //     // $image_path = $request->file('image')->store('image', 'public');
    //     $post = keranjang::create([
    //         // 'kode' => $request->kode,
    //         'products' => $request->products,
    //         'jumlah_pemesanan' => $request->jumlah_pemesanan,
    //         'keterangan' => $request->keterangan,
    //         'image' => $request->image,
    //         // 'category_id' => $request->category_id
    //     ]);

        

    //     if($post){
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Post Berhasil Disimpan!',
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Post Gagal Disimpan!',
    //         ], 400);
    //     }
    // }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = bestFood::whereId($id)->first();

        if($posts) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Post!',
                'data'    => $posts
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post Tidak Ditemukan',
                'data'    => ''
            ], 404);
        }
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
        //
    }
}
