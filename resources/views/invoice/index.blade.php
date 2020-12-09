@extends('layout.layout')

@section('main-title','INVOICE')

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <table class="mb-0 table table-borderless">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer name</th>
                            <th>Phone number</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Total price</th>
                            <th>Payment method</th>
                            <th><a href="{{route('invoice-insertForm')}}" class="btn btn-primary align-items-center">Thêm</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $key =>$inv)
                            <tr>
                                <td>{{$inv->id}}</td>
                                <td>{{$inv->customer_name}}</td>
                                <td>{{$inv->customer_phone_number}}</td>
                                <td>{{$inv->customer_email}}</td>
                                <td>{{$inv->customer_address}}</td>
                                <td>{{$inv->total_price}}</td>
                                <td>
                                    @if($inv->payment_method == 1)
                                        <span class="badge badge-pill badge-success">Chuyển tiền</span>
                                    @else
                                        <span class="badge badge-pill badge-dark">Trả tiền mặt</span>
                                    @endif
                                </td>
                                @can('edit')
                                    <td><a href="{{route('invoice-editForm',['id'=>$inv->id])}}" class="btn btn-warning">Sửa</a>
                                        <a href="{{route('invoice-delete',['id'=>$inv->id])}}" class="btn btn-danger btn-del">Xóa</a></td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="container">
                    <div class="float-right">
                        {{ $invoices->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
