<?php

class Gobuylah_C2c_Block_Adminhtml_Seller_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('c2cGrid');
      $this->setDefaultSort('c2c_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('c2c/c2c')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('c2c_id', array(
          'header'    => Mage::helper('c2c')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'c2c_id',
      ));
		
	  $this->addColumn('name', array(
          'header'    => Mage::helper('c2c')->__('Name'),
          'align'     =>'left',
          'index'     => 'title',
      ));
      $this->addColumn('type', array(
          'header'    => Mage::helper('c2c')->__('Type'),
          'align'     =>'left',
          'index'     => 'type',
      ));
	  $this->addColumn('atrib. set Name', array(
          'header'    => Mage::helper('c2c')->__('Atrib. Set Name'),
          'align'     =>'left',
          'index'     => 'atrib. set Name',
      ));

	  /*
      $this->addColumn('content', array(
			'header'    => Mage::helper('c2c')->__('Item Content'),
			'width'     => '150px',
			'index'     => 'content',
      ));
	  */

      $this->addColumn('status', array(
          'header'    => Mage::helper('c2c')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('c2c')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('c2c')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('c2c')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('c2c')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('c2c_id');
        $this->getMassactionBlock()->setFormFieldName('c2c');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('c2c')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('c2c')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('c2c/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('c2c')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('c2c')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}