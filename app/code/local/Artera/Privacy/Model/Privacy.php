<?php
class Artera_Privacy_Model_Privacy extends Mage_Core_Model_Abstract {
	public function getPrivacyCondition() {
		return Mage::getModel('checkout/agreement')
			->getCollection()
			->addFieldToFilter('is_active', 1)
			->addFieldToFilter('agreement_id', Mage::getStoreConfig('privacy/condition/agreement_id'))
			->getFirstItem()
		;
	}
}