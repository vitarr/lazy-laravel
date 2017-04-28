<?php

use App\Task;
use App\Good;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome', [
        'title' => 'Main',
        'main_active' => 'active',
        'tasks_active' => '',
        'goods_active' => ''
    ]);
});


/**
 * Вывести панель с задачами
 */
Route::get('/tasks', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('tasks', [
        'tasks' => $tasks,
        'title' => 'all tasks',
        'main_active' => '',
        'tasks_active' => 'active',
        'goods_active' => ''
    ]);
});

/**
 * Вывести панель с товарами
 */
Route::get('/goods', function () {
    $goods = Good::orderBy('created_at', 'asc')->get();
    return view('goods', [
        'goods' => $goods,
        'title' => 'all goods',
        'main_active' => '',
        'tasks_active' => '',
        'goods_active' => 'active'
    ]);
});

/**
 * Добавить новую задачу
 */
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/tasks')
            ->withInput()
            ->withErrors($validator);
    }

    // Создание задачи...
    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/tasks');
});

/**
 * Добавить новый товар
 */
Route::post('/good', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'price' => 'required|max:8',
        'description' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect('/goods')
            ->withInput()
            ->withErrors($validator);
    }

    // Создание  товара...
    $good = new Good;
    $good->name = $request->name;
    $good->price = $request->price;
    $good->description = $request->description;
    $good->save();

    return redirect('/goods');
});

/**
 * Удалить задачу
 */
Route::delete('/task/{task}', function (Task $task) {
    $task->delete();
    return redirect('/tasks');
});
Route::delete('/good/{good}', function (Good $good) {
    $good->delete();
    return redirect('/goods');
});
