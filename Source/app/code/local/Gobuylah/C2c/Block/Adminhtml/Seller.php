<?php
class Gobuylah_C2c_Block_Adminhtml_Seller extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_seller';
    $this->_blockGroup = 'Seller';
    $this->_headerText = Mage::helper('c2c')->__('Seller Product');
    //$this->_addButtonLabel = Mage::helper('c2c')->__('Add Item');
    parent::__construct();
  }
}