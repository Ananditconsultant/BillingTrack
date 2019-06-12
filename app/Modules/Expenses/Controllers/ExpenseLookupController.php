<?php

/**
 * This file is part of BillingTrack.
 *
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FI\Modules\Expenses\Controllers;

use FI\Http\Controllers\Controller;
use FI\Modules\Categories\Models\Category;
use FI\Modules\Vendors\Models\Vendor;

class ExpenseLookupController extends Controller
{
    public function lookupCategory()
    {
        $expenses = Category::select('name')
            ->where('name', 'like', '%' . request('term') . '%')
            ->orderBy('name')
            ->get();

        $list = [];

        foreach ($expenses as $expense)
        {
            $list[]['value'] = $expense->name;
        }

        return json_encode($list);
    }

    public function lookupVendor()
    {
        $expenses = Vendor::select('name')
            ->where('name', 'like', '%' . request('term') . '%')
            ->orderBy('name')
            ->get();

        $list = [];

        foreach ($expenses as $expense)
        {
            $list[]['value'] = $expense->name;
        }

        return json_encode($list);
    }
}
