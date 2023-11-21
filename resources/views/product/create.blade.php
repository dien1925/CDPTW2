@extends('layout.admin.main')
@section('content')
<h5 style="font-weight: bold">Thêm sản phẩm</h5>
{{--  hiển thị nội dung lỗi --}}
<div class="card-body">
   @include('error')
</div>
{{--  --}}
<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <form action="{{ route('product.store') }}" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
            {{ csrf_field() }}  
            <div class="form-group">
                <label for="categoryID" style="font-weight: bold">Danh mục:</label>
                <select name="categoryID" id="categoryID" class="form-control">
                    @foreach ($categories as $category)
                    <option value="{{ $category->categoryID }}">
                    {{ $category->categoryName }}
                    </option>
                        
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="productName" style="font-weight: bold">Tên sản phẩm</label>
                <input type="text" name="productName" id="productName" class="form-control">
                <span id="charCount" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="productImage" style="font-weight: bold">Chọn hình ảnh sản phẩm:</label>
                <input type="file" name="productImage" id="productImage" class="form-control-file"> 
            </div>
            <div class="form-group">
                <label for="listPrice" style="font-weight: bold">Giá sản phẩm</label>
                <input type="text" name="listPrice" id="listPrice" class="form-control" pattern="[0-9]+>
            </div>
            <div class="form-group">
                <label for="discountPercent" style="font-weight: bold">Phần trăm khuyến mãi</label>
                <input type="text" name="discountPercent" id="discountPercent" class="form-control" pattern="[0-9]+>
            </div>
            <div class="form-group">
                <label for="description" style="font-weight: bold">Mô tả sản phẩm</label>
                <textarea name="description" class="form-control summernote" id="summernote"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" id="submitButton" class="btn btn-info btn-sm" value="Tạo sản phẩm">
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 240,
            minHeight: null,
            maxHeight: null,
            focus: false
        });


        $('#productName').on('input', function() {
            var maxLength = 255; 
            var currentLength = $(this).val().length;

            if (currentLength > maxLength) {
                $('#charCount').text('Vui lòng không nhập quá ' + maxLength + ' ký tự.');
            } else {
                $('#charCount').text('');
            }
        });
    });

    function validateForm() {
        var maxLength = 255; 
        var currentLength = $('#productName').val().length;

        if (currentLength > maxLength) {
            alert('Vui lòng không nhập quá ' + maxLength + ' ký tự.');
            return false; 
        }

        $('#submitButton').prop('disabled', true); 
    }
</script>
@endsection