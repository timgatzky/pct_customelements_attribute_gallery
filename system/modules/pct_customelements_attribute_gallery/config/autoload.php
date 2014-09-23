<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	AttributeGallery
 * @link		http://contao.org
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'PCT\CustomElements',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'PCT\CustomElements\Attributes\AttributeGallery'					=> 'system/modules/pct_customelements_attribute_gallery/PCT/CustomElements/Attributes/AttributeGallery/AttributeGallery.php',	
));