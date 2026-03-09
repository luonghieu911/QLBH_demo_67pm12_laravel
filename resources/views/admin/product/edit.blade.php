@extends('layout.admin')

@section('page_title', 'Cập nhật sản phẩm')
@section('breadcrumb', 'Cập nhật sản phẩm')

@section('content')
<div class="card card-warning">
    <div class="card-header"><h3 class="card-title mb-0">Cập nhật sản phẩm</h3></div>
    <form action="{{ route('admin.products.update', $product) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card-body">
            @include('admin.product._form')
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-warning">Cập nhật</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>
@endsection
