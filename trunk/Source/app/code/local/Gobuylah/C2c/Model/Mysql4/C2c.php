<?php

class Gobuylah_C2c_Model_Mysql4_C2c extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the c2c_id refers to the key field in your database table.
        $this->_init('c2c/c2c', 'c2c_id');
    }
}