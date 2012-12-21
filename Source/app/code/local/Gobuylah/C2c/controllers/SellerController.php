<?php
class Gobuylah_C2c_SellerController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
    {		
		$this->loadLayout();     
		$this->renderLayout();
    }
	
	public function addproductAction()
    {
		
		$this->loadLayout();     
		$this->renderLayout();
    }
	
	function saveproductAction(){
		print_r($_FILES);exit;
		$post = $this->getRequest()->getPost();
		$file = $post['image'];
		$product = Mage::getModel('catalog/product')->load(183);
		$path = Mage::getBaseDir('media').DS.'catalog'.DS.'product'.DS;  //desitnation directory
        $fname = $_FILES['image']['name']; //file name
		
        $uploader = new Varien_File_Uploader('image'); //load class
        $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png')); //Allowed extension for file
        $uploader->setAllowCreateFolders(true); //for creating the directory if not exists
        $uploader->setAllowRenameFiles(false); //if true, uploaded file's name will be changed, if file with the same name already exists directory.
        $uploader->setFilesDispersion(false);
        $result = $uploader->save($path,$fname);
		print_r($result);exit;
		if ( $post ) {
            try {
                $postObject = new Varien_Object();
                $postObject->setData($post);

                $error = false;

                if (!Zend_Validate::is(trim($post['product_name']) , 'NotEmpty')) {
                    $error = true;
                }

                if (!Zend_Validate::is(trim($post['catalog']) , 'NotEmpty')) {
                    $error = true;
                }

                if (!Zend_Validate::is(trim($post['description']), 'NotEmpty')) {
                    $error = true;
                }

                if (!Zend_Validate::is(trim($post['price']), 'NotEmpty')) {
                    $error = true;
                }
				
                if (!Zend_Validate::is(trim($post['quantity']), 'NotEmpty')) {
                    $error = true;
                }
               
                if ($error) {
                    throw new Exception();
                }
				$c2cHelper = Mage::helper('c2c');
				$c2cHelper->saveProduct($post);
                Mage::getSingleton('customer/session')->addSuccess($this->__('Your product add success.'));
                $this->_redirect('*/*/addproduct/');

                return;
            } catch (Exception $e) {
                Mage::getSingleton('customer/session')->addError($this->__('Unable to submit your request. Please, try again later'));
                $this->_redirect('*/*/addproduct/');
                return;
            }

        } else {		
            $this->_redirect('*/*/addproduct/');
        }
		
	}
}