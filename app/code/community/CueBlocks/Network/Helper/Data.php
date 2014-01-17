<?php
class CueBlocks_Network_Helper_Data extends Mage_Core_Helper_Abstract
{   
public function CUE_socialIcons()
 {
$cb_social_icon_collection = Mage::getModel('network/network')->getCollection()->setOrder('mint_position', 'ASC');;
$skinUrl = Mage::getDesign()->getSkinUrl('images/');
foreach ($cb_social_icon_collection as $cbCollection):
$image=$cbCollection['vch_logo_image'];

$imgPath=$skinUrl.'cb_social_icons/'.$image;

$status=$cbCollection['sint_status'];

if(!empty($cbCollection['txt_cust_code']) && $status==1)
{
echo $cbCollection['txt_cust_code'];
}
else
{
if($status==1)
{
?>
<a href="<?php echo $cbCollection['vch_url'];?>" title="<?php echo $cbCollection['vch_icon_name'];?>" target="_blank"><img alt="<?php echo $cbCollection['vch_icon_name'];?>" src="<?php echo $imgPath;?>" width="24px" height="24px"></a> &nbsp;
<?php  
}
}
endforeach;

 }
}
