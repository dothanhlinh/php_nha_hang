@extends('front.app')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('/assets/fronts/images/bg_5.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate text-center mb-5">
          <h1 class="mb-2 bread">Liên Hệ Với Chúng Tôi</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang Chủ <i class="fa fa-chevron-right"></i></a></span> <span>Liên Hệ Với Chúng Tôi <i class="fa fa-chevron-right"></i></span></p>
        </div>
      </div>
    </div>
  </section>
  
  <section class="ftco-section contact-section bg-light">
    <div class="container">
      <div class="row d-flex contact-info">
        <div class="col-md-12">
          <h2 class="h4 font-weight-bold">Thông tin liên hệ</h2>
        </div>
        <div class="w-100"></div>
        <div class="col-md-3 d-flex">
         <div class="dbox">
           <p><span>Địa Chỉ:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
         </div>
       </div>
       <div class="col-md-3 d-flex">
         <div class="dbox">
           <p><span>Số Điện Thoại:</span> <a href="tel://1234567920"> 0339257682</a></p>
         </div>
       </div>
       <div class="col-md-3 d-flex">
         <div class="dbox">
           <p><span>Email:</span> <a href="mailto:info@yoursite.com">linhdo05022k2@Heart.com</a></p>
         </div>
       </div>
       <div class="col-md-3 d-flex">
         <div class="dbox">
           <p><span>Website</span> <a href="#">linhdo05022k2.com</a></p>
         </div>
       </div>
     </div>
   </div>
  </section>
  <section class="ftco-section ftco-no-pt contact-section">
   <div class="container">
    <div class="row d-flex align-items-stretch no-gutters">
     <div class="col-md-6 p-5 order-md-last">
      <h2 class="h4 mb-5 font-weight-bold">Liên hệ chúng tôi</h2>
      <form action="#">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Tên Của Bạn">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Subject">
        </div>
        <div class="form-group">
          <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Ghi Chú"></textarea>
        </div>
        <div class="form-group">
          <input type="submit" value="Gửi" class="btn btn-primary py-3 px-5">
        </div>
      </form>
    </div>
    <div class="col-md-6 d-flex align-items-stretch">
      <div id="map"></div>
    </div>
  </div>
  </div>
  </section>
@endsection