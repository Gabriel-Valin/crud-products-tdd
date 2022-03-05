<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductsController extends Controller
{
    public function getProducts () {
        $products = Product::get()->toJson(JSON_PRETTY_PRINT);
        return response($products, Response::HTTP_OK);
    }

    public function getOneProduct (int $productId) {
        $product = Product::find($productId);
        return response()->json($product, Response::HTTP_OK);
    }

    public function updateProduct (int $productId, Request $request) {
        $product = Product::find($productId);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->save();

        return response()->json($product, Response::HTTP_CREATED);
    }

    public function createProduct (Request $request) {
        $newProduct = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price')
        ]);

        return response()->json($newProduct, Response::HTTP_CREATED);
    }

    public function deleteProduct (int $productId) {
        Product::destroy($productId);
        return response()->json(['message' => 'Product has been deleted!'], Response::HTTP_OK);
    }
}
