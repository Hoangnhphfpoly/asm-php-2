@extends('layout.layout')

@section('main-title','PRODUCTS')

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <table class="mb-0 table table-borderless">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Star</th>
                            <th>Views</th>
                            <th><a href="{{route('prod-insertForm')}}"
                                   class="btn btn-primary align-items-center">Thêm</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($prods as $key =>$prod)
                            <tr>
                                <td>{{$prod->id}}</td>
                                <td>{{$prod->name}}</td>
                                <td><img style="width: 100px" src="{{asset("storage/".$prod->image)}}" alt="None"></td>
                                <td>{{$prod->getCateName->cate_name}}</td>
                                <td>{{$prod->price}}$</td>
                                <td>
                                    <span id="1" class="fa fa-star @if(1 <= $prod->star) checked @endif"></span>
                                    <span id="2" class="fa fa-star @if(2 <= $prod->star) checked @endif"></span>
                                    <span id="3" class="fa fa-star @if(3 <= $prod->star) checked @endif"></span>
                                    <span id="4" class="fa fa-star @if(4 <= $prod->star) checked @endif"></span>
                                    <span id="5" class="fa fa-star @if(5 <= $prod->star) checked @endif"></span>
                                </td>
                                <td>{{$prod->views}}</td>
                                <td>
                                    @can('edit')
                                        <a href="{{route('prod-editForm',['id'=>$prod->id])}}" class="btn btn-warning">Sửa</a>
                                        <a href="{{route('prod-delete',['id'=>$prod->id])}}"
                                           class="btn btn-danger btn-del">Xóa</a>
                                    @endcan
                                        <a href="{{route('prod-detail',['id'=>$prod->id])}}" class="btn btn-success">Chi tiết</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="container">
                    <div class="float-right">
                        {{ $prods->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
