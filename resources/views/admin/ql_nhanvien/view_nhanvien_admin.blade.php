@extends('admin.app_admin')
@section('admin')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Quản Lý Nhân viên</h4>
             
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <a href="{{route('admin.admin_quanlynhanvien_create')}}">
                                    <button class="btn btn-primary btn-round ml-auto" >
                                        <i class="fa fa-plus"></i>
                                        Thêm mới
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                {{-- @if (Section::has('thongbao')){
                                    <div class="alert alert-success">
                                        {{Section::get('thongbao')}}
                                    </div>
                                }
                                    
                                @endif --}}
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên nhân viên</th>
                                            {{-- <th>Hình Ảnh</th> --}}
                                            <th>Cmnd</th>
                                            <th>Vai trò</th>
                                            <th>Ngày vào</th>
                                            <th>Trạng Thái</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($nhanvien as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->tenNV}}</td>
                                            {{-- <td><img src="/assets/fronts/images/{{$item->hinhAnh}}" alt="" style="width:50px;"> </td> --}}
                                            <td>{{$item->cmnd}}</td>
                                            <td>{{$item->vaiTro}}</td>
                                            <td>{{$item->created_date_time}}</td>
                                            {{-- <td>{!!$item->noiDung!!}</td> --}}
                                            <td>
                                               
                                                {{($item->trangThai==1)?'Hoạt động':'Ngừng Hoạt Động'}}
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                       <a href="{{route('admin.admin_admin_quanlynhanvien_Edit',$item->id)}}">
                                                           <i class="fa fa-edit"></i>
                                                       </a>
                                                    </button>
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <a onclick="return confirm('Bạn có có muốn xoá không ?');" href="{{route('admin.admin_quanlynhanvien_delete',$item->id)}}">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
