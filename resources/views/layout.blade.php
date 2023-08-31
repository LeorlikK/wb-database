<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite(['resources/css/app.css'])
    <title>Document</title>
</head>
<body>
    <header></header>
    <nav class="navbar">
        <ul class="menu-ul">
            <li class="menu-li"><a href="{{ route('income.index') }}">Incomes</a></li>
            <li class="menu-li"><a href="{{ route('order.index') }}">Orders</a></li>
            <li class="menu-li"><a href="{{ route('sale.index') }}">Sales</a></li>
            <li class="menu-li"><a href="{{ route('stock.index') }}">Stocks</a></li>
        </ul>
    </nav>
    @yield('content')
    <footer>
        @yield('paginator')
    </footer>
</body>
</html>
