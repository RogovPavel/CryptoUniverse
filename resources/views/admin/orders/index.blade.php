@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Товар</th>
                    <th scope="col">Пользователь</th>
                    <th scope="col">Продано</th>
                    <th scope="col">Дейтсвие</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->good['name']}}</td>
                        <td>{{$order->user['name']}}</td>
                        <td>{{$order->sale ? 'Да':'Нет'}}</td>
                        <td>
                            <form action="{{route('orders.sale', ['id' => $order->id])}}" method="POST">
                                {{ csrf_field() }}
                                <button onclick="return confirm('Вы уверены, что хотите продать товар?')" style="background: transparent; border: 0;padding: 0;">
                                    <a>Продать</a>
                                </button>
                            </form>
                        </td>
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


