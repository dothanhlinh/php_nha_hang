<?php

namespace App\Http\Controllers;

use App\Models\newsModel;
use App\Models\nhanvienModel;
use Illuminate\Http\Request;

use function Psy\debug;

class newsController extends Controller
{
    // Phần client
    public function index(){
        $_news = newsModel::limit(8)->get()->where('trangThai',1);
        return view('news',['baiviet'=> $_news]);
    }

    public function news_details($id){
        $res = newsModel::find($id);
        return view('detail_news',['baiviet'=> $res]);
    }


    // Phần addmin
    public function index_admin(){
        $_news = newsModel::limit(8)->get();
        // $_news = newsModel::all();
        return view('admin.news_admin',['baiviet'=> $_news]);
    }
    public function news_details_admin($id){
        $res = newsModel::find($id);
        return view('admin.ql_news.detail_news',['baiviet'=> $res]);
    }
    public function destroy($id){
        $res = newsModel::find($id);
        $res -> delete();
        return redirect()->route('admin.news_admin');
    }

    public function create(){
        $nv = nhanvienModel::all();
        return view('admin.ql_news.create_news',['nhanvien'=> $nv]);
    }
    public function store(Request $request){
        if ($request->has('hinhanh')){
            $file = $request-> hinhanh;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('assets/fronts/images'),$file_name);
        }
        $request-> merge(['hinhanh'=> $file_name]);
        $post = new newsModel();
        $post->tieuDe = $request->input('tieude');
        $post->hinhAnh = $request->input('hinhanh');
        $post->trangThai = $request->input('trangthai');
        $post->noiDung = $request->input('noidung');
        $post->created_by_user_id= $request->input('created_by_user_id');
        $post->save();
        return redirect()->route('admin.news_admin');
    }
    public function Edit($id){
        $res = newsModel::find($id);
        $nv = nhanvienModel::all();
        return view('admin.ql_news.edit_news',['baiviet'=> $res,'nhanvien'=> $nv]);
    }
    public function SaveEdit($id,Request $request){
        $res = newsModel::find($id);
        $res->tieuDe = $request->input('tieude');
        $res->hinhAnh = $request->input('hinhanh');
        $res->trangThai = $request->input('trangthai');
        $res->noiDung = $request->input('noidung');
        $res->created_by_user_id= $request->input('created_by_user_id');
        
        $res->save();
        return redirect()->route('admin.news_admin');
    }
    // public function updateStatus(Request $request, $id)
    // {
    //     $product = newsModel::findOrFail($id);
    //     $product->trangThai = $request->input('trangthai');
    //     $product->save();
    //     return redirect()->back()->with('success', 'Trạng thái đã được cập nhật.');
    // }
    // public function ActionNV(){
    //     $nv = newsModel::all();
    //     return view('admin.news_admin',['nhanvien'=> $nv]);
    // }
}
