<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
        return response(['Add Product'], 201);
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
