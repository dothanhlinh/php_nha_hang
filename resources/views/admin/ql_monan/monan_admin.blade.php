@extends('admin.app_admin')
@section('admin')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Quản Lý Thực Đơn món ăn</h4>
             
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <a href="{{route('admin.ql_monan.create_monan')}}">
                                    <button class="btn btn-primary btn-round ml-auto" >
                                        <i class="fa fa-plus"></i>
                                        Thêm mới
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                             
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên Loại</th>
                                            <th>Tên Món Ăn</th>
                                            <th>Hình Ảnh</th>
                                            <th>Giá Bán</th>
                                            <th>Trạng Thái</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($monan as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td >{{$item->idLoaiMonAn }}</td>
                                            <td>{{$item->tenMonAn}}</td>
                                            <td><img src="/assets/fronts/images/{{$item->hinhAnh}}" alt="" style="width:50px;"> </td>
                                            <td>{!!$item->idGia!!}</td>
                                            <td>
                                               
                                                {{($item->trangThai==1)?'Hoạt động':'Ngừng Hoạt Động'}}
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                       <a href="{{route('admin.ql_monan.edit_monan',$item->id)}}">
                                                           <i class="fa fa-edit"></i>
                                                       </a>
                                                    </button>
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <a onclick="return confirm('Bạn có có muốn xoá không ?');" href="{{route('admin.ql_monan.delete_admin',$item->id)}}">
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
