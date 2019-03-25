<?php

/**
 * This file is part of BillingTrack.
 *
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FI\Modules\Payments\Requests;

use FI\Support\NumberFormatter;
use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function attributes()
    {
        return [
            'client_id'        => trans('fi.client'),
            'paid_at'           => trans('fi.payment_date'),
            'invoice_id'        => trans('fi.invoice'),
            'amount'            => trans('fi.amount'),
            'payment_method_id' => trans('fi.payment_method'),
        ];
    }

    public function prepareForValidation()
    {
        $request = $this->all();

        $request['amount'] = (isset($request['amount'])) ? NumberFormatter::unformat($request['amount']) : null;

        $this->replace($request);
    }

    public function rules()
    {
        return [
            'client_id'         => 'required',
            'paid_at'           => 'required',
            'invoice_id'        => 'required',
            'amount'            => 'required|numeric',
            'payment_method_id' => 'required',
        ];
    }
}
