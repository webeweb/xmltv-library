<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once __DIR__ . "/vendor/autoload.php";

use WBW\Library\XMLTV\XMLTV;

$tv = XMLTV::parseXML("/home/camille/Downloads/tvguide.xml");

$channels = $tv->indexChannelsById();
foreach ($channels["C192.api.telerama.fr"]->getProgrammes() as $current) {
    echo $current->getStartDateTime()->format("d/m/Y H:i:s") . "\n";
}

$debug = "breakpoint";
