<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo cửa hàng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('shop.index') }}">Demo Shop</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-sm">Vào trang admin</a>
    </div>
</nav>
<div class="container">
    <form class="row mb-4">
        <div class="col-md-10 mb-2">
            <input type="text" name="keyword" class="form-control" placeholder="Tìm sản phẩm..." value="{{ request('keyword') }}">
        </div>
        <div class="col-md-2 mb-2">
            <button class="btn btn-primary btn-block">Tìm</button>
        </div>
    </form>

    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="text-muted mb-2">{{ $product->category?->name ?? 'Chưa phân loại' }}</p>
                        <p class="mb-1"><strong>{{ number_format((float) ($product->sale_price ?? $product->price), 0, ',', '.') }} đ</strong></p>
                        @if ($product->sale_price)
                            <small class="text-muted"><del>{{ number_format((float) $product->price, 0, ',', '.') }} đ</del></small>
                        @endif
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="{{ route('shop.show', $product) }}" class="btn btn-outline-primary btn-block">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12"><div class="alert alert-info">Chưa có sản phẩm hiển thị.</div></div>
        @endforelse
    </div>

    {{ $products->links() }}
</div>
</body>
</html>
