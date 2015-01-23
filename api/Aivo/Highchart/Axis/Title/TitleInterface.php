<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Axis\Title;

use Aivo\Highchart\Axis\AxisInterface;
use Aivo\Highchart\Exception\InvalidArgumentException;
use Aivo\Highchart\StyleableInterface;

/**
 * Axis title.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
interface TitleInterface extends StyleableInterface
{

    /**
     * Gets axis.
     *
     * @return AxisInterface Axis.
     */
    public function getAxis();

    /**
     * Whether the title is enabled.
     *
     * @return bool `true` if enabled, otherwise `false`.
     */
    public function isEnabled();

    /**
     * Sets whether the title is enabled.
     *
     * @param bool $enabled `true` if enabled, otherwise `false`.
     *
     * @return self Reference to the Title.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setEnabled($enabled = true);

    /**
     * Gets the text.
     *
     * @return string|null Text, or `null` if not set.
     */
    public function getText();

    /**
     * Sets the text.
     *
     * @param string|null $text Text, or `null` to remove the existing value.
     *
     * @return self Reference to the title.
     */
    public function setText($text);

}
