<?php

namespace App\Http\Controllers;

use App\Models\loaimonanModel;
use App\Models\nhanvienModel;
use Illuminate\Http\Request;

class loaiMonAnController extends Controller
{
    // public function index(){
    //     $_monan = loaimonanModel::all()->where('idLoaiMonAn',1);
    //     $_monan1 = loaimonanModel::all()->where('idLoaiMonAn',2);
    //     $_monan2 = loaimonanModel::all()->where('idLoaiMonAn',3);
    //     return view('menu',['res'=> $_monan,'res1'=> $_monan1,'res2'=> $_monan2]);
    // }

    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index_admin']]);
         $this->middleware('permission:product-create', ['only' => ['create']]);
         $this->middleware('permission:product-edit', ['only' => ['update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
     // Phần admin
     public function index_admin(){
        $loaimonan = loaimonanModel::all();
        return view('admin.ql_loaimonan.loaimonan_admin')->with('loaimonan', $loaimonan);
    }
    public function destroy($id){
        $post = loaimonanModel::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.ql_loaimonan.lmonan_admin');
    }
    public function create(){
        $_loaimonan = loaimonanModel::all();
        $_nv = nhanvienModel::all();
        return view('admin.ql_loaimonan.create_loaimonan',['loaimonan'=> $_loaimonan,'nhanvien'=> $_nv]);
    }
    public function store(Request $request){
        $post = new loaimonanModel();
        $post->tenLoai = $request->input('tenLoai');
        $post->moTa  = $request->input('moTa');
        $post->trangThai = $request->input('trangThai');
        $post->created_by_user_id= $request->input('created_by_user_id');
        $post->save();
        return redirect()->route('admin.ql_loaimonan.lmonan_admin');
    }

    public function Edit($id){
        $_loaimonan = loaimonanModel::find($id);
        $_nv = nhanvienModel::all();
        return view('admin.ql_loaimonan.edit_loaimonan',['loaimonan'=> $_loaimonan,'nhanvien'=> $_nv]);
    }
    public function SaveEdit($id,Request $request){
        $post = loaimonanModel::find($id);
        $post->tenLoai = $request->input('tenLoai');
        $post->moTa  = $request->input('moTa');
        $post->trangThai = $request->input('trangThai');
        $post->created_by_user_id= $request->input('created_by_user_id');
        $post->save();
        return redirect()->route('admin.ql_loaimonan.loaimonan_admin');
    }
}
