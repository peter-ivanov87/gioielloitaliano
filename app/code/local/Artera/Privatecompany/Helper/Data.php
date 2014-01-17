<?php
class Artera_Privatecompany_Helper_Data extends Mage_Core_Helper_Abstract {
	//visibility
	public function isFiscalcodeVisible() {
		return (bool)Mage::getStoreConfig('privatecompany/visibility/fiscalcode');
	}

	public function isCompanyVisible() {
		return (bool)Mage::getStoreConfig('privatecompany/visibility/company');
	}
	
	public function isCustomerAddressVisible() {
		return (bool)Mage::getStoreConfig('privatecompany/visibility/customer_address');	
	}
	
	//required
	public function isFiscalcodeRequired() {
		return (bool)Mage::getStoreConfig('privatecompany/required/fiscalcode');
	}
	
	public function isCompanyRequired() {
		return (bool)Mage::getStoreConfig('privatecompany/required/company');
	}
	
	public function isVatIdRequired() {
		return (bool)Mage::getStoreConfig('privatecompany/required/vat_id');
	}
}
	 