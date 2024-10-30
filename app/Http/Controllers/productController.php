<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function products(){
        $products = Product::latest()->paginate(5);

        return view('products', compact('products'));
    }

    public function addProduct(Request $request){
        $request->validate(
            [
                'name' => 'required|unique:products',
                'price' => 'required',
            ],
            [
                'name.required' => 'Name is Required',
                'name.unique' => 'Product Already Exists',
                'price.required' => 'Price is Required',
            ],
        );
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        return response()->json([
            'status' => 'success',
        ]);
    }

}
