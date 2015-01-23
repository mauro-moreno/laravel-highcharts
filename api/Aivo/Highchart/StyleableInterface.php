<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart;

interface StyleableInterface
{

    /**
     * Gets a style.
     *
     * @param string $key Key.
     *
     * @return string|null Style value, or `null` if not set.
     */
    public function getStyle($key);

    /**
     * Gets styles.
     *
     * @return array Styles.
     */
    public function getStyles();

    /**
     * Sets a style.
     *
     * @param string $key   Key.
     * @param string $value Style.
     *
     * @return self Reference to the object.
     */
    public function setStyle($key, $value);

    /**
     * Sets styles.
     *
     * @param array $styles Styles.
     *
     * @return self Reference to the object.
     */
    public function setStyles(array $styles);

}
