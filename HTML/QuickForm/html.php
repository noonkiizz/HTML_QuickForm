<?php

/**
 * A pseudo-element used for adding raw HTML to form.
 *
 * PHP versions 4 and 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @author Alexey Borzov <avb@php.net>
 * @copyright 2001-2011 The PHP Group
 * @license http://www.php.net/license/3_01.txt PHP License 3.01
 *
 * @see http://pear.php.net/package/HTML_QuickForm
 */

/**
 * HTML class for static data.
 */
require_once 'HTML/QuickForm/static.php';

/**
 * A pseudo-element used for adding raw HTML to form.
 *
 * Intended for use with the default renderer only, template-based
 * ones may (and probably will) completely ignore this
 *
 * @author Alexey Borzov <avb@php.net>
 *
 * @deprecated Please use the templates rather than add raw HTML via this element
 */
class HTML_QuickForm_html extends HTML_QuickForm_static
{
    /**
     * Class constructor.
     *
     * @param string $text raw HTML to add
     */
    public function __construct($text = null)
    {
        parent::__construct(null, null, $text);
        $this->_type = 'html';
    }

    /**
     * Accepts a renderer.
     *
     * @param HTML_QuickForm_Renderer $renderer renderer object (only works with Default renderer!)
     * @param bool $sc1 unused, for signature compatibility
     * @param bool $sc2 unused, for signature compatibility
     */
    public function accept($renderer, $sc1 = false, $sc2 = null)
    {
        $renderer->renderHtml($this);
    }

}
