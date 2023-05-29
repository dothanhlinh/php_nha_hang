<!DOCTYPE html>
<html>
<head>
    <title>Hoá đơn bán hàng</title>
    <style>
        .invoice {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            font-family: Arial, sans-serif;
        }

        .invoice .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice .header h1 {
            font-size: 24px;
            margin: 0;
        }

        .invoice .address {
            margin-bottom: 20px;
        }

        .invoice .address span {
            display: block;
            margin-bottom: 5px;
        }

        .invoice .table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice .table th,
        .invoice .table td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }

        .invoice .table th {
            background-color: #f2f2f2;
        }

        .invoice .total {
            text-align: right;
            margin-top: 20px;
        }

        .invoice .note {
            margin-top: 20px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="header">
            <h1>Hoá đơn bán hàng</h1>
        </div>
        <div class="address" style="display: flex; justify-content: space-between;">
            <div class="col-md-6"> 
                <span>Tên khách hàng: {{$order_detail->tenKH}}</span>
                <span>Địa chỉ: Tứ Dân - Khoái Châu - Hưng Yên</span>
                <span>Số điện thoại: {{$order_detail->SDT}}</span>
                <span>Ngày đến: {{$order_detail->ngayDen}}</span>
            </div>
            <div class="col-md-6">
                <span>Bàn số: {{$order_detail->idBan}}</span>
                <span>Giờ đến: {{$order_detail->gioDen}}</span>
                <span>Số người: {{$order_detail->soLuongNguoi}}</span>
                <span>Số lượng bàn: {{$order_detail->Soluongban}}</span>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên món ăn</th>
                    <th>Số lượng</th>
                    {{-- <th>Hình ảnh</th> --}}
                    <th>Giá</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $index = 1;   
                    $tong_all = 0;
                @endphp
                @foreach ($order_details as $item)
                       @php
                            $tong = $item->giaBan * $item->soLuong;
                            $tong_all += $tong;
                       @endphp
                       <tr>
                        <td>{{$index++}}</td>
                        <td>{{$item->tenMonAn}}</td>
                        <td>{{$item->soLuong}}</td>
                        {{-- <td><img src="/assets/fronts/images/{{$item->hinhAnh}}" width="50px"></td> --}}
                        <td>${{$item->giaBan}}</td>                        
                        <td>${{$tong}}</td>                        
                    </tr>
                    @endforeach
            </tbody>
        </table>

        <div class="total">
            {{-- <td class="text-dark"> Thanh toán: ${{ $tong_all}}</td> --}}
            <strong>Tổng cộng: ${{ $tong_all}}</strong>
        </div>

        <div class="note">
            <p>
                <button onclick="window.print()"> In hoá đơn</button>
            </p>
        </div>
    </div>
</body>
</html>
