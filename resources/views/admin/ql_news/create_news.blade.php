@extends('admin.app_admin')
@section('admin')


{{-- action="{{route(admin.store)}}" method="POST" --}}
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Thêm Tin Tức </h4>
             
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.ql_news.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                  <div class="col-md-6 mt-3">
                                    <label for="" > Tiêu Đề</label>
                                    <input type="text" class="form-control mt-2" placeholder="Nhập tiêu đề" name="tieude" required>
                                  </div>
                                  <div class="col-md-6 mt-3 row">
                                    <div class="col-md-6">
                                      <label for="" >Hình ảnh</label>
                                      <input type="file"onchange="previewImage(event)"  id="imageInput"class="form-control mt-2" placeholder="Enter Images" name="hinhanh"required>
                                    </div>
                                    <div class="col-md-6 ">
                                      <img id="preview" style=" max-width: 85px; max-height: 85px; margin-top: 8px;" />
                                    </div>
                                  </div>
                                  <div class="col-md-6 mt-3">
                                      <label for="" > Trạng thái </label>
                                      <select name="trangthai" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" >
                                        <option selected>Chọn Trạng Thái</option>
                                        <option value="1">Hoạt động</option>
                                        <option value="2">Ngừng hoạt động</option>
                                      </select>
                                  </div>
                                  <div class="col-md-6 mt-3">
                                    <label for="" >Nhân Viên</label>
                                    <select name="created_by_user_id" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" >
                                      <option selected>Chọn Tên Nhân Viên Đăng Bài</option>
                                      @foreach ($nhanvien as $item)
                                        <option value="{!!$item->id!!}">{!!$item->tenNV!!}</option>
                                      @endforeach
                                    </select>
                                </div>
                                    <div class="col-md-12 mt-3">
                                      <textarea id="noidung" cols="78" rows="10" name="noidung" placeholder="Ghi Chú "></textarea required>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                    <button type="submit" class="btn btn-primary" > Lưu</button>
                                    <button class="btn btn-danger ml-4" > Quay lại</button>
                                  </div>
                                </div>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
{{-- @yield('js-custom') --}}
@section('js-custom')
<script>
  CKEDITOR.replace('noidung')
  function previewImage(event) {
      var input = event.target;
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              var imagePreview = document.getElementById('preview');
              imagePreview.src = e.target.result;
          };
          reader.readAsDataURL(input.files[0]);
      }
  }
</script>
@endsection