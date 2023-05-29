<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\monanModel;
use App\Models\datbanModel;
use App\Models\ctdatbanModel;
use App\Models\newsModel;

class HomeController extends Controller
{
    // client
    public function index(){
        $_monan = monanModel::all()->where('idLoaiMonAn',1);
        $_monan1 = monanModel::all()->where('idLoaiMonAn',2);
        $_monan2 = monanModel::all()->where('idLoaiMonAn',3);
        $_news = newsModel::limit(3)->get()->where('trangThai',1);
        return view('index',['res'=> $_monan,'res1'=> $_monan1,'res2'=> $_monan2,'baiviet'=> $_news]);
    }

    //admin
    //thống kê đơn đặt bàn
    public function index_admin(){
        $ddb = datbanModel::thongkedondatban();
        $dthu = ctdatbanModel::thongkedoanhthu();
        return view('admin.index_admin',['tkdatban'=>$ddb,'tkdoanhthu'=>$dthu]);
    }
}
