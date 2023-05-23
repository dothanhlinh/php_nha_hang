
@extends('front.app')
@section('content')
<div id="main_order">   
    <section class="hero-wrap hero-wrap-2" style="background-image: url('/assets/fronts/images/bg_5.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate text-center mb-5">
					<h1 class="mb-2 bread">Đặt Bàn Ngay</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang Chủ <i class="fa fa-chevron-right"></i></a></span> <span>Đặt Bàn <i class="fa fa-chevron-right"></i></span></p>
				</div>
			</div>
		</div>
	</section>
	<section>
		@if(session('success'))
		<div class="alert alert-success" role="alert">
			{{session('success')}}
		  </div>
		@endif
		@if(session('dathangthanhcong'))
		<div class="alert alert-success" role="alert">
			{{session('dathangthanhcong')}}
		  </div>
		@endif
	</section>
	<section class="ftco-section ftco-wrap-about ftco-no-pb ftco-no-pt">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-sm-4 p-4 p-md-5 d-flex align-items-center justify-content-center bg-primary">
					<form action="{{route('home.checkout')}}" class="appointment-form" method="POST">
						@csrf
						<h3 class="mb-3">Đặt Bàn Của Bạn</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="name" name="hoten" class="form-control" placeholder="Họ Tên" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="sdt" class="form-control" placeholder="Số Điện Thoại"required>
								</div>
							</div>
		
							<div class="col-md-12">
								<div class="form-group">
									<div class="input-wrap">
										<div class="icon"><span class="fa fa-calendar"></span></div>
										<input type="text" name="ngayden" class="form-control book_date" placeholder="Ngày Đến"required>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<div class="input-wrap">
										<div class="icon"><span class="fa fa-clock-o"></span></div>
										<input type="text" name="gioden" class="form-control book_time ui-timepicker-input" placeholder="Giờ Đến"required autocomplete="off">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<div class="input-wrap">
										<div class="icon"><span class=""></span></div>
										<input type="number" name="soluongban" class="form-control " min="1" placeholder="Số lượng bàn" required>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<div class="input-wrap">
										<div class="icon"><span class=""></span></div>
										<input type="number" name="soluongnguoi" class="form-control " min="1" placeholder="Số lượng người" >
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<a href="#">
										<input type="submit" value="Đặt Bàn Ngay" class="btn btn-white py-3 px-4">
									</a>
								</div>
							</div>
						</div>
					</form>
						<!-- <a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
  						<span class="ion-ios-play"></span>
  					</a> -->
  				</div>
  				<div class="col-sm-8 wrap-about  ftco-animate img fadeInUp ftco-animated" >
					
					<table class="table">
						<thead class="thead-light">
						  <tr>
							<th scope="col">STT</th>
							<th scope="col">Món Ăn</th>
							<th scope="col">Hình Ảnh</th>
							<th scope="col">Giá</th>
							<th scope="col">Số Lượng</th>
							<th scope="col">Tổng</th>
							<th scope="col">Tác Vụ</th>
						  </tr>
						</thead>
						<tbody>
							@php $stt = 1 @endphp
							@php $total = 0 @endphp
							@if(session('order'))
							@foreach(session('order') as $id => $details)
								@php $total += $details['idGia'] * $details['soLuong'] @endphp
								<tr data-id="{{ $id }}">
									<th scope="row">{{$stt++}}</th>
									<td><h6 class="nomargin">{{ $details['tenMonAn'] }}</h6></td>
									<td><img src="/assets/fronts/images/{{ $details['hinhAnh']}}" width="50" height="50" class="img-responsive"/></td>
									<td >${{ $details['idGia'] }}</td>
									<td style="width:100px;">
										<input type="number" value="{{ $details['soLuong'] }}" class="form-control soLuong order_update" min="1" />
									</td>
									<td class="text-center">${{ $details['idGia'] * $details['soLuong']}}</td>
									<td class="actions" data-th="">
										<button class="btn btn-danger btn-sm order_delete"><i class="fa fa-trash-o"></i></button>
									</td>
								</tr>
							@endforeach
						@endif
						</tbody>
						<tfoot>
							<tr>
								<td colspan="11" class="text-right"><h3><strong>Tổng tiền: ${{ $total }}</strong></h3></td>
							</tr>
							<tr>
								<td colspan="11" class="text-right">
									<a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Tiếp tục thêm</a>
									{{-- <button class="btn btn-success"><i class="fa fa-money"></i> Checkout</button> --}}
								</td>
							</tr>
						</tfoot>
					</table>
					
			      </div>
			    </div>
			  </div>
			</div>
		</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row d-flex">
				<div class="col-md-6 d-flex">
					<div class="img img-2 w-100 mr-md-2" style="background-image: url(/assets/fronts/images/bg_6.jpg);"></div>
					<div class="img img-2 w-100 ml-md-2" style="background-image: url(/assets/fronts/images/bg_4.jpg);"></div>
				</div>
				<div class="col-md-6 ftco-animate makereservation p-4 p-md-5">
					<div class="heading-section ftco-animate mb-5">
						<!-- <span class="subheading">This is our secrets</span> -->
						<h2 class="mb-4">Thành phần hoàn hảo</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.
						</p>
						<p><a href="#" class="btn btn-primary">Tìm Hiểu Thêm</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	@section('js-main')
	<script >
		$(".order_update").change(function (e) {
        e.preventDefault();
        var ele = $(this);
			$.ajax({
				url: '{{route('home.update_order')}}',
				method: "patch",
				data: {
					_token: '{{ csrf_token() }}', 
					id: ele.parents("tr").attr("data-id"), 
					soLuong: ele.parents("tr").find(".soLuong").val()
				},
				success: function (response) {
				window.location.reload();
				}
			});
		});
		$(".order_delete").click(function (e) {
			e.preventDefault();
			var ele = $(this);
			if(confirm("Bạn có chắc chắn muốn xoá không ?")) {
				$.ajax({
					url: '{{ route('home.delete_order') }}',
					method: "DELETE",
					data: {
						_token: '{{ csrf_token() }}', 
						id: ele.parents("tr").attr("data-id")
					},
					success: function (response) {
						window.location.reload();
					}
				});
			}
		});
		
	</script>
	@endsection
	
@endsection
    