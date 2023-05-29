<?php

namespace App\Http\Controllers;

use App\Models\banModel;
use App\Models\ctdatbanModel;
use Illuminate\Http\Request;
use App\Models\datbanModel;
use App\Models\nhanvienModel;

class orderController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index_admin']]);
         $this->middleware('permission:role-create', ['only' => ['create']]);
         $this->middleware('permission:role-edit', ['only' => ['update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    // Phần addmin

    public function thanhtoandonhang($id){
        $res = datbanModel::find($id);
        $res1 = ctdatbanModel::with('monan_')->where('idDatBan',$id)->get();
        $_ban = banModel::all();
        return view('admin.ql_datban.hoadonban',['order_detail'=> $res,'order_details'=> $res1,'ban'=> $_ban]);
    }
    public function hoadonban(){
        return view('admin.ql_datban.hoadonban');
    }
    public function lichsuxoa(){
        $_news = datbanModel::all()->where('trangThai',-1);
        return view('admin.ql_datban.lichsuxoa_admin',['baiviet'=> $_news]);
    }

    public function index_admin(){
        $_news = datbanModel::all()->where('trangThai',1);
        return view('admin.ql_datban.datban_admin',['baiviet'=> $_news]);
    }
    
    public function daxacthuc_index(){
        $_news = datbanModel::all()->where('trangThai',2);
        return view('admin.ql_datban.daxacthu_admin',['baiviet'=> $_news]);
    } 
    public function chothanhtoan_index(){
        $_news = datbanModel::all()->where('trangThai',3);
        return view('admin.ql_datban.chothanhtoan_admin',['baiviet'=> $_news]);
    }
    
    public function order_details_admin($id){
        $res = datbanModel::find($id);
        $res1 = ctdatbanModel::with('monan_')->where('idDatBan',$id)->get();
        $_ban = banModel::all();
        return view('admin.ql_datban.view_datban_admin',['order_detail'=> $res,'order_details'=> $res1,'ban'=> $_ban]);
    }
    public function update_detail($id,Request $request){
        $post = datbanModel::find($id);
        $post->idBan = $request->input('idBan');
        $post->save();
        return redirect()->route('admin.quanlydatban');
    }

    public function updateorder_lichsuxoa($id){
        $baiviet = datbanModel::find($id);
        if ($baiviet) {
            $baiviet->trangThai = -1;
            $baiviet->lu_updated = date('Y-m-d H:i:s');
            $baiviet->update();
            return redirect()->route('admin.quanlydatban');
        } else {
            return redirect()->route('admin.quanlydatban');
        }
    }
    public function updateorder_ctt($id){
        $baiviet = datbanModel::find($id);
        if ($baiviet) {
            $baiviet->trangThai = 4;
            $baiviet->lu_updated = date('Y-m-d H:i:s');
            $baiviet->update();
            return redirect()->route('admin.chothanhtoan_index');
        } else {
            return redirect()->route('admin.chothanhtoan_index');
        }
    }
    public function updateorder_dxt($id){
        $baiviet = datbanModel::find($id);
        if ($baiviet) {
            $baiviet->trangThai = 3;
            $baiviet->lu_updated = date('Y-m-d H:i:s');
            $baiviet->update();
            return redirect()->route('admin.daxacthuc_admin');
        } else {
            return redirect()->route('admin.daxacthuc_admin');
        }
    }
    public function updateorder($id){
        $baiviet = datbanModel::find($id);
        if ($baiviet) {
            $baiviet->trangThai = 2;
            $baiviet->lu_updated = date('Y-m-d H:i:s');
            $baiviet->update();
            return redirect()->route('admin.quanlydatban');
        } else {
            return redirect()->route('admin.quanlydatban');
        }
    }
    public function destroy($id){

        // Tìm đơn hàng cần xoá
        $order = datbanModel::findOrFail($id);
        // Xoá chi tiết đơn hàng
        $orderDetails = ctdatbanModel::where('idDatBan', $order->id)->get();
        foreach ($orderDetails as $orderDetail) {
            $orderDetail->delete();
        }
        // Xoá đơn hàng
        $order->delete();
        // Chuyển hướng hoặc trả về thông báo thành công
        return view('admin.ql_datban.lichsuxoa_admin');
    }
    public function create(){
        $datban = datbanModel::all();
        $nhanvien = nhanvienModel::all();
        $_ban = banModel::all();
        return view('admin.ql_datban.create_datban_admin',['datban'=> $datban,'nhanvien'=>$nhanvien,'ban'=>$_ban]);
    }
    public function store(Request $request){
        $post = new datbanModel();
        $post->tenKH = $request->input('tenKH');
        $post->idBan = $request->input('idBan');
        $post->SDT = $request->input('SDT');
        $post->ngayDen = date('Y-m-d H:i:s');;
        $post->gioDen = date('Y-m-d H:i:s');;
        $post->soLuongNguoi = $request->input('soLuongNguoi');
        $post->Soluongban = $request->input('Soluongban');
        $post->tenKH = $request->input('tenKH');
        $post->created_date_time = date('Y-m-d H:i:s');
        $post->trangThai = 1;
        $post->created_by_user_id= $request->input('created_by_user_id');
        $post->save();
        return redirect()->route('admin.quanlydatban');
    }
    public function Edit($id){
        $res = datbanModel::find($id);
        $nv = datbanModel::all();
        return view('admin.ql_news.edit_news',['baiviet'=> $res,'nhanvien'=> $nv]);
    }
    public function SaveEdit($id,Request $request){
        $res = datbanModel::find($id);
        $res->tieuDe = $request->input('tieude');
        $res->hinhAnh = $request->input('hinhanh');
        $res->trangThai = $request->input('trangthai');
        $res->noiDung = $request->input('noidung');
        $res->created_by_user_id= $request->input('created_by_user_id');
        $res->save();
        return redirect()->route('admin.news_admin');
    }
}
