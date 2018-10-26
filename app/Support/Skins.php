<?php

/**
 * This file is part of FusionInvoiceFOSS.
 *
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FI\Support;

class Skins
{
    public static function lists()
    {
        $skins = Directory::listAssocContents(public_path('css/skins'));

        unset($skins['_all-skins.css'], $skins['_all-skins.min.css']);
        unset($skins['dataTable-style.css'], $skins['dataTable-style.min.css']);

        foreach ($skins as $skin)
        {
            if (!strstr($skin, '.min.css'))
            {
                unset($skins[$skin]);
                continue;
            }

            $skins[$skin] = str_replace('skin-', '', $skins[$skin]);
            $skins[$skin] = str_replace('.min.css', '', $skins[$skin]);

        }

        return $skins;
    }
}