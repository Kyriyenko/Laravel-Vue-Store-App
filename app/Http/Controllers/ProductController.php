<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function createProduct(Request $request)
    {
        $product = new  Product([
            'title' => $request->title,
            'img_link' => 'http/link/img',
            'description' => $request->description,
            'price' => $request->price,
            'sub_category_id' => $request->categoryId,
        ]);

        $product->save();

        return [
            'status' => true,
            'message' => 'product was created'
        ];
    }

    public function updateProduct(Request $request)
    {
        $product = Product::find($request->id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;

        $product->save();

        return [
            'status' => true,
            'message' => 'product was updated',
            'record' => $product->toArray()
        ];
    }

    public function deleteProduct(Request $request)
    {
        Product::find($request->id)->delete();

        return [
            'id' => $request->id,
            'success' => 'true',
            'message' => 'product was deleted',
        ];
    }

    public function getAllProducts()
    {
        return Product::all();
    }

    public function getProduct($productId)
    {
        $product = Product::find($productId);
        return $product;
    }

    public function getMaxPriceFirst()
    {
        $products = Product::orderBy('price', 'DESC')->get();
        return $products;
    }

    public function getMinPriceFirst()
    {
        $products = Product::orderBy('price', 'ASC')->get();
        return $products;
    }

    public function getCategoryProduct($requestId)
    {
        $product = Product::select("*")
            ->whereIn('sub_category_id', (
            SubCategory::select("id")
                ->where('category_id', '=', $requestId)
            ))->get();


        return $product;
    }
}
