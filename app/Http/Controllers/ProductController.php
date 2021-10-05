<?php

namespace App\Http\Controllers;

use Validator;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createData(Request $request)
    {
        $val = Validator::make($request->all(), [
            'product_name' => 'required',
            'price' => 'required|numeric',
            'desc' => 'required|max:100'
        ]);

        if($val->fails())
        {
            return response()->json([
                'error' => $val->errors()
            ]);
        }

        Product::create([
            'name' => $request->product_name,
            'price' => $request->price,
            'desc' => $request->desc
        ]);

        return response()->json([
            'message' => 'successfully created Data'
        ]);
    }

    public function getAllData()
    {
        $product = Product::all();
        return response()->json([
            'product' => $product
        ]);
    }

    public function getData($id)
    {
        $product = Product::findOrFail($id);
        
        return response()->json($product);
    }

    public function searchData(Request $request)
    {
        $product = Product::where('name', 'LIKE', '%'.$request->product_name.'%')->get();
        return response()->json([
            'productSearch' => $product
        ]);
    }

    public function updateData(Request $request, $id)
    {
        $val = Validator::make($request->all(), [
            'product_name' => 'required',
            'price' => 'required|numeric',
            'desc' => 'required|max:100'
        ]);

        if($val->fails())
        {
            return response()->json([
                'error' => $val->errors()
            ]);
        }

        $product = Product::findOrFail($id)->update([
            'name' => $request->product_name,
            'price' => $request->price,
            'desc' => $request->desc
        ]);

        return response()->json([
            'message' => 'successfully update data products'
        ]);
    }

    public function deleteData($id)
    {
        $product = Product::destroy($id);

        return response()->json([
            'message' => 'successfully delete data products'
        ]);
    }
}
