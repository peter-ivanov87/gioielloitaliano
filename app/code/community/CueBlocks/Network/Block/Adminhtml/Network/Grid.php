<?php   
class CueBlocks_Network_Block_Adminhtml_Network_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	public function __construct()
	{
		parent::__construct();
		$this->setId('networkGrid'); 
		// This is the primary key of the database
		$this->setDefaultSort('mint_position');
		$this->setDefaultDir('ASC');
		$this->setSaveParametersInSession(true);
	}
	protected function _prepareCollection()
	{
		$collection = Mage::getModel('network/network')->getCollection();
		$this->setCollection($collection); 
		return parent::_prepareCollection();
	}
	protected function _prepareColumns()
	{
		$this->addColumn('tint_id', array(
		'header' => Mage::helper('network')->__('ID'),
		'align'	 => 'left',
		'width'	 => '10px',
		'index'	 => 'tint_id',
		)); 
		
		$this->addColumn('vch_icon_name',array(
		'header' => Mage::helper('network')->__('Name'),
		'align'  => 'left',
		'index'	 => 'vch_icon_name',
		'width'  => '100px',		
		));

		$this->addColumn('vch_url',array(
		'header' => Mage::helper('network')->__('URL'),
		'align'  => 'left',
		'index'	 => 'vch_url',		
		'width'	 => '200px',
		));  
		
		$this->addColumn('mint_position',array(
		'header' => Mage::helper('network')->__('Position'),
		'align'  => 'left',
		'index'	 => 'mint_position',		
		'width'	 => '200px',
		));  


		return parent::_prepareColumns();
	} 
	
	public function getRowUrl($row)
	{
	return $this->getUrl('*/*/edit',array('id' => $row->getId())); 
	}
}
