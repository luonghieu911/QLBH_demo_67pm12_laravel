@extends('layout.admin')

@section('page_title', 'Danh sách sản phẩm')
@section('breadcrumb', 'Sản phẩm')

@section('content')
<div class="card">
    <div class="card-header">
        <form class="row" method="get">
            <div class="col-md-4 mb-2">
                <input type="text" name="keyword" class="form-control" placeholder="Tìm theo tên hoặc SKU" value="{{ request('keyword') }}">
            </div>
            <div class="col-md-3 mb-2">
                <select name="category_id" class="form-control">
                    <option value="">-- Tất cả danh mục --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(request('category_id') == $category->id)>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-5 mb-2 text-md-right">
                <button class="btn btn-info">Lọc</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Reset</a>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Thêm mới</a>
            </div>
        </form>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-bordered table-hover mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Danh mục</th>
                    <th>Giá</th>
                    <th>Giá KM</th>
                    <th>Tồn kho</th>
                    <th>Trạng thái</th>
                    <th width="160">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            <strong>{{ $product->name }}</strong><br>
                            <small class="text-muted">SKU: {{ $product->sku ?? 'N/A' }}</small>
                        </td>
                        <td>{{ $product->category?->name ?? 'Chưa phân loại' }}</td>
                        <td>{{ number_format((float) $product->price, 0, ',', '.') }}</td>
                        <td>{{ $product->sale_price !== null ? number_format((float) $product->sale_price, 0, ',', '.') : '-' }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            @if ($product->is_active)
                                <span class="badge badge-success">Hiển thị</span>
                            @else
                                <span class="badge badge-secondary">Ẩn</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-warning">Sửa</a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Xóa sản phẩm này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Chưa có dữ liệu sản phẩm.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        {{ $products->links() }}
    </div>
</div>
@endsection
