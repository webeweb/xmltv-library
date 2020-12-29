<?php

/*
 * This file is part of the xmltv-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\XMLTV\Tests\Fixtures\Statistic;

use WBW\Library\XMLTV\Statistic\Statistic;
use WBW\Library\XMLTV\Statistic\Statistics;

/**
 * Test statistics.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Tests\Fixtures\Statistic
 */
class TestStatistics extends Statistics {

    /**
     * {@inheritDoc}
     */
    public function getStatistic(string $key): Statistic {
        return parent::getStatistic($key);
    }
}
