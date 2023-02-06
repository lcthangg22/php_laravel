<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product as ProductResource;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Store;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{

    public function getAllStores()
    {
        $stores = Store::all();

        $arr = [
            'status' => true,
            'message' => "Danh sách cửa hàng",
            'data' => $stores
        ];
        return response()->json($arr, 200);
    }

    public function getStoresByName(string $storeName): JsonResponse
    {
        $stores = Store::where('store_name', 'LIKE', "%{$storeName}%")->get();

        $arr = [
            'status' => true,
            'message' => "Tìm kiếm cửa hàng theo tên",
            'data' => $stores
        ];

        return response()->json($arr, 200);
    }

    public function getStoresByAddress(string $address): JsonResponse
    {
        $stores = Store::where('street', 'LIKE', "%{$address}%")
            ->orWhere('city', 'LIKE', "%{$address}%")
            ->get();

        $arr = [
            'status' => true,
            'message' => "Tìm kiếm cửa hàng theo địa chỉ",
            'data' => $stores
        ];

        return response()->json($arr, 200);
    }

    public function createStore(Request $request)
    {
        $data = $request->all();

        $rules = [
            'store_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required'
        ];

        $message = ['required' => 'Trường :attribute thiếu dữ liệu nhập vào'];

        $validator = Validator::make($data, $rules, $message);

        if ($validator->fails()) {
            $arr = [
                'success' => false,
                'message' => 'Lỗi kiểm tra dữ liệu',
                'data' => $validator->errors()
            ];
            return response()->json($arr, 403);
        }

        $store = Store::create($data);
        $arr = ['status' => true,
            'message' => "Cửa hàng đã lưu thành công",
            'data' => $store
        ];
        return response()->json($arr);

    }

    public function updateStore(Request $request, int $id): JsonResponse
    {
        $store = Store::find($id);
        $data = $request->all();

        $store->store_name = $data['new_store_name'];
        $store->phone = $data['new_phone'];
        $store->email = $data['new_email'];
        $store->street = $data['new_street'];
        $store->city = $data['new_city'];
        $store->state = $data['new_state'];
        $store->zip_code = $data['new_zip_code'];

        $arr = [
            'status' => true,
            'message' => 'Sản phẩm cập nhật thành công',
            'data' => $data
        ];

        $store->save();

        return response()->json($arr);
    }

    public function deleteStore($id)
    {
        $store = Store::find($id);

        $store->delete();

        $arr = [
            'status' => true,
            'message' => 'Xóa thành công',
        ];
        return response()->json($arr);
    }

    public function getQuantityByStoreId(int $storeId)
    {
        $quantity = Stock::where('store_id', $storeId)->get();

        $arr = [
            'status' => true,
            'message' => "Success",
            'data' => JsonResource::collection($quantity)
        ];

        return response()->json($arr);
    }
}
