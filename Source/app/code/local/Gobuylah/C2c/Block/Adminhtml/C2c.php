<?php
class Gobuylah_C2c_Block_Adminhtml_C2c extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_c2c';
    $this->_blockGroup = 'c2c';
    $this->_headerText = Mage::helper('c2c')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('c2c')->__('Add Item');
    parent::__construct();
  }
}