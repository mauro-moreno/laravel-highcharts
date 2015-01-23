<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Series\Animation;

use Aivo\Highchart\Exception\InvalidArgumentException;
use Aivo\Highchart\Series\SeriesInterface;

/**
 * Series animation.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
interface AnimationInterface
{

    /**
     * Gets the series.
     *
     * @return SeriesInterface Series.
     */
    public function getSeries();

    /**
     * Whether the animation is enabled.
     *
     * @return bool `true` if enabled, `false` if not.
     */
    public function isEnabled();

    /**
     * Sets whether the animation is enabled.
     *
     * @param bool $enabled `true` if enabled, `false` if not.
     *
     * @return self Reference to the animation.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setEnabled($enabled = true);

    /**
     * Gets the duration.
     *
     * @return int|null Duration, or `null` if not known.
     */
    public function getDuration();

    /**
     * Sets the duration.
     *
     * @param int|null $duration Duration, or `null` if not known.
     *
     * @return self Reference to the animation.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setDuration($duration);

    /**
     * Gets the easing.
     *
     * @return string|null Easing, or `null` if not known.
     */
    public function getEasing();

    /**
     * Sets the easing.
     *
     * @param string|null $easing Easing, or `null` if not known.
     *
     * @return self Reference to the animation.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setEasing($easing);

}
