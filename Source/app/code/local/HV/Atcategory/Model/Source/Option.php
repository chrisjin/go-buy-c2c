<?php
class HV_Atcategory_Model_Source_Option extends Mage_Eav_Model_Entity_Attribute_Source_Table
{
	public function getAllOptions()
    {
		$op = array(
			'0' => array(
				'label' => 'None',
				'value' => '0'
			),
			'1' => array(
				'label' => 'Left',
				'value' => '1',
			),
			'2' => array(
				'label' => 'Top',
				'value' => '2',
			)
		);
        if (is_null($this->_options)) {
            $this->_options = $op;
        }
        return $this->_options;
    }
}
?>