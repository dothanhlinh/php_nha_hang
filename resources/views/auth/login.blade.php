@extends('layouts.app')
@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập quản trị 
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<style>
    body {
        background: #164578!important;
        font-family: 'Muli', sans-serif;
    }

    h1 {
        color: #fff;
        padding-bottom: 2rem;
        font-weight: bold;
    }

    a {
        color: #333;
    }

    a:hover {
        color: #E8D426;
        text-decoration: none;
    }

    .form-control:focus {
        color: #000;
        background-color: #fff;
        border: 2px solid #E8D426;
        outline: 0;
        box-shadow: none;
    }

    .btn {
        background: #164578;
        border: #E8D426;
    }

    .btn:hover {
        background: #1a68bc;
        border: #E8D426;
    }
</style>
<body>
    <div class="pt-5">
        <h1 class="text-center">Đăng Nhập</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="card card-body">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                    
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                    
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                    
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>
                    
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                        <p class="small-xl pt-3 text-center">
                            <a href="#"> Đăng ký</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection






