<?php

/**
 * This file is part of FusionInvoiceFOSS.
 *
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FI\Modules\Quotes\Requests;

class QuoteToWorkorderRequest extends QuoteStoreRequest
{
    public function rules()
    {
        return [
            'client_id'    => 'required',
            'workorder_date' => 'required',
            'group_id'     => 'required',
        ];
    }
}