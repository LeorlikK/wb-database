<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\View\View;

class IncomeController extends Controller
{
    public function index(?string $page=null): View
    {
        $perPage = 100;
        $page = (int) $page ?? 1;

        $incomes = Income::query()->paginate($perPage, '*', 'page', $page);

        return view('income.index', compact('incomes'));
    }

    public function show(Income $income, ?string $page=null): View
    {
        $page = (int) $page ?? 1;

        return view('income.show', compact('income', 'page'));
    }
}
