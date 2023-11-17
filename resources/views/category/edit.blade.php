@extends('layout.admin.main')
@section('content')
<h5 style="font-weight:bold">Chỉnh sửa danh mục </h5>
  <div class="container">
      <div class="row">
          <div class="col-sm-10">
              <form action="{{ route('category.update',$category->categoryID) }}" method="post" onsubmit="return validateForm()">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                <label for="categoryname" style="font-weight: bold">Tên danh mục</label>
                <input type="text" name="categoryName" id="categoryName" class="form-control" value={{ $category->categoryName }}>
                <span id="charCount" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="description" style="font-weight: bold">Bài viết danh mục</label>
                <textarea name="cate_description" class="form-control summernote" id="summernote"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info btn-sm" value="Lưu">
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

        return true; 
    }
</script>
@endsection