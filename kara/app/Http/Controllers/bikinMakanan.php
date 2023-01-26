<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bestFood;

class bikinMakanan extends Controller
{
    public function addProduct(Request $request){
        
           $file = $request->file('image')->store('image','public');  
        

        $products = bestFood::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'harga' => $request->harga, 
            'image' => $request->file,
            // 'stock' => $request->stock,
        ]);

        if($products){
            return response([
                'success' => true,
                'message' => 'Product Successfully Added',
            ], 200);
        } else {
            return response([
                'success' => false,
                'message' => 'Failed to Add Product'
            ], 400);
        }
    }

}
