@extends('admin.app_admin')
@section('admin')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Lịch sử xoá đặt bàn</h4>
             
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
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
                                                <div class="form-button-action">
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Detail">
                                                        <a href="{{route('admin.admin_quanlydatban_view',$item->id)}}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                     </button>
                                                     <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <a onclick="return confirm('Bạn có có muốn xoá vĩnh viễn không ?');" href="{{route('admin.admin_quanlydatban_delete',$item->id)}}">
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
