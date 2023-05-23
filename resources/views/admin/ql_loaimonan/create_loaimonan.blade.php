@extends('admin.app_admin')
@section('admin')

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
                            <form action="{{route('admin.ql_loaimonan.create_lmonan_store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                 
                                  <div class="col-md-6 mt-3">
                                    <label for="" >Tên Loại Món ăn</label>
                                    <input type="text" class="form-control mt-2" placeholder="Nhập Tên" name="tenLoai"required>
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
                                        <option value="{!!$item->id!!}">{!!$item->tenNV!!}</option>
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
</script>
@endsection