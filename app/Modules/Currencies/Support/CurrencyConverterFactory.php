<?php

/**
 * This file is part of BillingTrack.
 *
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FI\Modules\Currencies\Support;

class CurrencyConverterFactory
{
    public static function create()
    {
        $class = 'FI\Modules\Currencies\Support\Drivers\\' . config('fi.currencyConversionDriver');

        return new $class;
    }
}
