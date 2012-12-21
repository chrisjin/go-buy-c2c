<?php

class Gobuylah_C2c_Model_Product_Observer
{
	
    public function saveCreateByCategories($observer)
    {		
		$product = $observer->getProduct();
		$arrCat = $product->getCategoryIds();
		//print_r($product->getCategoryIds());exit;
		foreach($arrCat as $catId){
			$category = Mage::getModel('catalog/category')->load($catId);
			$category->setCat_create_by(1);
			$category->save();
		}
		/*$_product = Mage::getModel('catalog/product')->load($product->getId());
		$_product->setName($product->getId());
		if($_SESSION['check_save']){
			$_product->save();
			$_SESSION['check_save'] = false;
		}*/
	}
	public function prepareSave($observer){
		
	}
}
