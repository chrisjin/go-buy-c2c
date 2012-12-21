<?php

class Gobuylah_C2c_Model_Mysql4_C2c_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('c2c/c2c');
    }
}