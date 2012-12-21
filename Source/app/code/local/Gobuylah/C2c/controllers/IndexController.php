<?php
class Gobuylah_C2c_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/c2c?id=15 
    	 *  or
    	 * http://site.com/c2c/id/15 	
    	 */
    	/* 
		$c2c_id = $this->getRequest()->getParam('id');

  		if($c2c_id != null && $c2c_id != '')	{
			$c2c = Mage::getModel('c2c/c2c')->load($c2c_id)->getData();
		} else {
			$c2c = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($c2c == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$c2cTable = $resource->getTableName('c2c');
			
			$select = $read->select()
			   ->from($c2cTable,array('c2c_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$c2c = $read->fetchRow($select);
		}
		Mage::register('c2c', $c2c);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}