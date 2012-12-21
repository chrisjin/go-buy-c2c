<?php

$installer = $this;

$installer->startSetup();
		$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
		$entityTypeId     = $installer->getEntityTypeId('catalog_category');
		$attributeSetId   = $installer->getDefaultAttributeSetId($entityTypeId);
		$attributeGroupId = $installer->getDefaultAttributeGroupId($entityTypeId, $attributeSetId);
		//create attribute category
		$installer->addAttribute('catalog_category', 'cat_create_by',  array(
			'type'     => 'int',
			'label'    => 'Category Seller',
			'input'    => 'text',
			'global'   => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
			'visible'           => true,
			'required'          => false,
			'user_defined'      => true,
			'default'           => 0
		));
		$installer->addAttributeToGroup(
			$entityTypeId,
			$attributeSetId,
			$attributeGroupId,
			'cat_create_by',
			'11'                    //last Magento's attribute position in General tab is 10
		);
		//create attribute product
		$setup->addAttribute('catalog_product', 'create_by', array(

			'group'         				=> 'General',
			'input'         				=> 'text',
			'type'          				=> 'text',
			'class'             			=> 'validate-number',
			'label'         				=> 'Create By',
			'backend'       				=> '',
			'frontend'						=> '',
			'visible'       				=> false,
			'required'      				=> false,
			'user_defined' 					=> false,
			'searchable' 					=> false,
			'filterable' 					=> false,
			'comparable'    				=> false,
			'visible_on_front' 				=> false,
			'visible_in_advanced_search'  	=> false,
			'is_html_allowed_on_front' 		=> false,
			'apply_to'          			=> '0',
			'global'        				=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
			'note'							=> 'Do Not Edit!'
		));
$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('c2c_product_finder')};
CREATE TABLE {$this->getTable('c2c_product_finder')} (
  `id` int(11) unsigned NOT NULL auto_increment,
  `catalog_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL default '',
  `description` text NOT NULL default '',
  `images` varchar(255) NOT NULL,
  `price` smallint(6) NOT NULL default '0',
  `quantity` datetime NULL,
  `delivery_address` text NOT NULL default '',
  `status` smallint(6) NOT NULL default '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS {$this->getTable('c2c_customer_slots')};
CREATE TABLE {$this->getTable('c2c_customer_slots')} (
  `id` int(11) unsigned NOT NULL auto_increment,
  `customer_id` int(11) NOT NULL ,
  `slots_qty` int(11) NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ");

$installer->endSetup(); 