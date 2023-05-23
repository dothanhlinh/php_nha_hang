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
                            <div class="d-flex align-items-center">
                                {{-- <a href="{{route('admin.ql_news.create_news')}}">
                                    <button class="btn btn-primary btn-round ml-auto" >
                                        <i class="fa fa-plus"></i>
                                        Thêm mới
                                    </button>
                                </a> --}}
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
                                                    Đơn đặt bàn mới
                                                @else
                                                    Đã xử lý
                                                    
                                                @endif
                                                {{-- {{($item->trangThai==1)?'Hoạt động':'Chưa xác thực'}} --}}
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Detail">
                                                        <a href="{{route('admin.admin_quanlydatban_view',$item->id)}}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                     </button>
                                                    {{-- <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                       <a href="{{route('admin.ql_news.edit_news',$item->id)}}">
                                                           <i class="fa fa-edit"></i>
                                                       </a>
                                                    </button> --}}
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <a onclick="return confirm('Bạn có có muốn xoá không ?');" href="{{route('admin.delete_admin',$item->id)}}">
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
