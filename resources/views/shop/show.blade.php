<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container py-5">
    <a href="{{ route('shop.index') }}" class="btn btn-link mb-3">← Quay lại</a>
    <div class="card">
        <div class="card-body">
            <h1>{{ $product->name }}</h1>
            <p class="text-muted">Danh mục: {{ $product->category?->name ?? 'Chưa phân loại' }}</p>
            <p><strong>Giá:</strong> {{ number_format((float) $product->price, 0, ',', '.') }} đ</p>
            <p><strong>Giá khuyến mãi:</strong> {{ $product->sale_price !== null ? number_format((float) $product->sale_price, 0, ',', '.') . ' đ' : 'Không có' }}</p>
            <p><strong>Tồn kho:</strong> {{ $product->stock }}</p>
            <p><strong>Mô tả:</strong><br>{{ $product->description ?: 'Chưa có mô tả' }}</p>
        </div>
    </div>
</div>
</body>
</html>
