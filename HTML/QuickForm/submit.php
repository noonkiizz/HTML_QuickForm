<?php

/**
 * HTML class for a submit type element.
 *
 * PHP versions 4 and 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @author Adam Daniel <adaniel1@eesus.jnj.com>
 * @author Bertrand Mansion <bmansion@mamasam.com>
 * @copyright 2001-2011 The PHP Group
 * @license http://www.php.net/license/3_01.txt PHP License 3.01
 *
 * @see http://pear.php.net/package/HTML_QuickForm
 */

/**
 * Base class for <input /> form elements.
 */
require_once 'HTML/QuickForm/input.php';

/**
 * HTML class for a submit type element.
 *
 * @author Adam Daniel <adaniel1@eesus.jnj.com>
 * @author Bertrand Mansion <bmansion@mamasam.com>
 */
class HTML_QuickForm_submit extends HTML_QuickForm_input
{
    /**
     * Class constructor.
     *
     * @param string $elementName Input field name attribute
     * @param string $value Input field value
     * @param mixed $attributes Either a typical HTML attribute string or an associative array
     */
    public function __construct($elementName = null, $value = null, $attributes = null)
    {
        parent::__construct($elementName, null, $attributes);
        $this->setValue($value);
        $this->setType('submit');
    }

    /**
     * Freeze the element so that only its value is returned.
     */
    public function freeze()
    {
        return false;
    }

    /**
     * Only return the value if it is found within $submitValues (i.e. if
     * this particular submit button was clicked).
     *
     * @param mixed $submitValues
     * @param mixed $assoc
     */
    public function exportValue($submitValues, $assoc = false)
    {
        return $this->_prepareValue($this->_findValue($submitValues), $assoc);
    }

}
