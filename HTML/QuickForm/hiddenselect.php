<?php

/**
 * Hidden select pseudo-element.
 *
 * PHP versions 4 and 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @author Isaac Shepard <ishepard@bsiweb.com>
 * @copyright 2001-2011 The PHP Group
 * @license http://www.php.net/license/3_01.txt PHP License 3.01
 *
 * @see http://pear.php.net/package/HTML_QuickForm
 */

/**
 * Class for <select></select> elements.
 */
require_once 'HTML/QuickForm/select.php';

/**
 * Hidden select pseudo-element.
 *
 * This class takes the same arguments as a select element, but instead
 * of creating a select ring it creates hidden elements for all values
 * already selected with setDefault or setConstant.  This is useful if
 * you have a select ring that you don't want visible, but you need all
 * selected values to be passed.
 *
 * @author Isaac Shepard <ishepard@bsiweb.com>
 */
class HTML_QuickForm_hiddenselect extends HTML_QuickForm_select
{
    /**
     * Class constructor.
     *
     * @param string $elementName Select name attribute
     * @param mixed $elementLabel Label(s) for the select (not used)
     * @param mixed $options Data to be used to populate options
     * @param mixed $attributes Either a typical HTML attribute string or an associative array (not used)
     */
    public function __construct($elementName = null, $elementLabel = null, $options = null, $attributes = null)
    {
        parent::__construct($elementName, $elementLabel, $attributes);
        $this->_persistantFreeze = true;
        $this->_type = 'hiddenselect';
        if (isset($options)) {
            $this->load($options);
        }
    }

    /**
     * Returns the SELECT in HTML.
     *
     * @return string
     */
    public function toHtml()
    {
        if (empty($this->_values)) {
            return '';
        }

        $tabs = $this->_getTabs();
        $name = $this->getPrivateName();
        $strHtml = '';

        foreach ($this->_values as $key => $val) {
            for ($i = 0, $optCount = count($this->_options); $i < $optCount; ++$i) {
                if ($val == $this->_options[$i]['attr']['value']) {
                    $strHtml .= $tabs.'<input'.$this->_getAttrString(array(
                        'type' => 'hidden',
                        'name' => $name,
                        'value' => $val,
                    ))." />\n";
                }
            }
        }

        return $strHtml;
    }

    /**
     * This is essentially a hidden element and should be rendered as one.
     *
     * @param HTML_QuickForm_Renderer    renderer object
     * @param bool $sc1 unused, for signature compatibility
     * @param bool $sc2 unused, for signature compatibility
     */
    public function accept($renderer, $sc1 = false, $sc2 = null)
    {
        $renderer->renderHidden($this);
    }

}
