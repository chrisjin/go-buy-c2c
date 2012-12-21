<?php

class Gobuylah_C2c_Block_Adminhtml_C2c_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'c2c';
        $this->_controller = 'adminhtml_c2c';
        
        $this->_updateButton('save', 'label', Mage::helper('c2c')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('c2c')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('c2c_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'c2c_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'c2c_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('c2c_data') && Mage::registry('c2c_data')->getId() ) {
            return Mage::helper('c2c')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('c2c_data')->getTitle()));
        } else {
            return Mage::helper('c2c')->__('Add Item');
        }
    }
}