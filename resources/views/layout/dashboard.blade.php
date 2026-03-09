@extends('layout.admin')

@section('page_title', 'Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>Quản trị</h3>
                <p>Danh mục và sản phẩm</p>
            </div>
            <div class="icon"><i class="fas fa-cogs"></i></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>Khách hàng</h3>
                <p>Trang danh sách sản phẩm</p>
            </div>
            <div class="icon"><i class="fas fa-store"></i></div>
        </div>
    </div>
</div>
@endsection
