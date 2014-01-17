<?php
class Artera_Privacy_Model_Condition {
	public function toOptionArray() {
		$return = array();
		$return[] = array(
			'value' => 0,
			'label'	=> Mage::helper('privacy')->__('Non attivo')
		);
		foreach($this->getAllConditions() as $condition) {
			$return[] = array(
				'value' => $condition['agreement_id'],
				'label'	=> $condition['name']
			);
		}
		return $return;
	}

	public function toArray() {
		$return[0] = Mage::helper('privacy')->__('Non attivo');
		foreach($this->getAllConditions() as $condition) {
			$return[$condition['agreement_id']] = $condition['name'];
		}
		return $return;
	}
	
	protected function getAllConditions() {
		return Mage::getModel('checkout/agreement')
			->getCollection()
			->addFieldToFilter('is_active', 1)
		;
	}
}