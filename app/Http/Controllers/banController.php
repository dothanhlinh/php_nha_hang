<?php

namespace App\Http\Controllers;
use App\Models\nhanvienModel;
use App\Models\banModel;
use App\Models\newsModel;

use Illuminate\Http\Request;

class banController extends Controller
{
     function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index_admin']]);
         $this->middleware('permission:product-create', ['only' => ['create']]);
         $this->middleware('permission:product-edit', ['only' => ['update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
      // Phần admin
      public function index_admin(){
        $ban = banModel::all();
        return view('admin.ql_ban.ban_admin')->with('ban', $ban);
    }

    public function create(){
        $_ban = banModel::all();
        $_nv = nhanvienModel::all();
        return view('admin.ql_ban.create_ban_admin',['ban'=> $_ban,'nhanvien'=> $_nv]);
    }
    public function store(Request $request){
        $post = new banModel();
        $post->tenBan = $request->input('tenBan');
        $post->size  = $request->input('size');
        $post->moTa  = $request->input('moTa');
        $post->trangThai = $request->input('trangThai');
        $post->created_by_user_id= $request->input('created_by_user_id');
        $post->save();
        return redirect()->route('admin.admin_quanlyban');
    }


    public function destroy($id){
        $post = banModel::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.admin_quanlyban');
    }

    public function Edit($id){
        $_ban = banModel::find($id);
        $baiviet = newsModel::find($id);
        $_nv = nhanvienModel::all();
        return view('admin.ql_ban.edit_ban_admin',['ban'=> $_ban,'baiviet'=> $baiviet,'nhanvien'=> $_nv]);
    }
    public function SaveEdit($id,Request $request){
        $post = banModel::find($id);
        $post->tenBan = $request->input('tenBan');
        $post->size  = $request->input('size');
        $post->moTa  = $request->input('moTa');
        $post->trangThai = $request->input('trangThai');
        $post->created_by_user_id= $request->input('created_by_user_id');
        $post->save();
        return redirect()->route('admin.admin_quanlyban');
    }
}
