<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\nhanvienModel;
use App\Models\nhanvienModel;
class nhanVienController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index_admin']]);
         $this->middleware('permission:product-create', ['only' => ['create']]);
         $this->middleware('permission:product-edit', ['only' => ['update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    // Phần addmin
    public function index_admin(){
        $nhanvien = nhanvienModel::limit(8)->get();
        return view('admin.ql_nhanvien.view_nhanvien_admin',['nhanvien'=> $nhanvien]);
    }
    // public function news_details_admin($id){
    //     $res = nhanvienModel::find($id);
    //     return view('admin.ql_news.detail_news',['baiviet'=> $res]);
    // }
    public function destroy($id){
        $res = nhanvienModel::find($id);
        $res -> delete();
        return redirect()->route('admin.admin_quanlynhanvien');
    }

    public function create(){
        $nv = nhanvienModel::all();
        return view('admin.ql_nhanvien.create_nhanvien_admin',['nhanvien'=> $nv]);
    }

    public function store(Request $request){
        // if ($request->has('hinhAnh')){
        //     $file = $request-> hinhAnh;
        //     $file_name = $file->getClientOriginalName();
        //     $file->move(public_path('assets/fronts/images'),$file_name);
        // }
        // $request-> merge(['hinhAnh'=> $file_name]);
        $post = new nhanvienModel();
        
        $post->tenNV = $request->input('tenNV');
        $post->cmnd = $request->input('cmnd');
        $post->vaiTro = $request->input('vaiTro');
        $post->trangThai = $request->input('trangthai');
        $post->created_by_user_id= $request->input('created_by_user_id');
        $post->created_date_time =  date('Y-m-d H:i:s');
        $post->save();
        return redirect()->route('admin.admin_quanlynhanvien');
    }
    public function Edit($id){
        $res = nhanvienModel::find($id);
        // $nv = nhanvienModel::all();
        return view('admin.ql_nhanvien.edit_nhanvien_admin',['nhanvien'=> $res]);
    }
    public function SaveEdit($id,Request $request){
        $post = nhanvienModel::find($id);
        $post->tenNV = $request->input('tenNV');
        $post->cmnd = $request->input('cmnd');
        $post->vaiTro = $request->input('vaiTro');
        $post->trangThai = $request->input('trangthai');
        // $post->created_by_user_id= $request->input('created_by_user_id');
        $post->lu_updated =  date('Y-m-d H:i:s');        
        $post->save();
        return redirect()->route('admin.admin_quanlynhanvien');
    }
}
