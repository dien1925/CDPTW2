@extends('layout.admin.main')

@section('content')
<h3>{{ $productdetail->productID}}</h3>
<h6>{{ $productdetail->brand}}</h6>
<h6>{{ $productdetail->guarantee}} tháng</h6>
<h6>{{ $productdetail->productImage1 }}</h6>
<h6>{{ $productdetail->productImage2}}</h6>
<h6>{{ $productdetail->productImage3}}</h6>

@endsection
