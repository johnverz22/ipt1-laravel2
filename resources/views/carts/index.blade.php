@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Cart</div>

                <div class="card-body">
                    <form action="/checkout" method="POST">
                        @csrf
                        <table class="table">
                            @foreach ($carts as $i => $cart)
                                <tr>
                                    <td>{{$cart->product->name}}</td>
                                    <td>P {{$cart->product->price}}</td>
                                    <td class="w-10">
                                        <div class="input-group w-10">
                                            <input type="hidden" value="{{$cart->id}}" name="carts[]['id']">
                                            <input type="hidden" value="{{$cart->product_id}}" name="carts[]['product_id']">
                                            <input type="text" class="form-control" value="{{$cart->quantity}}" name="carts[]['quantity']">
                                            <span class="input-group-text">pc/s</span>
                                        </div>
                                    </td>
                                </tr>   
                            @endforeach
                        </table>
                        <button type="submit" class="btn btn-success">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
