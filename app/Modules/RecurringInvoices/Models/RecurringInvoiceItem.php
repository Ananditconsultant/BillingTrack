<?php

/**
 * This file is part of FusionInvoiceFOSS.
 *
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FI\Modules\RecurringInvoices\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use FI\Events\RecurringInvoiceItemSaving;
use FI\Events\RecurringInvoiceModified;
use FI\Support\CurrencyFormatter;
use FI\Support\NumberFormatter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecurringInvoiceItem extends Model
{
    use SoftDeletes;

    use SoftCascadeTrait;

    protected $softCascade = ['amount'];

    protected $dates = ['deleted_at'];
    /**
     * Guarded properties
     * @var array
     */
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        static::saving(function($recurringInvoiceItem)
        {
            event(new RecurringInvoiceItemSaving($recurringInvoiceItem));
        });

        static::saved(function($recurringInvoiceItem)
        {
            event(new RecurringInvoiceModified($recurringInvoiceItem->recurringInvoice));
        });

        static::deleted(function($recurringInvoiceItem)
        {
            if ($recurringInvoiceItem->recurringInvoice)
            {
                event(new RecurringInvoiceModified($recurringInvoiceItem->recurringInvoice));
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function amount()
    {
        return $this->hasOne('FI\Modules\RecurringInvoices\Models\RecurringInvoiceItemAmount', 'item_id');
    }

    public function recurringInvoice()
    {
        return $this->belongsTo('FI\Modules\RecurringInvoices\Models\RecurringInvoice');
    }

    public function taxRate()
    {
        return $this->belongsTo('FI\Modules\TaxRates\Models\TaxRate');
    }

    public function taxRate2()
    {
        return $this->belongsTo('FI\Modules\TaxRates\Models\TaxRate', 'tax_rate_2_id');
    }

    public function products()
    {
        return $this->hasMany('FI\Modules\Products\Models\Product', 'resource_id')
            ->where('resource_table','=','products');
    }

    public function employees()
    {
        return $this->hasMany('FI\Modules\Employees\Models\Employee', 'resource_id')
            ->where('resource_table','=','employees');
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    public function getFormattedQuantityAttribute()
    {
        return NumberFormatter::format($this->attributes['quantity']);
    }

    public function getFormattedNumericPriceAttribute()
    {
        return NumberFormatter::format($this->attributes['price']);
    }

    public function getFormattedPriceAttribute()
    {
        return CurrencyFormatter::format($this->attributes['price'], $this->recurringInvoice->currency);
    }

    public function getFormattedDescriptionAttribute()
    {
        return nl2br($this->attributes['description']);
    }
}