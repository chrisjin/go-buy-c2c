<?php

class Gobuylah_C2c_Block_Adminhtml_C2c_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('c2c_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('c2c')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('c2c')->__('Item Information'),
          'title'     => Mage::helper('c2c')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('c2c/adminhtml_c2c_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}