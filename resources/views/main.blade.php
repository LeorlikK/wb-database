@extends('layout')
@section('content')
    <div class="content show">
        <p>INCOME:</p>
        <p>index: /income/{page?};</p>
        <p>show: /income/show/{income}/{page?}</p>
    </div>
    <div class="content show">
        <p>ORDER:</p>
        <p>index: /order/{page?};</p>
        <p>show: /order/show/{order}/{page?}</p>
    </div>
    <div class="content show">
        <p>SALE:</p>
        <p>index: /sale/{page?};</p>
        <p>show: /sale/show/{sale}/{page?};</p>
    </div>
    <div class="content show">
        <p>STOCK:</p>
        <p>index: /stock/{page?};</p>
        <p>show: /stock/show/{stock}/{page?};</p>
    </div>
@endsection
