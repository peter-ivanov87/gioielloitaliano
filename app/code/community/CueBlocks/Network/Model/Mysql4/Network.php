<?php
class CueBlocks_Network_Model_Mysql4_Network extends Mage_Core_Model_Mysql4_Abstract
{
	public function _construct()
	{   
		$this->_init('network/network', 'tint_id');
	}
}
