<?php     
class CueBlocks_Network_Block_Adminhtml_Network_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{ 
	public function __construct()
	{
		parent::__construct();
		$this->_objectId = 'id'; 
		$this->_blockGroup = 'network';
		$this->_controller = 'adminhtml_network'; 	
		$this->_updateButton('save', 'label', Mage::helper('network')->__('Save Item'));
		$this->_updateButton('delete', 'label', Mage::helper('network')->__('Delete Item'));
	}
	 
	public function getHeaderText() 
	{
		if(Mage::registry('network_data') && Mage::registry('network_data')->getId())
		{
			return Mage::helper('network')->__("Edit Bookmark '%s'", $this->htmlEscape(Mage::registry('network_data')->getVch_icon_name()));
		}
		else
		{ 
			return Mage::helper('network')->__('Add Social Bookmark Icon');
		}
		
	}
}
