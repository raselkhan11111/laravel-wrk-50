<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        if($keyword = request('keyword')){
            $products = Product::latest()
                                ->where('title', 'LIKE', "%{$keyword}%")
                                ->paginate(15);
        }else{
            $products = Product::latest()->paginate(15);
        }
        return view('welcome', compact('products'));
    }

    public function productList(Category $category)
    {
        return view('products', compact('category'));
    }

    public function productDetails(Product $product)
    {
        return view('product', compact('product'));
    }
}
