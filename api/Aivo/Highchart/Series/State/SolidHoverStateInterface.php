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
 * Solid hover series state.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
interface SolidHoverStateInterface extends HoverStateInterface
{

    /**
     * Gets the brightness.
     *
     * @return float Brightness, or `null` if not set.
     */
    public function getBrightness();

    /**
     * Sets the brightness.
     *
     * @param float|null $brightness Brightness, or `null` to remove the existing value.
     *
     * @return self Reference to the hover state.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setBrightness($brightness);

}
