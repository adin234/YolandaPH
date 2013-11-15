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
class User_Model extends Abstract_Model {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_primary = User::USER_ID;
	protected $_table	= User::USER_TABLE;

	/* Private Properties
	-------------------------------*/
	/* Get
	-------------------------------*/
	public static function i() {
		return self::_getMultiple(__CLASS__);
	}

	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	/**
	 * Authentication
	 *
	 * @param string
	 * @return boolean
	 */
	public function authenticate($password) {
		//arguement q must be a string
		Admin_Error:: i()->argument(1, 'string');

		if(!$this[Admin::ADMIN_ID]) {
			return false;
		}

		if($this[Admin::ADMIN_PASSWORD] != md5($password)) {
			return false;
		}

		if($this[Admin::ADMIN_ACTIVE] != 1) {
			return false;
		}

		return true;
	}
	
	public function setTable($table) {
		$this->_table = $table;
		return $this;
	}
	
	/* Private Methods
	-------------------------------*/
}

