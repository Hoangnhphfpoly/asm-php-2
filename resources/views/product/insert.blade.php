@extends('layout.layout')

@section('main-title','Thêm mới sản phẩm')

@section('content')
    <div class="container">
        <form action="{{route('prod-saveInsert')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       value="{{old('name') ? old('name') : ""}}">
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price" id="price" class="form-control"
                                       value="{{old('price') ? old('price') : ""}}">
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
                                        <option value="{{$cate->id}}">{{$cate->cate_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="star">Star</label>
                                <select name="star" class="form-control" id="star">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
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
                                <textarea name="short_desc" id="short_desc" cols="20" rows="5" class="form-control">{{old('short_desc') ? old('short_desc') : ""}}
                                </textarea>
                                @error('short_desc')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="detail">Detail</label>
                                {{--                                <input type="text" name="short_desc" id="short_desc" class="form-control">--}}
                                <textarea name="detail" id="detail" cols="20" rows="5" class="form-control">{{old('detail') ? old('detail') : ""}}
                                </textarea>
                                @error('detail')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <br/>
                            <button class="btn btn-primary" type="submit">Thêm</button>
                            <a href="{{route('prod-index')}}" class="btn btn-primary">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
