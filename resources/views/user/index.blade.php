@extends('layout.layout')

@section('main-title','USER')

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
                            <th>Avatar</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th><a href="{{route('user-insertForm')}}" class="btn btn-primary align-items-center">Thêm</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key =>$user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td><img style="width: 100px" src="{{asset("storage/$user->avatar")}}" alt="None"></td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->getRoleName->name}}</td>
                                @can('edit')
                                <td><a href="{{route('user-editForm',['id'=>$user->id])}}" class="btn btn-warning">Sửa</a></td>
                                @if(\Illuminate\Support\Facades\Auth::id() != $user->id &&
                                        $user->role_id > 1)
                                <td><a href="{{route('user-delete',['id'=>$user->id])}}" class="btn btn-danger btn-del">Xóa</a></td>
                                @endif
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="container">
                    <div class="float-right">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
