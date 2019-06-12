<?php

/**
 * This file is part of BillingTrack.
 *
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FI\Modules\Vendors\Models;

use FI\Support\CurrencyFormatter;
use FI\Support\Statuses\InvoiceStatuses;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendors';

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    /*
   |--------------------------------------------------------------------------
   | Relationships
   |--------------------------------------------------------------------------
   */

    public function attachments()
    {
        return $this->morphMany('FI\Modules\Attachments\Models\Attachment', 'attachable');
    }

    public function contacts()
    {
        return $this->hasMany('FI\Modules\Vendors\Models\Contact');
    }

    public function currency()
    {
        return $this->belongsTo('FI\Modules\Currencies\Models\Currency', 'currency_code', 'code');
    }

    public function custom()
    {
        return $this->hasOne('FI\Modules\CustomFields\Models\VendorCustom');
    }

    public function notes()
    {
        return $this->morphMany('FI\Modules\Notes\Models\Note', 'notable');
    }

    public function user()
    {
        return $this->hasOne('FI\Modules\Users\Models\User');
    }

    public function paymentterm()
    {
        return $this->belongsTo('FI\Modules\PaymentTerms\Models\Paymentterm');
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    public function getAttachmentPathAttribute()
    {
        return attachment_path('vendors/' . $this->id);
    }

    public function getAttachmentPermissionOptionsAttribute()
    {
        return ['0' => trans('fi.not_visible')];
    }

    public function getFormattedBalanceAttribute()
    {
        return CurrencyFormatter::format($this->balance, $this->currency);
    }

    public function getFormattedPaidAttribute()
    {
        return CurrencyFormatter::format($this->paid, $this->currency);
    }

    public function getFormattedTotalAttribute()
    {
        return CurrencyFormatter::format($this->total, $this->currency);
    }

    public function getFormattedAddressAttribute()
    {
        return nl2br(formatAddress($this));
    }

    public function getFormattedAddress2Attribute()
    {
        return nl2br(formatAddress2($this));
    }

    public function getVendorEmailAttribute()
    {
        return $this->email;
    }

    public function getVendorTermsAttribute()
    {
        if ($this->paymentterm->id != 1) {
            return $this->paymentterm->num_days;
        } else
            return config('fi.invoicesDueAfter');
    }

    /*
        |--------------------------------------------------------------------------
        | Scopes
        |--------------------------------------------------------------------------
        */

    public function scopeGetSelect()
    {
        return self::select('vendors.*',
            DB::raw('(' . $this->getBalanceSql() . ') as balance'),
            DB::raw('(' . $this->getPaidSql() . ') AS paid'),
            DB::raw('(' . $this->getTotalSql() . ') AS total')
        );
    }

    public function scopeStatus($query, $status)
    {
        if ($status == 'active')
        {
            $query->where('active', 1);
        }
        elseif ($status == 'inactive')
        {
            $query->where('active', 0);
        }
        elseif ($status == 'company')
        {
            $query->where('is_company', 1);
        }
        elseif ($status == 'individual')
        {
            $query->where('is_company', 0);
        }

        return $query;
    }

    public function scopeKeywords($query, $keywords)
    {
        if ($keywords)
        {
            $keywords = explode(' ', $keywords);

            foreach ($keywords as $keyword)
            {
                if ($keyword)
                {
                    $keyword = strtolower($keyword);

                    $query->where(DB::raw("CONCAT_WS('^',LOWER(name),LOWER(unique_name),LOWER(email),phone,fax,mobile)"), 'LIKE', "%$keyword%");
                }
            }
        }

        return $query;
    }

    /*
    |--------------------------------------------------------------------------
    | Subqueries
    |--------------------------------------------------------------------------
    */

    private function getBalanceSql()
    {
        return DB::table('invoice_amounts')->select(DB::raw('sum(balance)'))->whereIn('invoice_id', function ($q)
        {
            $q->select('id')
                ->from('invoices')
                ->where('invoices.vendor_id', '=', DB::raw(DB::getTablePrefix() . 'vendors.id'))
                ->where('invoices.invoice_status_id', '<>', DB::raw(InvoiceStatuses::getStatusId('canceled')));
        })->toSql();
    }

    private function getPaidSql()
    {
        return DB::table('invoice_amounts')->select(DB::raw('sum(paid)'))->whereIn('invoice_id', function ($q)
        {
            $q->select('id')->from('invoices')->where('invoices.vendor_id', '=', DB::raw(DB::getTablePrefix() . 'vendors.id'));
        })->toSql();
    }

    private function getTotalSql()
    {
        return DB::table('invoice_amounts')->select(DB::raw('sum(total)'))->whereIn('invoice_id', function ($q)
        {
            $q->select('id')->from('invoices')->where('invoices.vendor_id', '=', DB::raw(DB::getTablePrefix() . 'vendors.id'));
        })->toSql();
    }


    /*
    |--------------------------------------------------------------------------
    | Static Methods
    |--------------------------------------------------------------------------
    */

    public static function getList()
    {
        return self::whereIn('id', function ($query)
        {
            $query->select('vendor_id')->distinct()->from('expenses');
        })->orderBy('name')
            ->pluck('name', 'id')
            ->all();
    }
}
