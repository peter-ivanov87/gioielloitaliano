<?php 
class CueBlocks_Network_Adminhtml_NetworkController extends Mage_Adminhtml_Controller_action
      {
          protected function _initAction()

          {
         $this->loadLayout()
	 ->_setActiveMenu('network/items')
	 ->_addBreadcrumb(Mage::helper('adminhtml')->__('Items Manager'), Mage::helper('adminhtml')->__('Item Manager'));
              return $this;
          }   

          public function indexAction() {

	      $this->_initAction();       
              // $this->_addContent($this->getLayout()->createBlock('Network/adminhtml_Network'));
              $this->renderLayout();
          }
          public function editAction()

          {
              $NetworkId     = $this->getRequest()->getParam('id');
  
              $NetworkModel  = Mage::getModel('network/network')->load($NetworkId);
  
              if ($NetworkModel->getId() || $NetworkId == 0) {
         
  
                  Mage::register('network_data', $NetworkModel);
         
  
                  $this->loadLayout();
  
                  $this->_setActiveMenu('network/items');
  
                 
  
                  $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
  
                  $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News')); 
                 
   
                  $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
   
              
                  $this->_addContent($this->getLayout()->createBlock('network/adminhtml_network_edit'))->_addLeft($this->getLayout()->createBlock('network/adminhtml_network_edit_tabs'));
                     
  
                  $this->renderLayout();
  
                  } else {
  
                  Mage::getSingleton('adminhtml/session')->addError(Mage::helper('network')->__('Item does not exist'));
  
                  $this->_redirect('*/*/');
  
              }
  
          }
  
         
  
          public function newAction()
  
          {
  
              $this->_forward('edit');
  
          }
  
         
  
          public function saveAction()
  
          {  
              if ( $this->getRequest()->getPost() ) {
  
                  try {
  
                      $postData = $this->getRequest()->getPost();
  
                      $NetworkModel = Mage::getModel('network/network');
  if(isset($_FILES['vch_logo_image']['name']) && $_FILES['vch_logo_image']['name'] != '') {
				try {	
					/* Starting upload */	
					$uploader = new Varien_File_Uploader('vch_logo_image');
					
					// Any extention would work
	           		$uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
					$uploader->setAllowRenameFiles(false);
					
					// Set the file upload mode 
					// false -> get the file directly in the specified folder
					// true -> get the file in the product like folders 
					//	(file.jpg will go in something like /media/f/i/file.jpg)
					$uploader->setFilesDispersion(false);
							
					// We set cb_social_icons (in skin directory) as the upload dir
					$base_path = Mage::getBaseDir() . DS ;
					$path  = $base_path."/skin/frontend/default/default/images/cb_social_icons";
					$uploader->save($path, $_FILES['vch_logo_image']['name'] );
					
				} catch (Exception $e) {
		      
		        }
	        
			}
	  			
if(isset($_FILES['vch_logo_image']['name']) && !empty($_FILES['vch_logo_image']['name']))
{
$NetworkModel->setId($this->getRequest()->getParam('id'))
	     ->setVch_icon_name($postData['vch_icon_name'])
	     ->setVch_url($postData['vch_url'])
	     ->setVch_logo_image($_FILES['vch_logo_image']['name'])
	     ->setSint_status($postData['sint_status'])
	     ->setMint_position($postData['mint_position'])
	     ->save();
}
else
{
$NetworkModel->setId($this->getRequest()->getParam('id'))
	     ->setVch_icon_name($postData['vch_icon_name'])
	     ->setVch_url($postData['vch_url'])
	     ->setSint_status($postData['sint_status'])
	     ->setMint_position($postData['mint_position'])
	     ->setTxt_cust_code($postData['txt_cust_code'])
	     ->save();
}
  
                   Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully saved'));
  
                   Mage::getSingleton('adminhtml/session')->setNetworkData(false);
  
                   $this->_redirect('*/*/');
  
                      return;


                  } catch (Exception $e) {
  
                        Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                        Mage::getSingleton('adminhtml/session')->setNetworkData($this->getRequest()->getPost());
  
                      $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
  
                      return;
                    }
  
              }
  
              $this->_redirect('*/*/');
  
          }
  
         
  
          public function deleteAction()
  
          {
  
              if( $this->getRequest()->getParam('id') > 0 ) {
  
                  try {
  
                      $NetworkModel = Mage::getModel('network/network');
                     
  
                      $NetworkModel->setId($this->getRequest()->getParam('id'))->delete();
  
            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
  
                      $this->_redirect('*/*/');
  
                  } catch (Exception $e) {
  
                      Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
  
                      $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
  
                  }
  
              }
  
              $this->_redirect('*/*/');
  
          }
  
          /**
  
           * Product grid for AJAX request.
 
           * Sort and filter result for example.
 
           */
 
          public function gridAction()
 
          {
              $this->loadLayout();
 
              $this->getResponse()->setBody(
 
                     $this->getLayout()->createBlock('importedit/adminhtml_network_grid')->toHtml()
 
              );
 
          }
 
      }
