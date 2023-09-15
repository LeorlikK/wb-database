<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Stock
 *
 * @property int $id
 * @property string $date
 * @property string $last_change_date
 * @property string $supplier_article
 * @property string $tech_size
 * @property string $barcode
 * @property int $quantity
 * @property int $is_supply
 * @property int $is_realization
 * @property int $quantity_full
 * @property string $warehouse_name
 * @property int $in_way_to_client
 * @property int $in_way_from_client
 * @property int $nm_id
 * @property string $subject
 * @property string $category
 * @property string $brand
 * @property string $sc_code
 * @property float $price
 * @property int $discount
 * @property int $account_id
 * @method static \Illuminate\Database\Eloquent\Builder|Stock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereInWayFromClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereInWayToClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereIsRealization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereIsSupply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereLastChangeDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereNmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereQuantityFull($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereScCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereSupplierArticle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereTechSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereWarehouseName($value)
 * @mixin \Eloquent
 */
class Stock extends Model
{
    use HasFactory;

    protected $table = 'stocks';
    protected $guarded = [];
    public $timestamps = false;
}
