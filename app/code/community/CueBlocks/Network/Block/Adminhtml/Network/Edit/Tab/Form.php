<?php
class CueBlocks_Network_Block_Adminhtml_Network_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{
		$form = new Varien_Data_Form();
		$this->setForm($form);
		$fieldset = $form->addFieldset('network_form', array('legend'=>Mage::helper('network')->__('Bookmark Information')));

		$fieldset->addField('vch_icon_name', 'text', array(
		'label'     => Mage::helper('network')->__('Title'),
		'required'  => false,
		'name'      => 'vch_icon_name',
		));


		$fieldset->addField('vch_url', 'text', array(
		'label'     => Mage::helper('network')->__('URL'),
		'required'  => false,
		'name'      => 'vch_url',
		));

		$fieldset->addField('vch_logo_image', 'file', array(
	          'label'     => Mage::helper('network')->__('Image File'),
        	  'required'  => false,
	          'name'      => 'vch_logo_image',
	  ));
		

		$fieldset->addField('mint_position','text', array(
		'label'     => Mage::helper('network')->__('Position'),
		
		'required'  => false,
		'name'      => 'mint_position',
		));

		$fieldset->addField('txt_cust_code','textarea',array(
		'label'    => Mage::helper('network')->__('Bookmark Code'),
		'name'     => 'txt_cust_code',
		
		
		));

	$fieldset->addField('sint_status', 'select', array(
          'label'     => Mage::helper('network')->__('Status'),
          'name'      => 'sint_status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('network')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('network')->__('Disabled'),
              ),
          ),
      ));


		$fieldset->addField('label1','label', array(
		'label' => '<b>NOTE : </b>&nbsp; if some value is present in Bookmark Code then URL & Image File will be ignored for this data.',
		'width' => '700px',
		));


		if ( Mage::getSingleton('adminhtml/session')->gethelloworldData() )
		{
			$form->setValues(Mage::getSingleton('adminhtml/session')->gethelloworldData());
			Mage::getSingleton('adminhtml/session')->sethelloworldData(null);
		} 
		elseif ( Mage::registry('network_data') ) 
		{
			$form->setValues(Mage::registry('network_data')->getData());
		}
		return parent::_prepareForm();
	}
}
