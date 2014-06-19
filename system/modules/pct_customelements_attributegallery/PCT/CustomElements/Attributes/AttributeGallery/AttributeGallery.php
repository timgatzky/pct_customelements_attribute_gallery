<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @attribute	AttributeGallery
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;

/**
 * Imports
 */
use PCT\CustomElements\Core\Attribute as Attribute;
use PCT\CustomElements\Helper\ControllerHelper as ControllerHelper;

/**
 * Class file
 * AttributeGallery
 */
class AttributeGallery extends Attribute
{
	/**
	 * Data Array
	 * @var array
	 */
	protected $arrData = array();
	
	/**
	 * Create new instance
	 * @param array
	 */ 
	public function __construct($arrData=array())
	{
		if(count($arrData) > 0)
		{
			foreach($arrData as $strKey => $varValue)
			{
				$this->arrData[$strKey] = deserialize($varValue);
			}
		}
	}	

	
	/**
	 * Return the field definition
	 * @return array
	 */
	public function getFieldDefinition()
	{
		$arrReturn = array
		(
			'label'			=> array( $this->get('title'),$this->get('description') ),
			'exclude'		=> true,
			'inputType'		=> 'text',
			'eval'			=> array_unique(array_merge($this->getEval(),array())),
			'sql'			=> "blob NULL",
		);
		
		$options = $this->get('options');
		if(empty($options))
		{
			return $arrReturn;
		}
		
		
		return $arrReturn;
	}
	
	
	/**
	 * Parse widget callback, render the attribute in the backend
	 * @param object
	 * @return string
	 */
	public function parseWidgetCallback($objWidget)
	{
		// validate the input
		$objWidget->validate();
		
		if($objWidget->hasErrors())
		{
			$objWidget->class = 'error';
		}
		
		$strBuffer = $objWidget->parse();
		
		
		
		return $strBuffer;
	}

	/**
	 * Rewrite date format and return html in the frontend
	 * @param string
	 * @param string		Unix timestamp
	 * @param array
	 * @param string
	 * @param object
	 * @param object
	 * @return string
	 * called renderCallback method
	 */
	public function renderCallback($strField,$varValue,$arrFieldDef,$strBuffer,$objTemplate,$objAttribute)
	{
		if(!$objAttribute->get('date_format'))
		{
			return $strBuffer;
		}
		
		$objTemplate->value = \System::parseDate($objAttribute->get('date_format'),$varValue);
		
		return $objTemplate->parse();
	}
	
	/**
	 * Convert value to unix timestamp before saving to the Vault
	 * @param object
	 * @param array
	 * @return array
	 * called from: storeValue Hook
	 */
	public function storeValueCallback($objAttribute,$arrSet)
	{
		if($objAttribute->get('type') != 'timestamp')
		{
			return $arrSet;
		}
		
		$rgxp = $objAttribute->get('date_rgxp');
		$format = $GLOBALS['TL_CONFIG'][$rgxp.'Format'];
		
		// convert date string to unix timestamp
		$objDate = new \Date($arrSet['data'],$format);
		$arrSet['data'] = $objDate->__get('tstamp');
		
		return $arrSet;
	}
}