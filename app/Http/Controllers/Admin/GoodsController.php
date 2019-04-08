<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Good;

class GoodsController extends Controller
{
    // Просмотр товаров
    public function index() {
        return view('admin.goods.index', [
            'goods' => Good::paginate(5)
        ]);
    }
    // Создание товара
    public function create() {
        return view('admin.goods.create');
    }
    // Создание товара в БД
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'numeric'
        ]);
        
        Good::create($request->all());
        
        return redirect('admin/goods');
    }
    // Редактирование товара
    public function edit($id) {
        return view('admin.goods.edit', [
            'good' => Good::find($id)
        ]);
    }
    // Изменение товара в БД
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'numeric'
        ]);
        
        $good = Good::find($id);
        $good->fill($request->all());
        $good->save();
        
        return redirect('/admin/goods');//->route('admin.goods.index');
    }
    // Удаление товара
    public function destroy($id) {
        Good::find($id)->delete();
        return redirect('admin/goods');
    }
}
