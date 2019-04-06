<?php

/**
 * HTML class for a textarea type field.
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
 * Base class for form elements.
 */
require_once 'HTML/QuickForm/element.php';

/**
 * HTML class for a textarea type field.
 *
 * @author Adam Daniel <adaniel1@eesus.jnj.com>
 * @author Bertrand Mansion <bmansion@mamasam.com>
 */
class HTML_QuickForm_textarea extends HTML_QuickForm_element
{
    /**
     * Field value.
     *
     * @var string
     */
    public $_value;

    /**
     * Class constructor.
     *
     * @param string $elementName Input field name attribute
     * @param mixed $elementLabel Label(s) for a field
     * @param mixed $attributes Either a typical HTML attribute string or an associative array
     */
    public function __construct($elementName = null, $elementLabel = null, $attributes = null)
    {
        parent::__construct($elementName, $elementLabel, $attributes);
        $this->_persistantFreeze = true;
        $this->_type = 'textarea';
    }

    /**
     * Sets the input field name.
     *
     * @param string $name Input field name attribute
     */
    public function setName($name)
    {
        $this->updateAttributes(array('name' => $name));
    }

    /**
     * Returns the element name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->getAttribute('name');
    }

    /**
     * Sets value for textarea element.
     *
     * @param string $value Value for textarea element
     */
    public function setValue($value)
    {
        $this->_value = $value;
    }

    /**
     * Returns the value of the form element.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * Sets wrap type for textarea element.
     *
     * @param string $wrap Wrap type
     */
    public function setWrap($wrap)
    {
        $this->updateAttributes(array('wrap' => $wrap));
    }

    /**
     * Sets height in rows for textarea element.
     *
     * @param string $rows Height expressed in rows
     */
    public function setRows($rows)
    {
        $this->updateAttributes(array('rows' => $rows));
    }

    /**
     * Sets width in cols for textarea element.
     *
     * @param string $cols Width expressed in cols
     */
    public function setCols($cols)
    {
        $this->updateAttributes(array('cols' => $cols));
    }

    /**
     * Returns the textarea element in HTML.
     *
     * @return string
     */
    public function toHtml()
    {
        if ($this->_flagFrozen) {
            return $this->getFrozenHtml();
        }

        return $this->_getTabs().
                   '<textarea'.$this->_getAttrString($this->_attributes).'>'.
                   // because we wrap the form later we don't want the text indented
                   preg_replace("/(\r\n|\n|\r)/", '&#010;', htmlspecialchars($this->_value)).
                   '</textarea>';
    }

    /**
     * Returns the value of field without HTML tags (in this case, value is changed to a mask).
     *
     * @return string
     */
    public function getFrozenHtml()
    {
        $value = htmlspecialchars($this->getValue());
        if ('off' == $this->getAttribute('wrap')) {
            $html = $this->_getTabs().'<pre>'.$value."</pre>\n";
        } else {
            $html = nl2br($value)."\n";
        }

        return $html.$this->_getPersistantData();
    }

}
