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
 * Register attribute
 */
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['gallery'] = array
(
	'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['gallery'],
	'path' 		=> 'system/modules/pct_customelements_attribute_gallery',
	'class'		=> 'PCT\CustomElements\Attributes\Gallery',
	'icon'		=> 'fa fa-image',
	'backendWildcardSize' => array('50','50','center center'),
);

/**
 * Hooks
 */
$GLOBALS['CUSTOMELEMENTS_HOOKS']['processWildcardValue'][] = array('PCT\CustomElements\Attributes\Gallery','processWildcardValue');
