<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Income
 *
 * @property int $id
 * @property int $income_id
 * @property string $number
 * @property string $date
 * @property string $last_change_date
 * @property string $supplier_article
 * @property string $tech_size
 * @property string $barcode
 * @property int $quantity
 * @property float $total_price
 * @property string $date_close
 * @property string $warehouse_name
 * @property int $nm_id
 * @property string $status
 * @property int $account_id
 * @method static \Illuminate\Database\Eloquent\Builder|Income newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Income newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Income query()
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereDateClose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereIncomeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereLastChangeDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereNmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereSupplierArticle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereTechSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereWarehouseName($value)
 * @mixin \Eloquent
 */
class Income extends Model
{
    use HasFactory;

    protected $table = 'incomes';
    protected $guarded = [];
    public $timestamps = false;
}
