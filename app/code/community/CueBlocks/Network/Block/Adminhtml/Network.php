<?php    
class CueBlocks_Network_Block_Adminhtml_Network extends Mage_Adminhtml_Block_Widget_Grid_Container
{ 
	public function __construct()
	{
		$this->_controller = 'adminhtml_network';
		$this->_blockGroup = 'network'; 
		$this->_headerText = Mage::helper('network')->__('Bookmark Manager');
		$this->_addButtonLabel = Mage::helper('network')->__('Add Social Bookmark Icon');
		parent::__construct();  
	} 
}
