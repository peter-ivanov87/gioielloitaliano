<?php
class Artera_Privacy_PageController extends Mage_Core_Controller_Front_Action{
	public function IndexAction() {
		$this->loadLayout();   
		$this->getLayout()->getBlock("head")->setTitle($this->__("Privacy Policy"));
		$breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
		$breadcrumbs->addCrumb("home", array(
			"label" => $this->__("Home Page"),
			"title" => $this->__("Home Page"),
			"link"  => Mage::getBaseUrl()
		));

		$breadcrumbs->addCrumb("privacy page", array(
			"label" => $this->__("Privacy Policy"),
			"title" => $this->__("Privacy Policy")
		));
		
		$this->renderLayout(); 
	}
}