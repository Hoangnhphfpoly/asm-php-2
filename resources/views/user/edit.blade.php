@extends('layout.layout')

@section('main-title','Sửa user')

@section('content')
    <div class="container">
        <form action="{{route('user-saveEdit')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" hidden value="{{$userEdit->id}}" name="id">
            <div class="row">
                <div class="col-lg-6">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$userEdit->name}}">
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{$userEdit->email}}">
                                @error('email')
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
                                        <option @if($userEdit->role_id == $ro->id) selected @endif value="{{$ro->id}}">{{$ro->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br/>
                            <button class="btn btn-primary" type="submit">Sửa</button>
                            <a href="{{route('user-index')}}" class="btn btn-primary">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
