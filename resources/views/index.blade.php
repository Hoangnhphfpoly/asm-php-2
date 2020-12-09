<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Document</title>
    @include('layout-auth.style')
</head>
<body>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first mt-4 mb-4">
            <h1>Login</h1>
        </div>

        <!-- Login Form -->
        <form action="{{route('sign-in')}}" method="post">
            @csrf
            <input type="text" id="login" class="fadeIn second" name="email" placeholder="Bạn hãy nhập email" value="{{old('email') ? old('email') : ""}}">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div><br/></div>
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="Bạn hãy nhập mật khẩu">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div><br/></div>
            @if(isset($msg))
                <div class="alert alert-danger">{{ $msg }}</div>
            @endif
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>

        <!-- Remind Passowrd -->


    </div>
</div>
</body>
</html>
