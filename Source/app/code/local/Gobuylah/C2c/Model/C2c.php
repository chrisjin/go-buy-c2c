<?php

class Gobuylah_C2c_Model_C2c extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('c2c/c2c');
    }
}