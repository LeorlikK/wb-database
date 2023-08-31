@extends('layout')
@section('content')
    <table class="table">
        <thead>
        <tr>
        </tr>
        </thead>
        <tbody>
        @foreach($stocks as $stock)
            <tr>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
@section('paginator')
    <div class="paginator-container">
        {{$stocks->withQueryString()->onEachSide(2)->links()}}
    </div>
@endsection
