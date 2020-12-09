@extends('layout.layout')

@section('main-title','CATEGORY')

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
                            <th>Created By</th>
                            <th>Show Menu</th>
                            <th><a href="{{route('cate-insertForm')}}"
                                   class="btn btn-primary align-items-center">Thêm</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cates as $key =>$cate)
                            <tr>
                                <td>{{$cate->id}}</td>
                                <td>{{$cate->cate_name}}</td>
                                <td>{{$cate->getCreatedBy->name}}</td>
                                <td>
                                    @if($cate->show_menu == 1)
                                        <span class="badge badge-pill badge-success">Có</span>
                                    @else
                                        <span class="badge badge-pill badge-dark">Không</span>
                                    @endif
                                </td>
                                @can('edit')
                                    <td><a href="{{route('cate-editForm',['id'=>$cate->id])}}" class="btn btn-warning">Sửa</a>
                                        &nbsp;
                                        <a href="{{route('cate-delete',['id'=>$cate->id])}}"
                                           class="btn btn-danger btn-del">Xóa</a></td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="container">
                    <div class="float-right">
                        {{ $cates->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
