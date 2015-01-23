<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Series;

use Aivo\Highchart\Exception\InvalidArgumentException;

/**
 * Stackable series.
 *
 * Do not implement this interface directly.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
interface StackableSeriesInterface extends SequentialSeriesInterface
{

    /**
     * Whether the series is stacking.
     *
     * @return bool `true` if the series is stacking, otherwise `false`.
     */
    public function isStacking();

    /**
     * Whether the series is stacking by percentage.
     *
     * @return bool `true` if the series is stacking by percentage, otherwise `false`.
     */
    public function isPercentageStacking();

    /**
     * Sets whether the series is stacking.
     *
     * @param bool $stacking   `true` if the series is stacking, otherwise `false`.
     * @param bool $percentage `true` if the series is stacking by percentage, otherwise `false`.
     *
     * @return self Reference to the series.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setStacking($stacking = true, $percentage = false);

    /**
     * Gets the stack group.
     *
     * @return string|null Stack group, or null if not set.
     */
    public function getGroup();

    /**
     * Sets the stack group.
     *
     * @param string $group Stack group.
     *
     * @return self Reference to the series.
     */
    public function setGroup($group);

}
