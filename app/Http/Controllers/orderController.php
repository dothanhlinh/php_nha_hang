<?php

namespace App\Http\Controllers;

use App\Models\ctdatbanModel;
use Illuminate\Http\Request;
use App\Models\datbanModel;

class orderController extends Controller
{
    // Phần addmin
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
        return view('admin.ql_datban.view_datban_admin',['order_detail'=> $res,'order_details'=> $res1]);
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
        $res = datbanModel::find($id);
        $res -> delete();
        return redirect()->route('admin.news_admin');
    }

    public function create(){
        $nv = datbanModel::all();
        return view('admin.ql_news.create_news',['nhanvien'=> $nv]);
    }
    public function store(Request $request){
        if ($request->has('hinhanh')){
            $file = $request-> hinhanh;
            $file_name = $file->getClientOriginalName();
            // dd($file_name);
            $file->move(public_path('assets/fronts/images'),$file_name);
        }
        $request-> merge(['hinhanh'=> $file_name]);
        // dd($request->all());
        $post = new datbanModel();
        $post->idLoaiMonAn = $request->input('tieude');
        $post->hinhAnh = $request->input('hinhanh');
        $post->trangThai = $request->input('trangthai');
        $post->noiDung = $request->input('noidung');
        $post->created_by_user_id= $request->input('created_by_user_id');
        $post->save();
        return redirect()->route('admin.news_admin');
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
