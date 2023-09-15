<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property string $g_number
 * @property string $date
 * @property string $last_change_date
 * @property string $supplier_article
 * @property string $tech_size
 * @property string $barcode
 * @property float $total_price
 * @property int $discount_percent
 * @property string $warehouse_name
 * @property string $oblast
 * @property int $income_id
 * @property int $odid
 * @property int $nm_id
 * @property string $subject
 * @property string $category
 * @property string $brand
 * @property int $is_cancel
 * @property string|null $cancel_dt
 * @property int $account_id
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCancelDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDiscountPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereGNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereIncomeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereIsCancel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLastChangeDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereNmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOblast($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSupplierArticle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTechSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereWarehouseName($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $guarded = [];
    public $timestamps = false;
}
