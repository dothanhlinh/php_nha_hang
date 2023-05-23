@extends('admin.app_admin')
@section('admin')
<div class="container float-right " style="margin-top: 100px">
    <div class="col-lg-12 ftco-animate">
        <h2 class="mb-3">{{$baiviet->tieuDe}}</h2>
      <p>{!!$baiviet->noiDung!!}</p>
      <p>
        <img src="/assets/fronts/images/{{$baiviet->hinhAnh}}" alt="" class="img-fluid">
      </p>
    </div>
</div>
@endsection