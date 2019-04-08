@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('goods.index')}}">Товары</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('orders.index')}}">Заказы</a>
        </div>
    </div>
</div>
@endsection


