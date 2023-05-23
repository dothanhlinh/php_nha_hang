
@extends('admin.app_admin')
@section('admin')
@php
 $index =1;   
 $tong_all = 0;
@endphp
<div class="main-panel">
    <div class="content">
       
        <div class="page-inner">
            <div class="page-header">
                <div class="header_detail">
                    <h2 class="panel-heading text-center" style="line-height:50px; color:#31708f;background-color: #bce8f1;width:600%;height:50px;">Thông tin khách hàng</h2>
                </div>
            </div>
            <div class="row">
                <table class="table" >
                    <thead class="thead-light">
                        <tr>
                            <th>Mã đơn</th>
                            <th>Khách hàng</th>
                            <th>SĐT</th>
                            <th>Ngày đặt</th>
                            <th>Ngày đến</th>
                            <th>Giờ đến</th>
                            <th>Số lượng bàn</th>
                            <th>Số lượng người</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                       
                        <tr>
                            <td>{{$order_detail->id}}</td>
                            <td>{{$order_detail->tenKH}}</td>
                            <td>{{$order_detail->SDT}}</td>
                            <td>{{$order_detail->created_date_time}}</td>
                            <td>{{$order_detail->ngayDen}}</td>
                            <td>{{$order_detail->gioDen}}</td>
                            <td>{{$order_detail->Soluongban}}</td>
                            <td>{{$order_detail->soLuongNguoi}}</td>
                            
                            
                        </tr>
                    </tbody>
                </table>
              
            </div>
            
        </div>
        <div class="page-inner">
            <div class="page-header">
                <div class="header_detail">
                    <h2 class="panel-heading text-center" style="line-height:50px; color:#31708f;background-color: #bce8f1;width:648%;height:50px;">
                        Chi tiết đơn đặt bàn
                    </h2>
                </div>
            </div>
            <div class="row">
                <table class="table" >
                    <thead class="thead-light">
                        <tr>
                            <th>STT</th>
                            <th>Tên món ăn</th>
                            <th>Số lượng</th>
                            <th>Hình ảnh</th>
                            <th>Giá</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    
                    <tbody> 
                       @foreach ($order_details as $item)
                       @php
                            $tong = $item->giaBan * $item->soLuong;
                            $tong_all += $tong;
                       @endphp
                       <tr>
                        <td>{{$index++}}</td>
                        <td>{{$item->tenMonAn}}</td>
                        <td>{{$item->soLuong}}</td>
                        <td><img src="/assets/fronts/images/{{$item->hinhAnh}}" width="50px"></td>
                        <td>${{$item->giaBan}}</td>                        
                        <td>{{$tong}}</td>                        
                                              
                    </tr>
                       @endforeach
                        <tr>
                            <td class="text-dark"> Thanh toán: ${{ $tong_all}}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-3 ">
                    <a href="" class="mr-2 ">
                        <button type="button" class="btn_close"  >
                            <i class="glyphicon glyphicon-minus-sign mr-2 " style="font-size: 15px;"></i>Bỏ qua
                        </button>
                    </a>
                    <a href=""class="mr-2 ">
                        <button type="button" class="btn_save"  >
                            <i class="bi bi-check mr-2 " style="font-size: 15px;"></i>Xác nhận
                        </button>
                    </a>
                  </div>
            </div>
            
        </div>
    </div>
    
</div>
@endsection



