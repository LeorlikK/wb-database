<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\View\View;

class SaleController extends Controller
{
    public function index(?string $page=null): View
    {
        $perPage = 100;
        $page = (int) $page ?? 1;

        $sales = Sale::query()->paginate($perPage, '*', 'page', $page);

        return view('sale.index', compact('sales'));
    }

    public function show(Sale $sale, ?string $page=null): View
    {
        $page = (int) $page ?? 1;

        return view('sale.show', compact('sale', 'page'));
    }
}
