@extends('layout.admin')

@section('page_title', 'Thêm sản phẩm')
@section('breadcrumb', 'Thêm sản phẩm')

@section('content')
<div class="card card-primary">
    <div class="card-header"><h3 class="card-title mb-0">Thêm sản phẩm</h3></div>
    <form action="{{ route('admin.products.store') }}" method="post">
        @csrf
        <div class="card-body">
            @include('admin.product._form')
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>
@endsection
