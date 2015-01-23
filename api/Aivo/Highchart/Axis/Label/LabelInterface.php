<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Axis\Label;

use Aivo\Highchart\Axis\AxisInterface;
use Aivo\Highchart\StyleableInterface;
use Aivo\Highchart\Exception\InvalidArgumentException;

/**
 * Axis label.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
interface LabelInterface extends StyleableInterface
{

    const ALIGN_LEFT = 'left';
    const ALIGN_CENTER = 'center';
    const ALIGN_RIGHT = 'right';

    /**
     * Gets the axis.
     *
     * @return AxisInterface Axis.
     */
    public function getAxis();

    /**
     * Whether the label is enabled.
     *
     * @return bool `true` if enabled, otherwise `false`.
     */
    public function isEnabled();

    /**
     * Sets whether the label is enabled.
     *
     * @param bool $enabled `true` if enabled, otherwise `false`.
     *
     * @return self Reference to the label.
     */
    public function setEnabled($enabled = true);

    /**
     * Gets the alignment.
     *
     * @return string|null Alignment, or `null` if not set.
     */
    public function getAlign();

    /**
     * Sets the alignment.
     *
     * @param string|null $align Alignment, or `null` to remove the existing value.
     *
     * @return self Reference to the label.
     */
    public function setAlign($align);

    /**
     * Gets the x-offset.
     *
     * @return int|null X-offset, or `null` if not set.
     */
    public function getXOffset();

    /**
     * Sets the x-offset.
     *
     * @param int|null $xOffset X-offset, or `null` to remove a set value.
     *
     * @return self Reference to the label.
     */
    public function setXOffset($xOffset);

    /**
     * Gets the y-offset.
     *
     * @return int|null Y-offset, or `null` if not set.
     */
    public function getYOffset();

    /**
     * Sets the y-offset.
     *
     * @param int|null $yOffset Y-offset, or `null` to remove a set value.
     *
     * @return self Reference to the label.
     */
    public function setYOffset($yOffset);

    /**
     * Whether the first label is shown.
     *
     * @return bool `true` if shown, otherwise `false`.
     */
    public function isShowFirst();

    /**
     * Sets whether the first label is shown.
     *
     * @param bool $showFirst `true` if shown, otherwise `false`.
     *
     * @return self Reference to the label.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setShowFirst($showFirst = true);

    /**
     * Whether the last label is shown.
     *
     * @return bool `true` if shown, otherwise `false`.
     */
    public function isShowLast();

    /**
     * Sets whether the last label is shown.
     *
     * @param bool $showLast `true` if shown, otherwise `false`.
     *
     * @return self Reference to the label.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setShowLast($showLast = true);

}
