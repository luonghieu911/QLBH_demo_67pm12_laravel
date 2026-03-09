@extends('layout.admin')

@section('page_title', 'Cập nhật danh mục')
@section('breadcrumb', 'Cập nhật danh mục')

@section('content')
<div class="card card-warning">
    <div class="card-header"><h3 class="card-title mb-0">Cập nhật danh mục</h3></div>
    <form action="{{ route('admin.categories.update', $category) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card-body">
            @include('admin.category._form')
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-warning">Cập nhật</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>
@endsection
