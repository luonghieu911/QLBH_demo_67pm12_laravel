<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $products = Product::with('category')
            ->where('is_delete', false)
            ->when($request->filled('keyword'), function ($query) use ($request) {
                $keyword = trim($request->keyword);
                $query->where(function ($subQuery) use ($keyword) {
                    $subQuery->where('name', 'like', "%{$keyword}%")
                        ->orWhere('sku', 'like', "%{$keyword}%");
                });
            })
            ->when($request->filled('category_id'), fn ($query) => $query->where('category_id', $request->category_id))
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        $categories = Category::where('is_delete', false)->orderBy('name')->get();

        return view('admin.product.index', compact('products', 'categories'));
    }

    public function create(): View
    {
        $categories = Category::where('is_delete', false)->orderBy('name')->get();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules());
        Product::create($this->normalizePayload($validated));

        return redirect()->route('admin.products.index')
            ->with('success', 'Thêm sản phẩm thành công.');
    }

    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);
        $categories = Category::where('is_delete', false)->orderBy('name')->get();

        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $validated = $request->validate($this->rules());
        $product->update($this->normalizePayload($validated));

        return redirect()->route('admin.products.index')
            ->with('success', 'Cập nhật sản phẩm thành công.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->update(['is_delete' => true]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Đã xóa mềm sản phẩm.');
    }

    private function rules(): array
    {
        return [
            'category_id' => [
                'nullable',
                'integer',
                Rule::exists('categories', 'id')->where(fn ($query) => $query->where('is_delete', false)),
            ],
            'name' => ['required', 'string', 'max:255'],
            'sku' => ['nullable', 'string', 'max:100'],
            'price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['nullable', 'numeric', 'min:0', 'lte:price'],
            'stock' => ['required', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function normalizePayload(array $validated): array
    {
        $validated['category_id'] = $validated['category_id'] ?? null;
        $validated['sale_price'] = $validated['sale_price'] ?? null;
        $validated['is_active'] = (bool) ($validated['is_active'] ?? false);
        $validated['is_delete'] = false;
        return $validated;
    }
}
