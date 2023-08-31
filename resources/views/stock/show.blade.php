@extends('layout')
@section('content')
    <div class="content show">
        <div class="box-show">
            <p class="name">ID</p>
            <p class="value">{{$stock->id}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">date</p>
            <p>{{$stock->date}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">last_change_date</p>
            <p class="value">{{$stock->last_change_date}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">supplier_article</p>
            <p class="value">{{$stock->supplier_article}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">tech_size</p>
            <p class="value">{{$stock->tech_size}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">barcode</p>
            <p class="value">{{$stock->barcode}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">quantity</p>
            <p class="value">{{$stock->quantity}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">is_supply</p>
            <p class="value">{{$stock->is_supply}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">is_realization</p>
            <p class="value">{{$stock->is_realization}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">quantity_full</p>
            <p class="value">{{$stock->quantity_full}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">warehouse_name</p>
            <p class="value">{{$stock->warehouse_name}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">in_way_to_client</p>
            <p class="value">{{$stock->in_way_to_client}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">in_way_from_client</p>
            <p class="value">{{$stock->in_way_from_client}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">nm_id</p>
            <p class="value">{{$stock->nm_id}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">subject</p>
            <p class="value">{{$stock->subject}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">category</p>
            <p class="value">{{$stock->category}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">brand</p>
            <p class="value">{{$stock->brand}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">sc_code</p>
            <p class="value">{{$stock->sc_code}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">price</p>
            <p class="value">{{$stock->price}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">discount</p>
            <p class="value">{{$stock->discount}}</p>
        </div><hr>
    </div>
    <a class="btn back" href="{{ route('stock.index', ['page' => $page]) }}">Back</a>
@endsection
