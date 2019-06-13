<?php

/**
 * This file is part of BillingTrack.
 *
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BT\Composers;

class SkinComposer
{
    public function compose($view)
    {
        $defaultSkin = json_decode('{"headBackground":"purple","headClass":"Light","sidebarBackground":"white","sidebarClass":"Light"}',true);

        $skin = (config('fi.skin') ? json_decode(config('fi.skin'),true) : $defaultSkin);

        $view->with('headClass', $skin['headClass']);
        $view->with('headBackground', $skin['headBackground']);
        $view->with('sidebarClass', $skin['sidebarClass']);
        $view->with('sidebarBackground', $skin['sidebarBackground']);

    }
}
