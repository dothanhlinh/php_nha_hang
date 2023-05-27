@extends('admin.app_admin')
@section('admin')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Quản lý bàn</h4>
             
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <a href="{{route('admin.admin_quanlyban_create')}}">
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
                                            <th>Tên bàn</th>
                                            <th>kích cỡ</th>
                                            <th>Mô tả</th>
                                            <th>Trạng Thái</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($ban as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td >{{$item->tenBan}}</td>
                                            <td>{!!$item->size!!}</td>
                                            <td>{!!$item->moTa!!}</td>
                                            <td>
                                                {{($item->trangThai==1)?'Hoạt động':'Ngừng Hoạt Động'}}
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                       <a href="{{route('admin.admin_quanlyban_Edit',$item->id)}}">
                                                           <i class="fa fa-edit"></i>
                                                       </a>
                                                    </button>
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <a onclick="return confirm('Bạn có có muốn xoá không ?');" href="{{route('admin.admin_quanlyban_delete',$item->id)}}">
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
