<?php //-->
/*
 * This file is part of the Eden package.
 * (c) 2009-2011 Christian Blanquera <cblanquera@gmail.com>
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

/**
 *
 * @package    Eden
 * @category   registry
 * @author     Christian Blanquera <cblanquera@gmail.com>
 * @version    $Id: registry.php 1 2010-01-02 23:06:36Z blanquera $
 */
class Abstract_Model extends Eden_Sql_Model {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_primary = NULL;
	
	/* Private Properties
	-------------------------------*/
	/* Get
	-------------------------------*/
	public static function i() {
		return self::_getMultiple(__CLASS__);
	}
	
	/* Magic
	-------------------------------*/
	public function __construct() {
		$this->_database = Eden::i()->getActiveApp()->getDatabase();
	}
	
	/* Public Methods
	-------------------------------*/
	/**
	 * Return model
	 *
	 * @param scalar|null
	 * @param string
	 * @return Eden_Mysql_Model
	 */
	public function load($value, $column = NULL) {
		//argument testing
		Abstract_Error::i()
			->argument(1, 'scalar', 'array')	//argument 1 must be a scalar or array
			->argument(2, 'string', 'null');	//argument 1 must be a string or null
		
		if(is_array($value)) {
			return $this->set($value);
		}
		
		if(is_null($column)) {
			$column = $this->_primary;
		}
		
		$row = $this->_database->getRow($this->_table, $column, $value);
		
		if(is_null($row)) {
			return $this;
		}
		
		return $this->set($row);
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}

