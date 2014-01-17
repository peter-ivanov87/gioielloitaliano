<?php 
      class CueBlocks_Network_IndexController extends Mage_Core_Controller_Front_Action
      {
         public function indexAction() 
	{
		$this->loadLayout();
		$block = $this->getLayout()->createBlock('Mage_Core_Block_Template','sn.index',array('template' => 'network/index.phtml'));
		$this->getLayout()->getBlock('content')->append($block);
		$this->_initLayoutMessages('core/session');
		$this->renderLayout();

		
		if($this->_request->isPost()) 
		{
			echo"Posted";
		}
	}
	public function listAction() 
	{
		$this->loadLayout();	
		$block = $this->getLayout()->createBlock('Mage_Core_Block_Template','sn.list',array('template' => 'network/list.phtml'));
		$this->getLayout()->getBlock('content')->append($block);
		$this->_initLayoutMessages('core/session');
		$HelloworldObj = Mage::getModel('network/network');
		$collection = $HelloworldObj->getCollection();
		$arrData=array();
		foreach($collection as $item)
		{
		   //echo '<pre>'; print_r($item->getData());
		   $item->getData();
		}
		$arrData=$collection->getData();
		//Mage::getSingleton('helloworld/session')->addSuccess($arrData);
		//$this->_initLayoutMessages('helloworld/session');
		//echo '<pre>'; print_r($arrData);
		//$this->view->text = 'test';		
		//$this->data = $arrData;		
		$this->renderLayout();
	}

      }
