<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Axis;

/**
 * X-axis.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
class XAxis extends AbstractAxis implements XAxisInterface
{

    /**
     * @return XAxisInterface
     */
    public static function factory()
    {
        return new self();
    }

    /**
     * {@inheritdoc}
     */
    protected $tickWidth = 1;

}
