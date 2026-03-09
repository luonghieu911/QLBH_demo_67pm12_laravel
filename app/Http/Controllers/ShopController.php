<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function index(Request $request): View
    {
        $products = Product::with('category')
            ->where('is_delete', false)
            ->where('is_active', true)
            ->when($request->filled('keyword'), function ($query) use ($request) {
                $keyword = trim($request->keyword);
                $query->where('name', 'like', "%{$keyword}%");
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('shop.index', compact('products'));
    }

    public function show(Product $product): View
    {
        abort_if($product->is_delete || !$product->is_active, 404);
        $product->load('category');
        return view('shop.show', compact('product'));
    }
}
