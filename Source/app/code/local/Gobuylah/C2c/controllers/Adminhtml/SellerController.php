<?php

class Gobuylah_C2c_Adminhtml_SellerController extends Mage_Adminhtml_Controller_action
{

	protected function _initAction() {
		$this->loadLayout()
			->_setActiveMenu('c2c/items1')
			->_addBreadcrumb(Mage::helper('adminhtml')->__('Seller Product'), Mage::helper('adminhtml')->__('Seller Product'));
		
		return $this;
	}   
 
	public function indexAction() {
		$this->_initAction()
			->renderLayout();
	}
    public function exportCsvAction()
    {
        $fileName   = 'c2c.csv';
        $content    = $this->getLayout()->createBlock('c2c/adminhtml_seller_grid')
            ->getCsv();

        $this->_sendUploadResponse($fileName, $content);
    }

    public function exportXmlAction()
    {
        $fileName   = 'c2c.xml';
        $content    = $this->getLayout()->createBlock('c2c/adminhtml_seller_grid')
            ->getXml();

        $this->_sendUploadResponse($fileName, $content);
    }

}