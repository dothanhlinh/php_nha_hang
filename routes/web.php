<?php

use App\Http\Controllers\newsController;
use App\Http\Controllers\monAnController;
use App\Http\Controllers\loaiMonAnController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\banController;
use Illuminate\Support\Facades\Route;

// trang người dùng

//Phần Trang chủ
Route::get('/index',  [HomeController::class,'index'])->name('home.index');
// Route::get('/index',  [HomeController::class,'index_news'])->name('home.index');


//phần menu
Route::get('/menu',  [monAnController::class,'index'])->name('home.menu');
Route::get('/add_to_order/{id}',  [monAnController::class,'addToOrder'])->name('home.add_to_order');
Route::delete('/delete_order',  [monAnController::class,'delete_order'])->name('home.delete_order');
Route::patch('/update_order',  [monAnController::class,'update_order'])->name('home.update_order');

// Phần order
Route::post('/order',  [monAnController::class,'checkout'])->name('home.checkout');
Route::get('/order', function () {
    return view('order');
})->name('home.order');

// phần bài viết
Route::get('/news',  [newsController::class,'index'])->name('home.news');
Route::get('/news_details/{id}',  [newsController::class,'news_details'])->name('home.news_details');

Route::get('/news_details_admin/{id}',  [newsController::class,'news_details_admin'])->name('home.news_details_admin');


// Route::get('/menu', function () {return view('menu');})->name('home.menu');

Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', function () {
    return view('introduce');
})->name('home.about');

Route::get('/chef', function () {
    return view('chef');
})->name('home.chef');

Route::get('/contact', function () {
    return view('contact');
})->name('home.contact');



// route trang admin

// tranng bài viết
Route::get('/admin_trangchu', function () {
    return view('admin.index_admin');
})->name('admin.index_admin');

Route::get('/admin_quanlybaiviet',[newsController::class,'index_admin'])->name('admin.news_admin');
Route::get('/admin_quanlybaiviet/{id}', [newsController::class, 'destroy'])->name('admin.delete_admin'); 

Route::get('/admin_quanlybaiviet_create',[newsController::class,'create'])->name('admin.ql_news.create_news');
Route::post('/admin_quanlybaiviet_create',[newsController::class,'store'])->name('admin.ql_news.store');

Route::get('/admin_quanlybaiviet_Edit/{id}',[newsController::class,'Edit'])->name('admin.ql_news.edit_news');
Route::post('/admin_quanlybaiviet_Edit/{id}',[newsController::class,'SaveEdit'])->name('admin.ql_news.SaveEdit');

//trang món ăn
Route::get('/admin_quanlymoan',[monAnController::class,'index_admin'])->name('admin.ql_monan.monan_admin');

Route::get('/admin_quanlymoan_create',[monAnController::class,'create'])->name('admin.ql_monan.create_monan');
Route::post('/admin_quanlymoan_create',[monAnController::class,'store'])->name('admin.ql_monan.create_monan_store');

Route::get('/admin_quanlymoan_Edit/{id}',[monAnController::class,'Edit'])->name('admin.ql_monan.edit_monan');
Route::post('/admin_quanlymoan_Edit/{id}',[monAnController::class,'SaveEdit'])->name('admin.ql_monan.SaveEdit');

Route::get('/admin_quanlymoan/{id}', [monAnController::class, 'destroy'])->name('admin.ql_monan.delete_admin'); 

// trang loại món ăn

Route::get('/admin_quanlyloaimoan',[loaiMonAnController::class,'index_admin'])->name('admin.ql_loaimonan.lmonan_admin');

Route::get('/admin_quanlyloaimoan_create',[loaiMonAnController::class,'create'])->name('admin.ql_loaimonan.create_lmonan');
Route::post('/admin_quanlyloaimoan_create',[loaiMonAnController::class,'store'])->name('admin.ql_loaimonan.create_lmonan_store');

Route::get('/admin_quanlyloaimoan_Edit/{id}',[loaiMonAnController::class,'Edit'])->name('admin.ql_loaimonan.edit_lmonan');
Route::post('/admin_quanlyloaimoan_Edit/{id}',[loaiMonAnController::class,'SaveEdit'])->name('admin.ql_loaimonan.SaveEdit');

Route::get('/admin_quanlyloaimoan/{id}', [loaiMonAnController::class, 'destroy'])->name('admin.ql_loaimonan.loai_delete'); 


// trang đặt bàn
Route::get('/admin_quanlydatban',[orderController::class,'index_admin'])->name('admin.quanlydatban');
Route::get('/admin_quanlydatban_view/{id}',[orderController::class,'order_details_admin'])->name('admin.admin_quanlydatban_view');
Route::put('/admin_update_trangthai/{id}',[orderController::class,'updateorder'])->name('admin.admin_update_trangthai');
        
Route::get('/admin_quanlydatban_dxt',[orderController::class,'daxacthuc_index'])->name('admin.daxacthuc_admin');
Route::put('/admin_update_trangthai_dxt/{id}',[orderController::class,'updateorder_dxt'])->name('admin.admin_update_trangthai_dxt');

Route::get('/admin_quanlydatban_ctt',[orderController::class,'chothanhtoan_index'])->name('admin.chothanhtoan_index');
Route::put('/admin_update_trangthai_ctt/{id}',[orderController::class,'updateorder_ctt'])->name('admin.admin_update_trangthai_ctt');
// Đăng nhập
Route::get('/admin_dangnhap',[loginController::class,'index'])->name('admin.admin_dangnhap');


//trang bàn ăn
Route::get('/admin_quanlyban',[banController::class,'index_admin'])->name('admin.admin_quanlyban');

Route::get('/admin_quanlyban_create',[banController::class,'create'])->name('admin.admin_quanlyban_create');
Route::post('/admin_quanlyban_create',[banController::class,'store'])->name('admin.admin_quanlyban_store');
Route::get('/admin_quanlyban/{id}', [banController::class, 'destroy'])->name('admin.admin_quanlyban_delete'); 
Route::get('/admin_quanlyban_Edit/{id}',[banController::class,'Edit'])->name('admin.admin_quanlyban_Edit');
Route::post('/admin_quanlyban_Edit/{id}',[banController::class,'SaveEdit'])->name('admin.admin_quanlyban_SaveEdit');