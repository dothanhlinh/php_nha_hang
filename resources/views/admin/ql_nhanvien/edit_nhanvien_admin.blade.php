@extends('admin.app_admin')
@section('admin')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Cập nhật nhân viên</h4>
             
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.admin_admin_quanlynhanvien_Save_edit',$nhanvien->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                  <div class="col-md-6 mt-3">
                                    <label for="" >Tên nhân viên</label>
                                    <input type="text" class="form-control mt-2" value="{{$nhanvien->tenNV}}" placeholder="Nhập tên nhân viên" name="tenNV" required>
                                  </div>                                 
                                  <div class="col-md-6 mt-3">
                                    <label for="" >CMND/TCCC</label>
                                    <input type="text" class="form-control mt-2" value="{{$nhanvien->cmnd}}"placeholder="Nhập Cmnd" name="cmnd" required>
                                  </div>
                                  <div class="col-md-6 mt-3">
                                    <label for="" >Vai trò</label>
                                    <input type="text" class="form-control mt-2" value="{{$nhanvien->vaiTro}}" placeholder="Nhập vai trò" name="vaiTro" required>
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