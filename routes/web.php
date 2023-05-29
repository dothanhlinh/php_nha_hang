<?php

use App\Http\Controllers\newsController;
use App\Http\Controllers\monAnController;
use App\Http\Controllers\loaiMonAnController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\banController;
use App\Http\Controllers\nhanVienController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;


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
Route::get('/search', [newsController::class,'search'])->name('home.search');
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

// trang nhân viên
Route::get('/admin_quanlynhanvien',[nhanVienController::class,'index_admin'])->name('admin.admin_quanlynhanvien');


Route::get('/admin_admin_quanlynhanvien_create',[nhanVienController::class,'create'])->name('admin.admin_quanlynhanvien_create');
Route::post('/admin_admin_quanlynhanvien_create',[nhanVienController::class,'store'])->name('admin.admin_quanlynhanvien_create_store');

Route::get('/admin_admin_quanlynhanvien_Edit/{id}',[nhanVienController::class,'Edit'])->name('admin.admin_admin_quanlynhanvien_Edit');
Route::post('/admin_admin_quanlynhanvien_Edit/{id}',[nhanVienController::class,'SaveEdit'])->name('admin.admin_admin_quanlynhanvien_Save_edit');
Route::get('/admin_quanlynhanvien/{id}', [nhanVienController::class, 'destroy'])->name('admin.admin_quanlynhanvien_delete'); 


//trang chủ thống kê
Route::get('/admin_trangchu',[HomeController::class,'index_admin'])->name('admin.trangchu_admin');

// tranng bài viết

Route::get('/admin_quanlybaiviet',[newsController::class,'index_admin'])->name('admin.news_admin');
Route::get('/admin_quanlybaiviet/{id}', [newsController::class, 'destroy'])->name('admin.delete_admin'); 

Route::get('/admin_quanlybaiviet_create',[newsController::class,'create'])->name('admin.ql_news.create_news');
Route::post('/admin_quanlybaiviet_create',[newsController::class,'store'])->name('admin.ql_news.store');

Route::get('/admin_quanlybaiviet_Edit/{id}',[newsController::class,'Edit'])->name('admin.ql_news.edit_news');
Route::post('/admin_quanlybaiviet_Edit/{id}',[newsController::class,'SaveEdit'])->name('admin.ql_news.SaveEdit');

//trang món ăn


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
Route::get('/admin_quanlydatban_create',[orderController::class,'create'])->name('admin.admin_quanlydatban_create');
Route::post('/admin_quanlydatban_create',[orderController::class,'store'])->name('admin.admin_quanlydatban_create_store');

Route::get('/admin_quanlydatban_view/{id}',[orderController::class,'order_details_admin'])->name('admin.admin_quanlydatban_view');
Route::put('/admin_update_trangthai/{id}',[orderController::class,'updateorder'])->name('admin.admin_update_trangthai');
        
Route::get('/admin_quanlydatban_dxt',[orderController::class,'daxacthuc_index'])->name('admin.daxacthuc_admin');
Route::put('/admin_update_trangthai_dxt/{id}',[orderController::class,'updateorder_dxt'])->name('admin.admin_update_trangthai_dxt');

Route::get('/admin_quanlydatban_ctt',[orderController::class,'chothanhtoan_index'])->name('admin.chothanhtoan_index');
Route::put('/admin_update_trangthai_ctt/{id}',[orderController::class,'updateorder_ctt'])->name('admin.admin_update_trangthai_ctt');

    //lịch sử 
Route::get('/admin_quanlydatban_lichsu',[orderController::class,'lichsuxoa'])->name('admin.lichsuxoa');
Route::get('/admin_quanlydatban_lichsu/{id}',[orderController::class,'updateorder_lichsuxoa'])->name('admin.updateorder_lichsuxoa');
    // xoá vĩnh viễn
Route::get('/admin_quanlydatban_delete/{id}', [orderController::class, 'destroy'])->name('admin.admin_quanlydatban_delete'); 


Route::post('/admin_quanlydatban_ban/{id}', [orderController::class, 'update_detail'])->name('admin.admin_quanlydatban_ban'); 

//hoá đơn bán
Route::get('/admin_hoadonban/{id}',[orderController::class,'thanhtoandonhang'])->name('admin.admin_hoadonban_thanhtoan');
Route::get('/admin_hoadonban', [orderController::class, 'hoadonban'])->name('admin.admin_hoadonban'); 

// Đăng nhập
Route::get('/admin_dangnhap',[loginController::class,'index'])->name('admin.admin_dangnhap');


//trang bàn ăn
Route::get('/admin_quanlyban',[banController::class,'index_admin'])->name('admin.admin_quanlyban');

Route::get('/admin_quanlyban_create',[banController::class,'create'])->name('admin.admin_quanlyban_create');
Route::post('/admin_quanlyban_create',[banController::class,'store'])->name('admin.admin_quanlyban_store');
Route::get('/admin_quanlyban/{id}', [banController::class, 'destroy'])->name('admin.admin_quanlyban_delete'); 
Route::get('/admin_quanlyban_Edit/{id}',[banController::class,'Edit'])->name('admin.admin_quanlyban_Edit');
Route::post('/admin_quanlyban_Edit/{id}',[banController::class,'SaveEdit'])->name('admin.admin_quanlyban_SaveEdit');


//Tạo route và controller cho quản lý người dùng tài khoản linhdo -start
Route::middleware(['auth'])->prefix('admin_quanlymoan')->group(function () {
    Route::get('/',[monAnController::class,'index_admin'])->name('admin.ql_monan.monan_admin');
});
Route::middleware(['auth'])->prefix('admin_quanlydatban')->group(function () {
    Route::get('',[orderController::class,'index_admin'])->name('admin.quanlydatban');
});
//Tạo route và controller cho quản lý người dùng tài khoản linhdo-end


//Tạo route và controller cho quản lý người dùng
Route::middleware(['auth'])->prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});
//Tạo route và controller cho quản lý vai trò

Route::middleware(['auth', 'role:Admin'])->prefix('roles')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/update/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/delete/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
