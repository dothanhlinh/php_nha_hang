<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index(){
       return view('admin.ql_login.login_admin');
    }
}
