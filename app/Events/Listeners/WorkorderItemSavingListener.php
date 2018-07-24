<?php

namespace FI\Events\Listeners;

use FI\Events\WorkorderItemSaving;
use FI\Modules\Workorders\Models\WorkorderItem;

class WorkorderItemSavingListener
{
    public function handle(WorkorderItemSaving $event)
    {
        $item = $event->workorderItem;

        $applyExchangeRate = $item->apply_exchange_rate;
        unset($item->apply_exchange_rate);

        if ($applyExchangeRate == true)
        {
            $item->price = $item->price * $item->workorder->exchange_rate;
        }

        if (!$item->display_order)
        {
            $displayOrder = WorkorderItem::where('workorder_id', $item->workorder_id)->max('display_order');

            $displayOrder++;

            $item->display_order = $displayOrder;
        }

        if (!$item->resource_id){
            $item->resource_id = 0;
        }
    }
}
