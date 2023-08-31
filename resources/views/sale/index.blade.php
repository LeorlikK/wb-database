@extends('layout')
@section('content')
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>g_number</th>
                <th>date</th>
                <th>last_change_date</th>
                <th>supplier_article</th>
                <th>tech_size</th>
                <th>barcode</th>
                <th>total_price</th>
                <th>discount_percent</th>
                <th>is_supply</th>
                <th>is_realization</th>
                <th>promo_code_discount</th>
                <th>warehouse_name</th>
                <th>country_name</th>
                <th>oblast_okrug_name</th>
                <th>region_name</th>
                <th>income_id</th>
                <th>sale_id</th>
                <th>odid</th>
                <th>spp</th>
                <th>for_pay</th>
                <th>finished_price</th>
                <th>price_with_disc</th>
                <th>nm_id</th>
                <th>subject</th>
                <th>category</th>
                <th>brand</th>
                <th>is_storno</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>
                        <a href="{{route('sale.show', ['sale' => $sale->id, 'page' => $sales->withQueryString()->currentPage()])}}">{{$sale->id}}</a>
                    </td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->g_number, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->date, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->last_change_date, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->supplier_article, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->tech_size, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->barcode, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->total_price, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->discount_percent, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->is_supply, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->is_realization, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->promo_code_discount, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->warehouse_name, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->country_name, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->oblast_okrug_name, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->region_name, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->income_id, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->sale_id, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->odid, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->spp, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->for_pay, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->finished_price, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->price_with_disc, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->nm_id, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->subject, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->category, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->brand, 5) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sale->is_storno, 5) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

@endsection
@section('paginator')
    <div class="paginator-container">
        {{$sales->withQueryString()->onEachSide(2)->links()}}
    </div>
@endsection
