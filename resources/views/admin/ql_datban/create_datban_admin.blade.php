@extends('admin.app_admin')
@section('admin')


{{-- action="{{route(admin.store)}}" method="POST" --}}
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Thêm đặt bàn </h4>
             
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.admin_quanlydatban_create_store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                  <div class="col-md-6 mt-3">
                                    <label for="" > Tên Khách hàng</label>
                                    <input type="text" class="form-control mt-2" placeholder="Nhập tên khách hàng" name="tenKH" required>
                                  </div>
                                  <div class="col-md-6 mt-3">
                                    <label for="" >SĐT</label>
                                    <input type="text" class="form-control mt-2" placeholder="Nhập tên số điện thoại" name="SDT" required>
                                  </div>
                                  <div class="col-md-6 mt-3">
                                    <label for="" > Ngày đến</label>
                                    <input type="date" class="form-control mt-2" placeholder="Nhập ngày đến" name="ngayDen" required>
                                  </div>
                                  <div class="col-md-6 mt-3">
                                    <label for="" >Giờ đến</label>
                                    <input type="time" class="form-control mt-2" placeholder="Nhập giờ đến" name="gioDen" required>
                                  </div>
                                  <div class="col-md-6 mt-3">
                                    <label for="" >Số lượng người</label>
                                    <input type="text" class="form-control mt-2" placeholder="Nhập số lượng người" name="soLuongNguoi" required>
                                  </div>
                                  <div class="col-md-6 mt-3">
                                    <label for="" >Số lượng bàn</label>
                                    <input type="text" class="form-control mt-2" placeholder="Nhập số lượng bàn" name="Soluongban" required>
                                  </div>
                                  {{-- <div class="col-md-6 mt-3">
                                      <label for="" > Trạng thái </label>
                                      <select name="trangthai" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" >
                                        <option selected>Chọn Trạng Thái</option>
                                        <option value="1">Hoạt động</option>
                                        <option value="2">Ngừng hoạt động</option>
                                      </select>
                                  </div> --}}
                                  <div class="col-md-6 mt-3">
                                    <label for="" >Bàn ăn</label>
                                    <select name="idBan" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" >
                                      <option selected>Chọn bàn ăn</option>
                                      @foreach ($ban as $item)
                                        <option value="{!!$item->id!!}">{!!$item->tenBan!!}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="" >Nhân Viên</label>
                                    <select name="created_by_user_id" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" >
                                      <option selected> Nhân Viên đặt bàn</option>
                                      @foreach ($nhanvien as $item)
                                        <option value="{!!$item->id!!}">{!!$item->tenNV!!}</option>
                                      @endforeach
                                    </select>
                                </div>
                                  
                            </div>
                            <div class="col-md-6 mt-3">
                                <button type="submit" class="btn btn-primary" > Lưu</button>
                                <button class="btn btn-danger ml-4" > Quay lại</button>
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