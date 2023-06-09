@extends('layout.base')

@section('content')
    <div class="container">
        <div class="alert alert-success">
            Your order has been placed successfully, You order Id is {{ session('orderId') }}
        </div>
    </div>
@endsection
