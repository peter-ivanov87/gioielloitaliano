<?php
class CueBlocks_Network_Model_Network extends Mage_Core_Model_Abstract
{
	public function _construct()
	{
		parent::_construct();
		$this->_init('network/network');
	}
}
