@extends('layout.layout')

@section('main-title','CHI TIẾT SẢN PHẨM')

@section('content')
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-lg-6">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" disabled
                                       value="{{$prodEdit->name}}">

                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price" id="price" class="form-control" disabled
                                       value="{{$prodEdit->price}}">

                            </div>
                            <div class="form-group">
                                <label for="img">Image</label>
                                <br>
                                <img style="width: 150px" src="{{asset("storage/".$prodEdit->image)}}" alt="">
                            </div>
                            <div class="form-group">
                                <label for="cate_id">Category</label>
                                <select name="cate_id" class="form-control" id="cate_id" disabled>
                                    @foreach($cates as $key => $cate)
                                        <option @if($prodEdit->cate_id == $cate->id) selected @endif value="{{$cate->id}}">{{$cate->cate_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="star">Star</label>
                                <select name="star" class="form-control" id="star" disabled>
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
                                <textarea disabled name="short_desc" id="short_desc" cols="20" rows="5" class="form-control">{{$prodEdit->short_desc}}
                                </textarea>

                            </div>
                            <div class="form-group">
                                <label for="detail">Detail</label>
                                {{--                                <input type="text" name="short_desc" id="short_desc" class="form-control">--}}
                                <textarea disabled name="detail" id="detail" cols="20" rows="5" class="form-control">{{$prodEdit->detail}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <a href="{{route('prod-index')}}" class="btn btn-primary">Quay lại</a>
                            </div>
                            <br/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
