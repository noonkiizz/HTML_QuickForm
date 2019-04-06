<?php

/**
 * An abstract base class for QuickForm renderers.
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
 * An abstract base class for QuickForm renderers.
 *
 * The class implements a Visitor design pattern
 *
 * @author Alexey Borzov <avb@php.net>
 *
 * @abstract
 */
abstract class HTML_QuickForm_Renderer
{
    /**
     * Called when visiting a form, before processing any form elements.
     *
     * @param HTML_QuickForm $form a form being visited
     * @abstract
     */
    public function startForm($form)
    {
    }


    /**
     * Called when visiting a form, after processing all form elements.
     *
     * @param HTML_QuickForm $form a form being visited
     * @abstract
     */
    public function finishForm($form)
    {
    }

    /**
     * Called when visiting a header element.
     *
     * @param HTML_QuickForm_header $header a header element being visited
     * @abstract
     */
    public function renderHeader($header)
    {
    }

    /**
     * Called when visiting an element.
     *
     * @param HTML_QuickForm_element $element form element being visited
     * @param bool $required Whether an element is required
     * @param string $error An error message associated with an element
     * @abstract
     */
    public function renderElement($element, $required, $error)
    {
    }

    /**
     * Called when visiting a hidden element.
     *
     * @param HTML_QuickForm_element $element a hidden element being visited
     * @abstract
     */
    public function renderHidden($element)
    {
    }

    /**
     * Called when visiting a raw HTML/text pseudo-element.
     *
     * Only implemented in Default renderer. Usage of 'html' elements is
     * discouraged, templates should be used instead.
     *
     * @param HTML_QuickForm_html $data a 'raw html' element being visited
     * @abstract
     */
    public function renderHtml($data)
    {
    }

    /**
     * Called when visiting a group, before processing any group elements.
     *
     * @param HTML_QuickForm_group $group A group being visited
     * @param bool $required Whether a group is required
     * @param string $error An error message associated with a group
     * @abstract
     */
    public function startGroup($group, $required, $error)
    {
    }

    /**
     * Called when visiting a group, after processing all group elements.
     *
     * @param HTML_QuickForm_group $group A group being visited
     * @abstract
     */
    public function finishGroup($group)
    {
    }

}
