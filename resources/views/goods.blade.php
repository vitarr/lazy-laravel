<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')<!-- обращение к views/layouts/app.blade.php -->

@section('content')

        <!-- Текущие товары -->
@if (count($goods) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            Товары
        </div>

        <div class="panel-body">
            <table class="table table-striped task-table">

                <!-- Заголовок таблицы -->
                <thead>
                <th>Товар</th>
                <th>Цена</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                </thead>

                <!-- Тело таблицы -->
                <tbody>
                @foreach ($goods as $good)
                    <tr>
                        <!-- Имя товара -->
                        <td class="table-text">
                            <div>{{ $good->name }}</div>
                        </td>
                        <td class="table-text">
                            <div>{{ $good->price }}</div>
                        </td>
                        <td style="width: 20%;">
                            <a class="btn btn-info" href="#" data-placement="top" data-toggle="popover" data-trigger="focus"  title="Описание товара:"
                               data-content="{{$good->description}}"><i class="fa fa-trash"></i> Описание</a>
                        </td>
                        <script>
                            $(document).ready(function () {
                                $('[data-toggle="popover"]').popover();
                            });
                        </script>
                        <td style="width: 20%;">
                            <form action="{{ url('good/'.$good->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i> Удалить
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
        @include('common.errors')

                <!-- Форма нового товара -->
        <form action="{{ url('good') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

                    <!-- Имя товара -->
            <div class="form-group">
                <label for="good" class="col-sm-3 control-label">Товар</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="good-name" class="form-control">
                </div>
            </div>
            <!-- Цена товара -->
            <div class="form-group">
                <label for="good" class="col-sm-3 control-label">Цена</label>

                <div class="col-sm-6">
                    <input type="number" name="price" id="good-price" class="form-control">
                </div>
            </div>
            <!-- Описание товара -->
            <div class="form-group">
                <label for="good" class="col-sm-3 control-label">Описание</label>

                <div class="col-sm-6">
                    <textarea type="text" name="description" id="good-description" class="form-control"></textarea>
                </div>
            </div>
            <!-- Кнопка добавления товара -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-warning btn-block">
                        <i class="fa fa-plus"></i> Добавить товар
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Форма создания товара... -->

@endif
@endsection