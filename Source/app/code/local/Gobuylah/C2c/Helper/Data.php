<?php

class Gobuylah_C2c_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function saveProduct($data){
		$product = Mage::getModel('catalog/product');
		$attrSetName = 'Default';
		$attributeSetId = Mage::getModel('eav/entity_attribute_set')
									->load($attrSetName, 'attribute_set_name')
									->getAttributeSetId(); 
		$name = $data['product_name'];
		$catalog = $data['catalog'];
		$description = $data['description'];
		$price = $data['price'];
		$quantity = $data['quantity'];
		$image = $data['image'];
		$customerId = Mage::getSingleton('customer/session')->getCustomerId();
		// Build the product
		$product->setAttributeSetId(9);// #4 is for default
		$product->setTypeId('simple');

		$product->setName($name);
		$product->setDescription($description);
		$product->setShortDescription($description);
		$product->setSku(time());
		$product->setWeight(0);
		$product->setStatus(1);
		$product->setVisibility(Mage_Catalog_Model_Product_Visibility::VISIBILITY_BOTH);//4

		$product->setPrice($price);// # Set some price
		$product->setCreate_by($customerId);// # Set some price
		$product->setTaxClassId(0);// # default tax class

		$product->setStockData(array(
		'is_in_stock' => $quantity,
		'qty' => $quantity
		));

		$product->setCategoryIds(array($catalog));// # some cat id's,

		$product->setWebsiteIDs(array(1));// # Website id, 1 is default

		//Default Magento attribute

		$product->setCreatedAt(strtotime('now'));
		$product->save();
	}
	
	public function checkCategoryCreateBy($allchild){
		$check = false;
		foreach ($allchild as $childCategory){
			$chifull = Mage::getModel('catalog/category')->load($childCategory->getId());
			if($chifull->getCat_create_by() == 1){
				$check = true;
			}
		}
		return $check;
	}
}