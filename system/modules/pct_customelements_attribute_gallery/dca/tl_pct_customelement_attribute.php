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

// load attribute language files
\PCT\CustomElements\Loader\AttributeLoader::loadLanguageFile('tl_pct_customelement_attribute','image');

// load datacontainer
\PCT\CustomElements\Helper\ControllerHelper::callstatic('loadDataContainer',array('tl_content'));


/**
 * Palettes
 */
$type = 'gallery';
$search = array('__FIELDDEFINITION__','__EVAL__','__BESETTINGS__');
$replace = array('options,sortBy,galleryTpl','eval_mandatory');
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes'][$type] = str_replace($search, $replace, $GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes']['default']);

/**
 * Fields
 */
#$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options']['label'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options'][$type];
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$type]['options'] = array
(
	'size',
	'imagemargin',
	'perRow',
	'fullsize',
	'perPage',
	'numberOfItems'
);
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$type]['reference'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options'][$type];

$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['sortBy'] = array
(
	'label'  		=> &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['sortBy'],
	'exclude'		=> true,
	'inputType'		=> 'select',
	'options'		=> array('custom', 'name_asc', 'name_desc', 'date_asc', 'date_desc', 'random'),
	'reference'		=> &$GLOBALS['TL_LANG']['tl_content'],
	'eval'			=> array('tl_class'=>'clr'),
	'sql'			=> "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['galleryTpl'] = $GLOBALS['TL_DCA']['tl_content']['fields']['galleryTpl'];