<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

Route::apiResource('products', ProductController::class);

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::all();

        return response()->json($products, 200);
    }

    public function showProduct(Request $request, $id)
    {
        return response(['Show Product'], 201);
    }

    public function addProduct(Request $request)
    {
        $request->validate(
            [
                'user_id' => 'required',
                'product_name' => 'required',
                'product_description' => 'required',
                'quantity' => 'required',
                'price' => 'required',
            ]
        );

        Product::create([
            'user_id' => $request->user_id,
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'quantity' => $request->quantity,
            'price' => $request->price
        ]);

        return response(['message' => 'Product Added Successfully'], 201);
    }

    public function editProduct(Request $request)
    {
        return response(['Edit Product'], 201);
    }

    public function removeProduct(Request $request)
    {
        return response(['Remove Product'], 201);
    }
}
