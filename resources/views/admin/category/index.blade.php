@extends('layout.admin')

@section('page_title', 'Danh sách danh mục')
@section('breadcrumb', 'Danh mục')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">Danh sách danh mục</h3>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Thêm mới</a>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-bordered table-hover mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Danh mục cha</th>
                    <th>Trạng thái</th>
                    <th width="160">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->parent?->name ?? 'Danh mục gốc' }}</td>
                        <td>
                            @if ($category->is_active)
                                <span class="badge badge-success">Hiển thị</span>
                            @else
                                <span class="badge badge-secondary">Ẩn</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-warning">Sửa</a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Xóa danh mục này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Chưa có dữ liệu danh mục.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
