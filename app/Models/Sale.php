<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Sale
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
 * @property int $is_supply
 * @property int $is_realization
 * @property int $promo_code_discount
 * @property string $warehouse_name
 * @property string $country_name
 * @property string $oblast_okrug_name
 * @property string $region_name
 * @property int $income_id
 * @property string $sale_id
 * @property int $odid
 * @property int $spp
 * @property float $for_pay
 * @property float $finished_price
 * @property float $price_with_disc
 * @property int $nm_id
 * @property string $subject
 * @property string $category
 * @property string $brand
 * @property int $is_storno
 * @property int $account_id
 * @method static \Illuminate\Database\Eloquent\Builder|Sale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereDiscountPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereFinishedPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereForPay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereGNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereIncomeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereIsRealization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereIsStorno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereIsSupply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereLastChangeDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereNmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereOblastOkrugName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereOdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale wherePriceWithDisc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale wherePromoCodeDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereRegionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereSaleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereSpp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereSupplierArticle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereTechSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereWarehouseName($value)
 * @mixin \Eloquent
 */
class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales';
    protected $guarded = [];
    public $timestamps = false;
}
