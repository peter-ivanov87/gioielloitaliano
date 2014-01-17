<?php
class Artera_Privatecompany_Model_Sales_Quote_Address extends Mage_Sales_Model_Quote_Address {
	public function validate() {
		$errors = parent::validate();
		if (!is_array($errors))
			$errors = array();

		$helper = Mage::helper('privatecompany');
		
		if (Mage::helper('customer/address')->isVatAttributeVisible() && $helper->isVatIdRequired() && !Zend_Validate::is($this->getVatId(), 'NotEmpty')) {
			$errors[] = Mage::helper('privatecompany')->__('Please enter VAT id.');
		}
		
		if ($helper->isFiscalcodeVisible() && $helper->isFiscalcodeRequired() && !Zend_Validate::is($this->getPrivatecompanyFiscalcode(), 'NotEmpty')) {
			$errors[] = $helper->__('Please enter Fiscal Code.');
		}
		
		if ($helper->isCompanyVisible() && $helper->isCompanyRequired() && !Zend_Validate::is($this->getCompany(), 'NotEmpty')) {
			$errors[] = $helper->__('Please enter company.');
		}
		
		//Pulizia campi se disabilitati
		if (!Mage::helper('customer/address')->isVatAttributeVisible())
			$this->setVatId("");
		
		if (!$helper->isFiscalcodeVisible())
			$this->setPrivatecompanyFiscalcode("");
			
		
		if (!$helper->isCompanyVisible())
			$this->setCompany("");
		
		if (empty($errors) || $this->getShouldIgnoreValidation()) {
			return true;
		}
		
		return $errors;
	}	
}