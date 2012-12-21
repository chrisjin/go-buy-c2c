<?php

class Gobuylah_C2c_Block_Adminhtml_C2c_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('c2c_form', array('legend'=>Mage::helper('c2c')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('c2c')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('c2c')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('c2c')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('c2c')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('c2c')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('c2c')->__('Content'),
          'title'     => Mage::helper('c2c')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getC2cData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getC2cData());
          Mage::getSingleton('adminhtml/session')->setC2cData(null);
      } elseif ( Mage::registry('c2c_data') ) {
          $form->setValues(Mage::registry('c2c_data')->getData());
      }
      return parent::_prepareForm();
  }
}