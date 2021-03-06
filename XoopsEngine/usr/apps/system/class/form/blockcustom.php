<?php
/**
 * Custom block edit form
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Xoops Engine http://www.xoopsengine.org
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author          Taiwen Jiang <phppp@users.sourceforge.net>
 * @since           3.0
 * @category        Xoops_Module
 * @package         System
 * @version         $Id$
 */

class App_System_Form_BlockCustom extends App_System_Form_BlockEdit
{
    // Add elements
    protected function build()
    {
        $block = $this->getAttrib('block');
        $this->removeAttrib('block');

        // Block unique name
        $options = array(
            'label'         => 'Name',
            'value'         => $block['name'],
            'prefixPath'    => array(
                'validate'  => array(
                    'System_Validate'      => Xoops::path('app') . '/system/Validate',
                ),
            ),
            'validators'    => array(
                'duplicate'  => array(
                    'validator' => 'BlockNameDuplicate',
                ),
            ),
            'filters'       => array(
                'trim'      => array(
                    'filter'    => 'StringTrim',
                ),
            ),
            'Description'   => 'Be unique or empty',
        );
        $this->addElement('Text', 'name', $options);

        // Title and display
        $options = array(
            'label'             => 'Title',
            'elementsBelongTo'  => false,
        );
        $titleCompound = $this->createElement('Compound', 'title-compound', $options);

        // Title/Caption
        $options = array(
            'value'         => $block['title'],
            'required'      => true,
            'filters'       => array(
                'trim'      => array(
                    'filter'    => 'StringTrim',
                ),
            ),
        );
        $titleCompound->addElement('Text', 'title', $options);

        // To hide title?
        $options = array(
            'label'         => 'Hide',
            'value'         => $block['title_hidden'],
        );
        $titleCompound->addElement('Checkbox', 'title_hidden', $options);
        $this->addElement($titleCompound);

        // Link
        $options = array(
            'label'         => 'Link URL',
            'value'         => $block['link'],
            'filters'       => array(
                'trim'      => array(
                    'filter'    => 'StringTrim',
                ),
            ),
        );
        $this->addElement('Text', 'link', $options);

        // Display style
        $options = array(
            'label'         => 'Display style',
            'value'         => $block['style'],
        );
        //$element = new App_System_Form_Element_Blockstyle('style', $options);
        $this->addElement(array('system', 'Blockstyle'), 'style', $options);

        $options = array(
            'label'         => 'Cache expire',
            'value'         => $block['cache_expire'],
        );
        $this->addElement('CacheExpire', 'cache_expire', $options);

        $options = array(
            'label'         => 'Cache level',
            'value'         => $block['cache_level'],
        );
        $this->addElement('CacheLevel', 'cache_level', $options);

        $options = array(
            "label"         => "Content",
            'id'            => 'custom-content',
            "value"         => $block['content'],
            "required"      => true,
            "html"          => true,
        );
        $this->addElement('textarea', 'content', $options);

        $options = array(
            "label"         => "Content type",
            "value"         => $block['type'],
            "required"      => true,
            "multioptions"  => array(
                'H' => 'HTML',
                'T' => 'Text',
            ),
        );
        $this->addElement('select', 'type', $options);

        $this->addElement('Hidden', 'id', $block['id']);
        $this->addElement('Hidden', 'custom', 1);

        $options = array(
            'label'     => 'Submit',
            'required'  => false,
            'ignore'    => true,
        );
        $this->addElement('submit', 'save', $options);

        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'dl', 'class' => 'xoops-form')),
            array('Description', array('placement' => 'prepend')),
            'Form'
        ));

        return $this;
    }
}