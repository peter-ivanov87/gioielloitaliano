<?php

$installer = $this;
$installer->startSetup();
$installer->run("
CREATE TABLE IF NOT EXISTS `cb_social_network` (
  `tint_id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `vch_logo_image` varchar(200) NOT NULL,
  `vch_icon_name` varchar(255) NOT NULL,
  `vch_url` varchar(255) NOT NULL,
  `vch_alt` varchar(255) NOT NULL,
  `txt_cust_code` text NOT NULL,
  `mint_position` mediumint(3) NOT NULL,
  `sint_status` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`tint_id`),
  KEY `vch_icon_name` (`vch_icon_name`),
  KEY `mint_position` (`mint_position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `cb_social_network` (`tint_id`, `vch_logo_image`, `vch_icon_name`, `vch_url`, `vch_alt`, `txt_cust_code`, `mint_position`, `sint_status`) VALUES
(1, 'Facebook-icon.png', 'Facebook', 'http://www.facebook.com/', '', '', 1, 1),
(2, 'Twitter-icon.png', 'Twitter', 'http://www.twitter.com/', '', '', 2, 1),
(3, 'MySpace-icon.png', 'MySpace', 'http://www.myspace.com', '', '', 3, 1),
(4, 'Flickr-icon.png', 'Flickr', 'http://www.flickr.com', '', '', 4, 1);   
");
$installer->endSetup();

