@extends('layout.layout')

@section('main-title','Sửa sản phẩm')

@section('content')
    <div class="container">
        <form action="{{route('prod-saveEdit')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="id" value="{{$prodEdit->id}}" hidden>
            <div class="row">
                <div class="col-lg-6">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       value="{{$prodEdit->name}}">
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price" id="price" class="form-control"
                                       value="{{$prodEdit->price}}">
                                @error('price')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="img">Image</label>
                                <input type="file" name="image" class="form-control-file">
                                @error('image')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cate_id">Category</label>
                                <select name="cate_id" class="form-control" id="cate_id">
                                    @foreach($cates as $key => $cate)
                                        <option @if($prodEdit->cate_id == $cate->id) selected @endif value="{{$cate->id}}">{{$cate->cate_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="star">Star</label>
                                <select name="star" class="form-control" id="star">
                                    <option @if($prodEdit->star == 1) selected @endif value="1">1</option>
                                    <option @if($prodEdit->star == 2) selected @endif value="2">2</option>
                                    <option @if($prodEdit->star == 3) selected @endif value="3">3</option>
                                    <option @if($prodEdit->star == 4) selected @endif value="4">4</option>
                                    <option @if($prodEdit->star == 5) selected @endif value="5">5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="short_desc">Short desc</label>
                                {{--                                <input type="text" name="short_desc" id="short_desc" class="form-control">--}}
                                <textarea name="short_desc" id="short_desc" cols="20" rows="5" class="form-control">{{$prodEdit->short_desc}}
                                </textarea>
                                @error('short_desc')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="detail">Detail</label>
                                {{--                                <input type="text" name="short_desc" id="short_desc" class="form-control">--}}
                                <textarea name="detail" id="detail" cols="20" rows="5" class="form-control">{{$prodEdit->detail}}
                                </textarea>
                                @error('detail')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <br/>
                            <button class="btn btn-primary" type="submit">Sửa</button>
                            <a href="{{route('prod-index')}}" class="btn btn-primary">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
