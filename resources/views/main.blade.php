@extends('layout')
@section('content')
    <div class="content show">
        <p class="main">INCOME:</p>
        <p>command: php artisan pars:incomes</p>
        <p>index: /income/{page?}</p>
        <p>show: /income/show/{income}/{page?}</p>
    </div>
    <div class="content show">
        <p class="main">ORDER:</p>
        <p>command: php artisan pars:orders</p>
        <p>index: /order/{page?}</p>
        <p>show: /order/show/{order}/{page?}</p>
    </div>
    <div class="content show">
        <p class="main">SALE:</p>
        <p>command: php artisan pars:sales</p>
        <p>index: /sale/{page?}</p>
        <p>show: /sale/show/{sale}/{page?}</p>
    </div>
    <div class="content show">
        <p class="main">STOCK:</p>
        <p>command: php artisan pars:stocks</p>
        <p>index: /stock/{page?}</p>
        <p>show: /stock/show/{stock}/{page?}</p>
    </div>
@endsection
