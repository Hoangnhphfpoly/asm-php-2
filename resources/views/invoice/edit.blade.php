@extends('layout.layout')

@section('main-title','Thêm hóa đơn')

@section('content')
    <div class="container">
        <form action="{{route('invoice-saveEdit')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" hidden name="id" value="{{$invoice->id}}">
            <div class="row">
                <div class="col-lg-6">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="customer_name">Customer name</label>
                                <input type="text" name="customer_name" id="customer_name" class="form-control"
                                       value="{{$invoice->customer_name}}">
                                @error('customer_name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="customer_phone_number">Customer phone number</label>
                                <input type="text" name="customer_phone_number" id="customer_phone_number" class="form-control"
                                       value="{{$invoice->customer_phone_number}}">
                                @error('customer_phone_number')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="customer_email">Customer email</label>
                                <input type="text" name="customer_email" id="customer_email" class="form-control"
                                       value="{{$invoice->customer_email}}">
                                @error('customer_email')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="customer_address">Customer address</label>
                                <input type="text" name="customer_address" id="customer_address" class="form-control"
                                       value="{{$invoice->customer_address}}">
                                @error('customer_address')
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
                                <label for="product">Sản phẩm</label>
                                <select name="product[]" class="form-control" id="product" multiple>
                                    @foreach($prods as $key => $prod)
                                        <option @if(in_array($prod->id,$arr)) selected @endif value="{{$prod->id}}">{{$prod->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="payment_method">Payment method</label>
                                <select name="payment_method" class="form-control" id="payment_method">
                                    <option @if($invoice->payment_method == 1) selected @endif value="1">Chuyển tiền</option>
                                    <option @if($invoice->payment_method != 1) selected @endif value="2">Giao tiền mặt</option>
                                </select>
                            </div>
                            <br/>
                            <button class="btn btn-primary" type="submit">Sửa</button>
                            <a href="{{route('invoice-index')}}" class="btn btn-primary">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
