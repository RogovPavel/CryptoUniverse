<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Good;
use App\Order;


class GoodsController extends Controller
{
    // Просмотр товаров
    public function index() {
        return view('goods.index', [
            'goods' => Good::where('hide', 0)->paginate(10),
            'orders' => Order::where('user_id', Auth::user()->id)->paginate(10)
        ]);
    }
    // Покупка товара
    public function buy($id) {
        Order::create([
            'good_id' => $id,
            'user_id' => Auth::user()->id
        ]);
        return redirect('/goods');
    }
}
