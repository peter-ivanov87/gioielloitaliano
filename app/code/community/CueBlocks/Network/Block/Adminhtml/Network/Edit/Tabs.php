<?php 
      class CueBlocks_Network_Block_Adminhtml_Network_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs 
      { 
          public function __construct()
          {
              parent::__construct();

              $this->setId('network_tabs');

             $this->setDestElementId('edit_form');

              $this->setTitle(Mage::helper('network')->__('News Information'));

          }

          protected function _beforeToHtml()

          {
              $this->addTab('form_section', array(

                  'label'     => Mage::helper('network')->__('Social Bookmark'),

                  'title'     => Mage::helper('network')->__('Social Bookmark'),

                  'content'   => $this->getLayout()->createBlock('network/adminhtml_network_edit_tab_form')->toHtml(),

              ));

             

              return parent::_beforeToHtml();

          }

      }
