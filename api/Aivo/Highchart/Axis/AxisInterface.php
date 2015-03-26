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

use Aivo\Highchart\Axis\Label\LabelInterface;
use Aivo\Highchart\Axis\Title\TitleInterface;
use Aivo\Highchart\Exception\InvalidArgumentException;

/**
 * Axis.
 *
 * Do not implement this directly, use `XAxisInterface` and `YAxisInterface` as
 * appropriate.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
interface AxisInterface
{

    /**
     * Gets the title.
     *
     * @return TitleInterface Title.
     */
    public function getTitle();

    /**
     * Gets the labels.
     *
     * @return LabelInterface Labels.
     */
    public function getLabel();

    /**
     * Gets a category;
     *
     * @param string $id ID.
     *
     * @return string|null Category name, or `null` if not set.
     */
    public function getCategory($id);

    /**
     * Gets the categories;
     *
     * @return array Categories.
     */
    public function getCategories();

    /**
     * Adds a category.
     *
     * @param string $id   ID.
     * @param string $name Name.
     *
     * @return self Reference to the axis.
     */
    public function addCategory($id, $name);

    /**
     * Adds categories.
     *
     * @param array $categories Categories.
     *
     * @return self Reference to the axis.
     */
    public function addCategories(array $categories);

    /**
     * Clears existing categories.
     *
     * @return self Reference to the axis.
     */
    public function clearCategories();

    /**
     * Gets the maximum value.
     *
     * @return int|float|null Maximum value, or `null` if not set.
     */
    public function getMaxValue();

    /**
     * Sets the maximum value.
     *
     * @param int|float|null $maxValue Maximum value, or `null` to remove the existing value.
     *
     * @return self Reference to the axis.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setMaxValue($maxValue);

    /**
     * Gets the minimum value.
     *
     * @return int|float|null Min value, or `null` if not set.
     */
    public function getMinValue();

    /**
     * Sets the minimum value.
     *
     * @param int|float|null $minValue Minimum value, or `null` to remove the existing value.
     *
     * @return self Reference to the axis.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setMinValue($minValue);

    /**
     * Whether the axis is opposite.
     *
     * @return bool `true` if opposite, otherwise `false`.
     */
    public function isOpposite();

    /**
     * Sets whether the axis is opposite.
     *
     * @param bool $opposite `true` if opposite, otherwise `false`.
     *
     * @return self Reference to the axis.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setOpposite($opposite = true);

    /**
     * Gets the tick width.
     *
     * @return int Tick width.
     */
    public function getTickWidth();

    /**
     * Sets the tick width.
     *
     * @param int $tickWidth Tick width.
     *
     * @return self Reference to the axis.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setTickWidth($tickWidth);

    /**
     * Gets the grid line width.
     *
     * @return int Grid line width.
     */
    public function getGridLineWidth();

    /**
     * Sets the grid line width.
     *
     * @param int $gridLineWidth Grid line width.
     *
     * @return self Reference to the axis.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setGridLineWidth($gridLineWidth);

    /**
     * Whether the axis is reversed.
     *
     * @return bool `true` if reversed, otherwise `false`.
     */
    public function isReversed();

    /**
     * Sets whether the axis is reversed.
     *
     * @param bool $reversed `true` if reversed, otherwise `false`.
     *
     * @return self Reference to the axis.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setReversed($reversed = true);

}
