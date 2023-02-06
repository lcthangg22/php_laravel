<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductController extends Controller
{
    public function getAllProducts(): JsonResponse
    {
        $products = Product::paginate(10);

        $arr = [
            'status' => true,
            'message' => "Danh sách sản phẩm",
            'data' => JsonResource::collection($products)
        ];

        return response()->json($arr);
    }

    public function getProductsByYear(int $year)
    {
        $products = Product::where('model_year', '=', $year)->paginate(10);

        $arr = [
            'status' => true,
            'message' => "Danh sách sản phẩm",
            'data' => JsonResource::collection($products)
        ];
        return response()->json($arr, 200);
    }

    public function getProductsByStoreId(int $storeId)
    {
        $products = Product::whereHas('stores', function ($query) use ($storeId) {
            $query->where('id', $storeId);
        })->paginate(10);

        $arr = [
            'status' => true,
            'message' => "Success",
            'data' => JsonResource::collection($products)
        ];
        return response()->json($arr);
    }

    public function getQuantityByProductId(int $productId)
    {
        $quantity = Stock::where('product_id', $productId);

        $arr = [
            'status' => true,
            'message' => "Success",
            'data' => JsonResource::collection($quantity)
        ];
        return response()->json($arr);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
