<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Tên sản phẩm <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name ?? '') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="sku">SKU</label>
            <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku', $product->sku ?? '') }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="category_id">Danh mục</label>
            <select class="form-control" id="category_id" name="category_id">
                <option value="">-- Chọn danh mục --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? '') == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="price">Giá gốc <span class="text-danger">*</span></label>
            <input type="number" step="0.01" min="0" class="form-control" id="price" name="price" value="{{ old('price', $product->price ?? 0) }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="sale_price">Giá khuyến mãi</label>
            <input type="number" step="0.01" min="0" class="form-control" id="sale_price" name="sale_price" value="{{ old('sale_price', $product->sale_price ?? '') }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="stock">Tồn kho <span class="text-danger">*</span></label>
            <input type="number" min="0" class="form-control" id="stock" name="stock" value="{{ old('stock', $product->stock ?? 0) }}">
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="image">Đường dẫn ảnh</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ old('image', $product->image ?? '') }}">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="description">Mô tả</label>
    <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $product->description ?? '') }}</textarea>
</div>
<div class="form-group form-check">
    <input type="hidden" name="is_active" value="0">
    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" @checked(old('is_active', $product->is_active ?? true))>
    <label class="form-check-label" for="is_active">Kích hoạt</label>
</div>
