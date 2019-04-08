@extends('layouts.app')

@section('content')
    
<style>
    .goods-item {
        border: 1px solid #d3e0e9;
        border-radius: 3px;
        padding: 6px;
        margin-bottom: 20px;
        min-width: 200px;
    }
    
    .goods-item .item-body {
        margin: 20px 0px;
        min-height: 100px;
        
    }
</style>
    

<div class="container">
    <div class="row text-center">
        <h1>Товары</h1>
    </div>
    <div class="row">
        @foreach ($goods as $good)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="goods-item text-center">
                    <h3>{{$good->name}}</h3>
                    <div class="item-body">
                        <div class="item-text"></div>
                        <div class="item-price">Цена: {{$good->price}}</div>
                    </div>
                    <form method="POST" action="{{route('goods.buy', ['id' => $good->id])}}">
                        {{ csrf_field() }}
                        <button onclick="return confirm('Вы уверены, что хотите купить этот товар?')" class="btn btn-primary btn-block">Купить</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        {{ $goods->links() }}
    </div>
    <div class="row text-center">
        <h1>Мои заказы</h1>
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID Заказа</th>
                    <th scope="col">Наименование товара</th>
                    <th scope="col">Продано</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->good['name']}}</td>
                        <td>{{$order->sale ? 'Да':'Нет'}}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        {{ $orders->links() }}
    </div>
    
</div>
@endsection



