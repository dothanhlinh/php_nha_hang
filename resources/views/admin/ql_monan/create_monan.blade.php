@extends('admin.app_admin')
@section('admin')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Thêm thực đơn món ăn </h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.ql_monan.create_monan_store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                  <div class="col-md-6 mt-3">
                                    <label for="" >Loại Món Ăn</label>
                                    <select name="idLoaiMonAn" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" >
                                      <option selected>Chọn Loại Món Ăn</option>
                                      @foreach ($loaimonan as $item)
                                        <option value="{!!$item->id!!}">{!!$item->tenLoai!!}</option>
                                      @endforeach
                                    </select>
                                </div>
                                  <div class="col-md-6 mt-3">
                                    <label for="" >Tên Món ăn</label>
                                    <input type="text" class="form-control mt-2" placeholder="Nhập Tên" name="tenMonAn"required>
                                  </div>
                                  <div class="col-md-6 mt-3">
                                    <label for="" >Giá Bán</label>
                                    <select name="idGia" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" >
                                      <option selected>Chọn Giá Bán</option>
                                      @foreach ($giaban as $item)
                                        <option value="{{$item->id}}">{{number_format($item->giaBan)}}</option>
                                      @endforeach
                                    </select>
                                </div>
                                  <div class="col-md-6 mt-3 row">
                                    <div class="col-md-6">
                                      <label for="" >Hình ảnh</label>
                                      <input type="file"onchange="previewImage(event)" id="imageInput"class="form-control mt-2" placeholder="Enter Images" name="hinhAnh"required>
                                    </div>
                                    <div class="col-md-6">
                                      <img id="preview" src="/assets/fronts/images/"alt=""  style=" max-width: 85px; max-height: 85px; margin-top: 8px;" />
                                    </div>
                                  </div>
                                  <div class="col-md-6 mt-3">
                                      <label for="" > Trạng thái </label>
                                      <select name="trangThai" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" >
                                        <option selected>Chọn Trạng Thái</option>
                                        <option value="1">Hoạt động</option>
                                        <option value="2">Ngừng hoạt động</option>
                                      </select>
                                  </div>
                                  <div class="col-md-6 mt-3">
                                    <label for="" > Nhân Viên</label>
                                    <select name="created_by_user_id" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" >
                                      <option selected>Chọn Nhân Viên</option>

                                       @foreach ($nhanvien as $item)
                                        <option name="created_by_user_id"value="{!!$item->id!!}">{!!$item->tenNV!!}</option>
                                      @endforeach
                                      
                                    </select>
                                </div>
                                
                                    <div class="col-md-12 mt-3">
                                      <textarea id="moTa" cols="78" rows="10" name="moTa" placeholder="Ghi Chú "></textarea required>
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
  CKEDITOR.replace('moTa')
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