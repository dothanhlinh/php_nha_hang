@extends('admin.app_admin')
@section('admin')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Cập nhật bàn ăn</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.admin_quanlyban_SaveEdit',$ban->id)}}" method="post">
                                @csrf
                                <div class="row">
                                 
                                  <div class="col-md-6 mt-3">
                                    <label for="" >Tên bàn</label>
                                    <input type="text" class="form-control mt-2" value="{{$ban->tenBan}}" placeholder="Nhập Tên" name="tenBan"required>
                                  </div>
                                  <div class="col-md-6 mt-3">
                                    <label for="" >Kích cỡ</label>
                                    <input type="number" min="1" max="5" class="form-control mt-2" value="{{$ban->size}}" placeholder="Nhập Tên" name="size" required >
                                  </div>
                                 
                                  <div class="col-md-6 mt-3">
                                      <label for="" > Trạng thái </label>
                                      <select name="trangThai" value="{{$ban->trangThai}}" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" >
                                        <option selected>Chọn Trạng Thái</option>
                                        <option value="1">Hoạt động</option>
                                        <option value="2">Ngừng hoạt động</option>
                                      </select>
                                  </div>
                                  <div class="col-md-6 mt-3">
                                    <label for="" > Nhân Viên</label>
                                    <select name="created_by_user_id" value="{{$ban->created_by_user_id}}"class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" >
                                      <option selected>Chọn Nhân Viên</option>
                                       @foreach ($nhanvien as $item)
                                        <option value="{!!$item->id!!}"{{($item->id == $ban->created_by_user_id)?'selected':''}}>{!!$item->tenNV!!}</option>
                                      @endforeach
                                      
                                    </select>
                                </div>
                                    <div class="col-md-12 mt-3">
                                      <textarea id="moTa" cols="78"value="{!!$ban->moTa!!}" rows="10" name="moTa" placeholder="Ghi Chú "></textarea required>
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