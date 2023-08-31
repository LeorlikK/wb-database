@extends('layout')
@section('content')
    <div class="content show">
        <div class="box-show">
            <p class="name">ID</p>
            <p class="value">{{$sale->id}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">g_number</p>
            <p>{{$sale->g_number}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">date</p>
            <p class="value">{{$sale->date}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">last_change_date</p>
            <p class="value">{{$sale->last_change_date}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">supplier_article</p>
            <p class="value">{{$sale->supplier_article}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">tech_size</p>
            <p class="value">{{$sale->tech_size}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">barcode</p>
            <p class="value">{{$sale->barcode}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">total_price</p>
            <p class="value">{{$sale->total_price}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">discount_percent</p>
            <p class="value">{{$sale->discount_percent}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">is_supply</p>
            <p class="value">{{$sale->is_supply}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">is_realization</p>
            <p class="value">{{$sale->is_realization}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">promo_code_discount</p>
            <p class="value">{{$sale->promo_code_discount}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">warehouse_name</p>
            <p class="value">{{$sale->warehouse_name}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">country_name</p>
            <p class="value">{{$sale->country_name}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">oblast_okrug_name</p>
            <p class="value">{{$sale->oblast_okrug_name}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">region_name</p>
            <p class="value">{{$sale->region_name}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">income_id</p>
            <p class="value">{{$sale->income_id}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">sale_id</p>
            <p class="value">{{$sale->sale_id}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">odid</p>
            <p class="value">{{$sale->odid}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">spp</p>
            <p class="value">{{$sale->spp}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">for_pay</p>
            <p class="value">{{$sale->for_pay}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">finished_price</p>
            <p class="value">{{$sale->finished_price}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">price_with_disc</p>
            <p class="value">{{$sale->price_with_disc}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">nm_id</p>
            <p class="value">{{$sale->nm_id}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">subject</p>
            <p class="value">{{$sale->subject}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">category</p>
            <p class="value">{{$sale->category}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">brand</p>
            <p class="value">{{$sale->brand}}</p>
        </div><hr>
        <div class="box-show">
            <p class="name">is_storno</p>
            <p class="value">{{$sale->is_storno}}</p>
        </div><hr>
    </div>
    <a class="btn back" href="{{ route('sale.index', ['page' => $page]) }}">Back</a>
@endsection
