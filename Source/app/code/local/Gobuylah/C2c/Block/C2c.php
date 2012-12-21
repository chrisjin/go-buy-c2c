<?php
class Gobuylah_C2c_Block_C2c extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getC2c()     
     { 
        if (!$this->hasData('c2c')) {
            $this->setData('c2c', Mage::registry('c2c'));
        }
        return $this->getData('c2c');
        
    }
}