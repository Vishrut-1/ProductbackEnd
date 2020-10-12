<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function createProduct(Request $request)
    {

        if ($request->has('product_image')) {
            $file = $request->file('product_image');
            $name = $file->getClientOriginalName();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $name);
        }


        $productData = Product::create($request->all());

        if ($request->has('product_image') != null) {

            $image = new ProductImage();
            $image->product_id = $productData->id;
            $image->image = $name;
            $image->save();
        }
        return response()->json($productData);
    }

    public function productListing()
    {
        $productInfo = Product::with('images')->get();
        return response()->json($productInfo);
    }

    public function deleteProduct(Request $request)
    {
        $product = Product::findOrfail($request->id);
        $product->delete();
        return response()->json($product);
    }

    public function updateProduct(Request $request)
    {
        $updatedProduct = Product::where('id', $request->id)->update($request->info);
        return response()->json($updatedProduct);
    }

}
