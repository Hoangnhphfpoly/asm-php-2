@extends('layout.layout')

@section('main-title','Thêm mới')

@section('content')
    <div class="container">
        <form action="{{route('user-saveInsert')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{old('name') ? old('name') : ""}}">
                                @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{old('email') ? old('email') : ""}}">
                                @error('email')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" name="password" id="pass" class="form-control">
                                @error('password')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cf-pass">Comfirm Password</label>
                                <input type="password" name="cf-pass" id="cf-pass" class="form-control">
                                @error('cf-pass')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="img">Avatar</label>
                                <input type="file" name="avatar" class="form-control-file">
                                @error('avatar')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role_id" class="form-control">
                                    @foreach($roles as $key => $ro)
                                        <option value="{{$ro->id}}">{{$ro->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br/>
                            <button class="btn btn-primary" type="submit">Thêm</button>
                            <a href="{{route('user-index')}}" class="btn btn-primary">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
