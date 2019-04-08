@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Наименование товара</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Видимость</th>
                    <th scope="col">Дейтсвие</th>
                </tr>
            </thead>
            <tbody>
                @foreach($goods as $good)
                    <tr>
                        <td>{{$good->id}}</td>
                        <td>{{$good->name}}</td>
                        <td>{{$good->price}}</td>
                        <td>{{$good->hide ? 'Нет' : 'Да'}}</td>
                        <td>
                            <a href="{{route('goods.edit', ['id' => $good->id])}}">Изменить</a>
                            <form action="{{route('goods.destroy', ['id' => $good->id])}}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button onclick="return confirm('Вы уверены, что хотите удалить этот товар?')" style="background: transparent; border: 0;padding: 0;">
                                    <a>Удалить</a>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        {{ $goods->links() }}
    </div>
    <div class="row">
        <a class="btn btn-success" href="{{route('goods.create')}}" role="button">Создать новый товар</a>
    </div>
</div>
@endsection
