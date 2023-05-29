
@extends('admin.app_admin')
@section('admin')
@php
 $index =1;   
 $tong_all = 0;
@endphp
<div class="main-panel">
    <div class="content">
        <section>
            <div class="ml-4">
                <form action="{{route('admin.admin_quanlydatban_ban',$order_detail->id)}}" method="post">
                    @csrf
                    <div class="col-md-6 mt-3">
                        <label for="" >Chọn Bàn ăn</label>
                        <select style="width: 50%;" name="idBan" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" >
                          <option selected>Chọn bàn ăn</option>
                           @foreach ($ban as $item)
                            <option value="{!!$item->id!!}"{{($item->id == $order_detail->idBan)?'selected':''}}>{!!$item->tenBan!!}</option>
                          @endforeach
                        </select>
                        <a href=""class="mr-2 ">
                            <button type="submit" class="btn_save"  >
                                <i class="bi bi-check mr-2 " style="font-size: 15px;"></i>Xác nhận
                            </button>
                        </a>
                    </div>
                </form>
            </div>
        </section>
        <div class="page-inner">
            <div class="page-header">
                <div class="header_detail">
                    <h2 class="panel-heading text-center" style="line-height:50px; color:#31708f;background-color: #bce8f1;width:610%;height:50px;">Thông tin khách hàng</h2>
                </div>
            </div>
            <div class="row">
                <table class="table" >
                    <thead class="thead-light">
                        <tr>
                            <th>Mã đơn</th>
                            <th>Khách hàng</th>
                            <th>SĐT</th>
                            <th>CMND/TCCC</th>
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
                            <td>{{$order_detail->cmnd}}</td>
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
                
                
            </div>
            
        </div>
    </div>
    
</div>
@endsection



