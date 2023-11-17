@extends('layout.admin.main')
@section('content')

<div class="main-contentProduct">
    <h3>Tên sản phẩm: {{ $product->productName }}</h3>
    <h5>Hình ảnh sản phẩm: <div class="product-image-thumb" ><img src="{{ asset('public/upload/'. $product->productImage) }}" alt="Product Image"></div></h5>
    <h5>Giá: {{ $product->listPrice }} đồng</h5>
    <h5>Phần trăm giảm:{{ $product->discountPercent}}%</h5>
    <p></p>
</div>

@endsection
