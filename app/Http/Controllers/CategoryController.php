<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::with('parent')
            ->where('is_delete', false)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.category.index', compact('categories'));
    }

    public function create(): View
    {
        $parentOptions = $this->getParentOptions();
        return view('admin.category.create', compact('parentOptions'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules());
        Category::create($this->normalizePayload($validated));

        return redirect()->route('admin.categories.index')
            ->with('success', 'Thêm danh mục thành công.');
    }

    public function edit(string $id): View
    {
        $category = Category::findOrFail($id);
        $parentOptions = $this->getParentOptions($category->id);

        return view('admin.category.edit', compact('category', 'parentOptions'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $validated = $request->validate($this->rules($category));

        if ($this->wouldCreateCycle($validated['parent_id'] ?? null, $category)) {
            return back()
                ->withErrors(['parent_id' => 'Không thể chọn danh mục cha là chính nó hoặc con/cháu của nó.'])
                ->withInput();
        }

        $category->update($this->normalizePayload($validated));

        return redirect()->route('admin.categories.index')
            ->with('success', 'Cập nhật danh mục thành công.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->update(['is_delete' => true]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Đã xóa mềm danh mục.');
    }

    private function rules(?Category $category = null): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'string', 'max:255'],
            'parent_id' => [
                'nullable',
                'integer',
                Rule::exists('categories', 'id')->where(fn ($query) => $query->where('is_delete', false)),
            ],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function normalizePayload(array $validated): array
    {
        $validated['parent_id'] = $validated['parent_id'] ?? null;
        $validated['is_active'] = (bool) ($validated['is_active'] ?? false);
        $validated['is_delete'] = false;
        return $validated;
    }

    private function getParentOptions(?int $ignoreId = null)
    {
        return Category::where('is_delete', false)
            ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->orderBy('name')
            ->get();
    }

    private function wouldCreateCycle(?int $parentId, Category $category): bool
    {
        if (!$parentId) {
            return false;
        }

        if ($parentId === (int) $category->id) {
            return true;
        }

        $currentParent = Category::find($parentId);
        while ($currentParent) {
            if ((int) $currentParent->id === (int) $category->id) {
                return true;
            }
            $currentParent = $currentParent->parent;
        }

        return false;
    }
}
