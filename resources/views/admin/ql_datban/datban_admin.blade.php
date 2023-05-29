@extends('admin.app_admin')
@section('admin')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Quản Lý đặt bàn</h4>
             
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="mb-3 mt-3">
                                Trang chưa xác thực đơn hàng 
                             </div>
                            <div class="d-flex align-items-center">
                                <a href="{{route('admin.admin_quanlydatban_create')}}">
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
                                            <th>Khách hàng</th>
                                            <th>SĐT</th>
                                            <th>Ngày đặt</th>
                                            <th>Trạng Thái</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($baiviet as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->tenKH}}</td>
                                            <td>{{$item->SDT}}</td>
                                            <td>{{$item->created_date_time}}</td>
                                            
                                            <td>
                                                @if ($item->trangThai==1)
                                                <p style="color: red"> Đơn đặt bàn mới</p>
                                                @endif
                                                @if ($item->trangThai==2)
                                                    
                                                    <p style="color: rgb(36, 172, 36)"> Đã xác thực</p>
                                            
                                                @endif
                                                @if ($item->trangThai==3)
                                                <p style="color: rgb(36, 172, 36)"> Chờ thanh Toán</p>

                                                @endif
                                                @if ($item->trangThai==4)
                                                    Đã Thanh Toán 
                                                @endif
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" title=""data-toggle="modal" data-target="#exampleModal{{$item->id}}" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                        <i class="fas fa-check-circle"></i>
                                                       
                                                    </button>
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Detail">
                                                        <a href="{{route('admin.admin_quanlydatban_view',$item->id)}}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                     </button>
                                                    
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <a onclick="return confirm('Bạn có có muốn xoá không ?');" href="{{route('admin.updateorder_lichsuxoa',$item->id)}}">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Button trigger modal -->
                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                Bạn có muốn xác thực đơn hàng không ?
                                                </div>
                                                <form action="{{route('admin.admin_update_trangthai',$item->id)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                                    <button type="submit" class="btn btn-primary">Xác thực </button>
                                                </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>


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
