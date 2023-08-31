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
            <th>warehouse_name</th>
            <th>oblast</th>
            <th>income_id</th>
            <th>odid</th>
            <th>nm_id</th>
            <th>subject</th>
            <th>category</th>
            <th>brand</th>
            <th>is_cancel</th>
            <th>cancel_dt</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>
                    <a href="{{route('order.show', ['order' => $order->id, 'page' => $orders->withQueryString()->currentPage()])}}">{{$order->id}}</a>
                </td>
                <td>{{ \Illuminate\Support\Str::limit($order->g_number, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($order->date, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($order->last_change_date, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($order->supplier_article, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($order->tech_size, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($order->barcode, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($order->total_price, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($order->discount_percent, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($order->warehouse_name, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($order->oblast, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($order->income_id, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($order->odid, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($order->nm_id, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($order->subject, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($order->category, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($order->brand, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($order->is_cancel, 5) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($order->cancel_dt, 5) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
@section('paginator')
    <div class="paginator-container">
        {{$orders->withQueryString()->onEachSide(2)->links()}}
    </div>
@endsection

