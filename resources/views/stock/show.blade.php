@extends('layout')
@section('content')
    <div class="content show">
    </div>
    <a class="btn back" href="{{ route('stock.index', ['page' => $page]) }}">Back</a>
@endsection
