<?php
class Gobuylah_C2c_Block_Seller extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getSeller()     
     { 
        if (!$this->hasData('finder')) {
            $this->setData('finder', Mage::registry('finder'));
        }
        return $this->getData('finder');
        
    }
}