<div class="form-group">
    <label for="name">Tên danh mục <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name ?? '') }}">
</div>
<div class="form-group">
    <label for="parent_id">Danh mục cha</label>
    <select class="form-control" id="parent_id" name="parent_id">
        <option value="">-- Chọn danh mục cha --</option>
        @foreach ($parentOptions as $item)
            <option value="{{ $item->id }}" @selected(old('parent_id', $category->parent_id ?? '') == $item->id)>
                {{ $item->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="description">Mô tả</label>
    <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $category->description ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="image">Đường dẫn ảnh</label>
    <input type="text" class="form-control" id="image" name="image" value="{{ old('image', $category->image ?? '') }}">
</div>
<div class="form-group form-check">
    <input type="hidden" name="is_active" value="0">
    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" @checked(old('is_active', $category->is_active ?? true))>
    <label class="form-check-label" for="is_active">Kích hoạt</label>
</div>
