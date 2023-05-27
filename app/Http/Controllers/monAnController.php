<?php

namespace App\Http\Controllers;

use App\Models\monanModel;
use App\Models\giabanModel;
use App\Models\nhanvienModel;
use App\Models\loaimonanModel;
use App\Models\ctdatbanModel;
use App\Models\datbanModel;
use DateTime;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class monAnController extends Controller
{
    public function index(){

        $_monan = monanModel::all()->where('idLoaiMonAn',1);
        $_monan1 = monanModel::all()->where('idLoaiMonAn',2);
        $_monan2 = monanModel::all()->where('idLoaiMonAn',3);
        return view('menu',['res'=> $_monan,'res1'=> $_monan1,'res2'=> $_monan2]);
    }
    // public function order(){
    //     view('order');
    // }

    public function checkout(Request $request){
        $post = new datbanModel();
        $post->tenKH = $request->input('hoten');
        $post->	SDT  = $request->input('sdt');
        $post->ngayDen = date('Y-m-d H:i:s');
        $post->gioDen = date('Y-m-d H:i:s');
        $post->soLuongNguoi = $request->input('soluongnguoi');
        $post->cmnd = $request->input('cmnd');
        $post->Soluongban = $request->input('soluongban');
        $post->created_date_time = date('Y-m-d H:i:s');
        $post->trangThai = 1;
        $post->save();
        $order = session()->get('order',[]);
        if($order != null){
            foreach($order as $item)
            {
                // dd($order);
                $orderdetail = new ctdatbanModel();
                $orderdetail->idDatBan = $post-> id;
                $orderdetail-> idLoaiMonAn = $item['id'];
                $orderdetail-> tenMonAn = $item['tenMonAn'];
                $orderdetail-> hinhAnh = $item['hinhAnh'];
                $orderdetail->giaBan = $item['idGia'];
                $orderdetail->soLuong = $item['soLuong'];
                $orderdetail->save();
                $request->session()->forget('order');
                
            }   
        }
        return redirect()->route('home.order')->with('dathangthanhcong','Đặt hàng thành công!');

    }


    public function addToOrder($id){
        $monan = monanModel::findOrFail($id);
        $order = session()->get('order',[]);
        if(isset($order[$id])){
            $order[$id]['soLuong']++;

        }
        else{
            $order[$id]=[
                "id"=> $monan->id,
                "tenMonAn"=>$monan->tenMonAn,
                "hinhAnh"=>$monan->hinhAnh,
                "idGia"=>$monan->idGia,
                "soLuong"=>1
            ];
        }
        session()->put('order',$order);
        return redirect()->back()->with('success','Thêm Thành công!');
    }

    public function update_order(Request $request)
    {
        if($request->id && $request->soLuong){
            $order = session()->get('order');
            $order[$request->id]["soLuong"] = $request->soLuong;
            session()->put('order', $order);
            session()->flash('success', 'Đã cập nhật thành công !');
        }
    }
    public function delete_order(Request $request)
    {
        if($request->id) {
            $order = session()->get('order');
            if(isset($order[$request->id])) {
                unset($order[$request->id]);
                session()->put('order', $order);
            }
            session()->flash('success', 'Đã xoá thành công !');
        }
    }


     // Phần admin
     public function index_admin(){
        $monan = monanModel::all();
        return view('admin.ql_monan.monan_admin',compact('monan'));
    
    }
    public function destroy($id){
        $res = monanModel::find($id);
        $res -> delete();
        return redirect()->route('admin.ql_monan.monan_admin');
    }
    public function create(){
        $_monan = monanModel::all();
        $_giaban =  giabanModel::all();
        $_nv = nhanvienModel::all();
        $_loaimonan = loaimonanModel::all();
        return view('admin.ql_monan.create_monan',['monan'=> $_monan,'giaban'=> $_giaban,'nhanvien'=> $_nv,'loaimonan'=> $_loaimonan]);
    }
    public function store(Request $request){
        if ($request->has('hinhAnh')){
            $file = $request-> hinhAnh;
            $file_name = $file->getClientOriginalName();
            // dd($file_name);
            $file->move(public_path('assets/fronts/images'),$file_name);
        }
        $request-> merge(['hinhAnh'=> $file_name]);
        $post = new monanModel();
        $post->idLoaiMonAn = $request->input('idLoaiMonAn');
        $post->idGia  = $request->input('idGia');
        $post->tenMonAn = $request->input('tenMonAn');
        $post->hinhAnh = $request->input('hinhAnh');
        $post->moTa = $request->input('moTa');
        $post->trangThai = $request->input('trangThai');
        $post->created_by_user_id= $request->input('created_by_user_id');
        $post->save();
        return redirect()->route('admin.ql_monan.monan_admin');
    }

    public function Edit($id){
        $res = monanModel::find($id);
        $_giaban =  giabanModel::all();
        $_nv = nhanvienModel::all();
        $_loaimonan = loaimonanModel::all();
        return view('admin.ql_monan.edit_monan',['monan'=> $res,'giaban'=> $_giaban,'nhanvien'=> $_nv,'loaimonan'=> $_loaimonan]);
    }
    public function SaveEdit($id,Request $request){
        $post = monanModel::find($id);
        if ($request->has('hinhAnh')){
            $file = $request-> hinhAnh;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('assets/fronts/images'),$file_name);
        }
        $request-> merge(['hinhAnh'=> $file_name]);
        $post->idLoaiMonAn = $request->input('idLoaiMonAn');
        $post->idGia  = $request->input('idGia');
        $post->tenMonAn = $request->input('tenMonAn');
        $post->hinhAnh = $request->input('hinhAnh');
        $post->moTa = $request->input('moTa');
        $post->trangThai = $request->input('trangThai');
        $post->created_by_user_id= $request->input('created_by_user_id');
        
        $post->save();
        return redirect()->route('admin.ql_monan.monan_admin');
    }
}
