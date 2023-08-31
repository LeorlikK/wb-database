<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\View\View;

class StockController extends Controller
{
    public function index(?string $page=null): View
    {
        $perPage = 100;
        $page = (int) $page ?? 1;

        $stocks = Stock::query()->paginate($perPage, '*', 'page', $page);

        return view('stock.index', compact('stocks'));
    }

    public function show(Stock $stock, ?string $page=null): View
    {
        $page = (int) $page ?? 1;

        return view('stock.show', compact('stock', 'page'));
    }
}
