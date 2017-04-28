<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$title}}</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .content {
            height: 100%;
            text-align: center;
            display: table-cell;
            vertical-align: middle;
            margin-top: 100px;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
            text-align: center;
            display: inline-block;
        }

        * {
            font-family: 'Lato';
            font-size: 20px;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>

<body>
<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="https://laravel.ru" target="_blank">Laravell</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="{{$main_active}}"><a href="{{ url('/') }}">Главная</a></li>
                <li class="{{$tasks_active}}"><a href="{{ url('tasks') }}">Задачи</a></li>
                <li class="{{$goods_active}}"><a href="{{ url('goods') }}">Товары</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="container col-md-6 col-md-offset-3">
    @yield('content')<!--подключает блок content-->
</div>
</body>
</html>