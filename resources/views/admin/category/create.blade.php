@extends('layout.admin')

@section('page_title', 'Thêm danh mục')
@section('breadcrumb', 'Thêm danh mục')

@section('content')
<div class="card card-primary">
    <div class="card-header"><h3 class="card-title mb-0">Thêm danh mục</h3></div>
    <form action="{{ route('admin.categories.store') }}" method="post">
        @csrf
        <div class="card-body">
            @include('admin.category._form')
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>
@endsection
