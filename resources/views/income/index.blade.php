@extends('layout')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>income_id</th>
            <th>number</th>
            <th>date</th>
            <th>last_change_date</th>
            <th>supplier_article</th>
            <th>tech_size</th>
            <th>barcode</th>
            <th>quantity</th>
            <th>total_price</th>
            <th>date_close</th>
            <th>warehouse_name</th>
            <th>nm_id</th>
            <th>status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($incomes as $income)
            <tr>
                <td>
                    <a href="{{route('income.show', ['income' => $income->id, 'page' => $incomes->withQueryString()->currentPage()])}}">{{$income->id}}</a>
                </td>
                <td>{{ \Illuminate\Support\Str::limit($income->income_id, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($income->number, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($income->date, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($income->last_change_date, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($income->supplier_article, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($income->tech_size, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($income->barcode, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($income->quantity, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($income->total_price, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($income->date_close, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($income->warehouse_name, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($income->nm_id, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($income->status, 5) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
@section('paginator')
    <div class="paginator-container">
        {{$incomes->withQueryString()->onEachSide(2)->links()}}
    </div>
@endsection

