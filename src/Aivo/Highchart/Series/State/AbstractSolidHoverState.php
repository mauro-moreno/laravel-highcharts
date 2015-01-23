<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Series\State;

use Aivo\Highchart\Exception\InvalidArgumentException;

/**
 * Abstract solid hover state.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
abstract class AbstractSolidHoverState extends AbstractHoverState
    implements SolidHoverStateInterface
{

    /**
     * Brightness.
     *
     * @var float|null
     */
    protected $brightness;

    /**
     * {@inheritdoc}
     */
    public function getBrightness()
    {
        return $this->brightness;
    }

    /**
     * {@inheritdoc}
     */
    public function setBrightness($brightness)
    {
        if (false === is_float($brightness) && false === is_null($brightness)) {
            throw new InvalidArgumentException();
        }

        $this->brightness = $brightness;

        return $this;
    }

}
