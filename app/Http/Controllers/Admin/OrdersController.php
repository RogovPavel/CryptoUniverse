<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrdersController extends Controller
{
    // Просмотр заказов
    public function index() {
        return view('admin.orders.index', [
            'orders' => Order::paginate(10)
        ]);
    }
    // Отправить заказ на почту
    public function sale($id) {
        $order = Order::find($id);
        $order->sale = true;
        $order->save();
        return redirect('/admin/orders');
    }
}
