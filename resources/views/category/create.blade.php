@extends('layout.admin.main')
@section('content')
    <h5 style="font-weight: bold;">Thêm danh mục</h5>
    <div class="card-body">
        @include('error')
     </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <form action="{{ route('category.store') }}" method="post" onsubmit="return validateForm()">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="categoryName" style="font-weight: bold">Danh mục sản phẩm</label>
                        <input type="text" name="categoryName" id="categoryName" class="form-control">

                        {{-- Hiển thị thông báo lỗi --}}
                        <span id="charCount" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="cate_description" style="font-weight: bold">Bài viết danh mục</label>
                        <textarea name="cate_description" class="form-control summernote" id="summernote"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" id="submitButton" value="Thêm danh mục" class="btn btn-info btn-sm">
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


            $('#categoryName').on('input', function() {
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
            var currentLength = $('#categoryName').val().length;

            if (currentLength > maxLength) {
                alert('Vui lòng không nhập quá ' + maxLength + ' ký tự.');
                return false; 
            }

            $('#submitButton').prop('disabled', true); 
        }
    </script>
@endsection
