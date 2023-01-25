<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::all();

        $arr = [
            'status' => true,
            'message' => "Danh sách sản phẩm",
            'data' => $products
        ];
        return response()->json($arr, 200);
    }

    public function createProduct(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required', 'description' => 'required'
        ]);
        if ($validator->fails()) {
            $arr = [
                'success' => false,
                'message' => 'Lỗi kiểm tra dữ liệu',
                'data' => $validator->errors()
            ];
            return response()->json($arr, 200);
        }
        $product = Product::create($input);
        $arr = ['status' => true,
            'message' => "Sản phẩm đã lưu thành công",
            'data' => $product
        ];
        return response()->json($arr, 201);
    }

    public function getProductByPrice(int $price)
    {
        $products = Product::whereHas('price', function ($query) use ($price) {
            $query->where('price', $price);
        })->get();

        $arr = [
            'status' => true,
            'message' => "Danh sách sản phẩm",
            'data' => $products
        ];

        return response()->json($arr, 200);
    }

    public function getPosts()
    {
        $posts = Post::all();

        $arr = [
            'status' => true,
            'message' => "Danh sách posts",
            'data' => $posts
        ];
        return response()->json($arr, 200);
    }

    public function getComments()
    {
        $comments = Comment::all();

        $arr = [
            'status' => true,
            'message' => "Danh sách bình luận",
            'data' => $comments
        ];
        return response()->json($arr, 200);
    }

    public function getCommentsByPostId(int $postId)
    {
//        $comments = Post::with('comments')->find($postId);

        $comments = Comment::where('post_id', $postId)->get();

        $arr = [
            'status' => true,
            'message' => "Danh sách comments",
            'data' => $comments
        ];
        return response()->json($arr, 200);
    }

    public function getPostsByComment(string $str)
    {
        $posts = Post::whereHas('comments', function ($query) use ($str) {
            $query->where('content', $str);
        })->get();

        $arr = [
            'status' => true,
            'message' => "Danh sách posts",
            'data' => $posts
        ];
        return response()->json($arr, 200);
    }

    public function getPostsByProductName(string $productName) {
        $posts = Post::whereHas('product', function ($query) use ($productName) {
            $query->where('name', $productName);
        })->get();

        $arr = [
            'status' => true,
            'message' => "Danh sách posts",
            'data' => $posts
        ];
        return response()->json($arr, 200);
    }

    public function getPostsByProductId(int $productId) {
        $posts = Post::whereHas('product', function ($query) use ($productId) {
            $query->where('id', $productId);
        })->get();

        $arr = [
            'status' => true,
            'message' => "Danh sách posts",
            'data' => $posts
        ];
        return response()->json($arr, 200);
    }
}
