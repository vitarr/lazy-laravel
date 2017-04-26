<?php

use App\Task;
use Illuminate\Http\Request;

/**
 * Вывести панель с задачами
 */
Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('tasks', [
        'tasks' => $tasks,
        'title' => 'all tasks'
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
        return redirect('/')
                        ->withInput()
                        ->withErrors($validator);
    }

    // Создание задачи...
    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

/**
 * Удалить задачу
 */
Route::delete('/task/{task}', function (Task $task) {
    $task->delete();
    return redirect('/');
});
