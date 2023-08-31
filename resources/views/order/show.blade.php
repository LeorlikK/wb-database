@extends('layout')
@section('content')
    <div class="content show">
        <div class="box-show">
            <p class="name">ID</p>
            <p class="value">{{$order->id}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">g_number</p>
            <p>{{$order->g_number}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">date</p>
            <p class="value">{{$order->date}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">last_change_date</p>
            <p class="value">{{$order->last_change_date}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">supplier_article</p>
            <p class="value">{{$order->supplier_article}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">tech_size</p>
            <p class="value">{{$order->tech_size}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">barcode</p>
            <p class="value">{{$order->barcode}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">total_price</p>
            <p class="value">{{$order->total_price}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">discount_percent</p>
            <p class="value">{{$order->discount_percent}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">warehouse_name</p>
            <p class="value">{{$order->warehouse_name}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">oblast</p>
            <p class="value">{{$order->oblast}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">income_id</p>
            <p class="value">{{$order->income_id}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">odid</p>
            <p class="value">{{$order->odid}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">subject</p>
            <p class="value">{{$order->subject}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">category</p>
            <p class="value">{{$order->category}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">brand</p>
            <p class="value">{{$order->brand}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">is_cancel</p>
            <p class="value">{{$order->is_cancel}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">cancel_dt</p>
            <p class="value">{{$order->cancel_dt}}</p>
        </div><hr>
    </div>
    <a class="btn back" href="{{ route('order.index', ['page' => $page]) }}">Back</a>
@endsection
