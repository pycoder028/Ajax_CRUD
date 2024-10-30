<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productController extends Controller
{
    public function products(){

        return view('products');
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
        
    }

}
