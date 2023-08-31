@extends('layout')
@section('content')
    <div class="content show">
        <div class="box-show">
            <p class="name">ID</p>
            <p class="value">{{$income->id}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">income_id</p>
            <p>{{$income->income_id}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">number</p>
            <p class="value">{{$income->number}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">date</p>
            <p class="value">{{$income->date}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">last_change_date</p>
            <p class="value">{{$income->last_change_date}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">supplier_article</p>
            <p class="value">{{$income->supplier_article}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">tech_size</p>
            <p class="value">{{$income->tech_size}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">barcode</p>
            <p class="value">{{$income->barcode}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">quantity</p>
            <p class="value">{{$income->quantity}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">total_price</p>
            <p class="value">{{$income->total_price}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">date_close</p>
            <p class="value">{{$income->date_close}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">warehouse_name</p>
            <p class="value">{{$income->warehouse_name}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">nm_id</p>
            <p class="value">{{$income->nm_id}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">status</p>
            <p class="value">{{$income->status}}</p>
        </div><hr>
    </div>
    <a class="btn back" href="{{ route('income.index', ['page' => $page]) }}">Back</a>
@endsection
