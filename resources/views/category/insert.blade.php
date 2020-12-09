@extends('layout.layout')

@section('main-title','Thêm danh mục')

@section('content')
    <div class="container">
        <form action="{{route('cate-saveInsert')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Category name</label>
                                <input type="text" name="cate_name" id="name" class="form-control" value="{{old('cate_name') ? old('cate_name') : ""}}">
                                @error('cate_name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="desc">Desc</label>
                                <input type="text" name="desc" id="desc" class="form-control" value="{{old('desc') ? old('desc') : ""}}">
                                @error('desc')
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
                                <label for="created_by">Created By</label>
                                <select name="created_by" class="form-control" id="created_by">
                                    @foreach($users as $key => $us)
                                        <option value="{{$us->id}}">{{$us->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="show_menu">Show menu</label>
                                <select name="show_menu" class="form-control" id="show_menu">
                                    <option @if(old('show_menu') == 1) selected @endif value="1">Có</option>
                                    <option @if(old('show_menu') === 0) selected @endif value="0">Không</option>
                                </select>
                            </div>
                            <br/>
                            <button class="btn btn-primary" type="submit">Thêm</button>
                            <a href="{{route('cate-index')}}" class="btn btn-primary">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
