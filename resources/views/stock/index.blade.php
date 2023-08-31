@extends('layout')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>date</th>
            <th>last_change_date</th>
            <th>supplier_article</th>
            <th>tech_size</th>
            <th>barcode</th>
            <th>quantity</th>
            <th>is_supply</th>
            <th>is_realization</th>
            <th>quantity_full</th>
            <th>warehouse_name</th>
            <th>in_way_to_client</th>
            <th>in_way_from_client</th>
            <th>nm_id</th>
            <th>subject</th>
            <th>category</th>
            <th>brand</th>
            <th>sc_code</th>
            <th>price</th>
            <th>discount</th>
        </tr>
        </thead>
        <tbody>
        @foreach($stocks as $stock)
            <tr>
                <td>
                    <a href="{{route('stock.show', ['stock' => $stock->id, 'page' => $stocks->withQueryString()->currentPage()])}}">{{$stock->id}}</a>
                </td>
                <td>{{ \Illuminate\Support\Str::limit($stock->date, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($stock->last_change_date, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($stock->supplier_article, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($stock->tech_size, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($stock->barcode, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($stock->quantity, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($stock->is_supply, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($stock->is_realization, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($stock->quantity_full, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($stock->warehouse_name, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($stock->in_way_to_client, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($stock->in_way_from_client, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($stock->nm_id, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($stock->subject, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($stock->category, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($stock->brand, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($stock->sc_code, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($stock->price, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($stock->discount, 5) }}</td>
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
