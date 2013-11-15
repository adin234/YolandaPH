<?php //-->
/*
 * This file is part of the Eden package.
 * (c) 2009-2011 Christian Blanquera <cblanquera@gmail.com>
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

/**
 * Admin Model
 *
 * @package    Eden
 * @author     Christian Blanquera <cblanquera@gmail.com>
 * @version    $Id: page.php 8 2010-01-09 07:04:02Z blanquera $
 */
class User extends Abstract_Directory {
	/* Constants
	-------------------------------*/
	const COLLECTION		= 'User_Collection';
	const SEARCH			= 'User_Search';
	const MODEL				= 'User_Model';

	const USER_TABLE		= 'user';
	const SCHEDULE_TABLE	= 'schedule';

	const USER_ID			= 'user_id';
	const USER_NAME			= 'user_name';
	const USER_EMAIL		= 'user_email';
	const USER_MOBILE		= 'user_mobile';
	const USER_PASSWORD		= 'user_password';
	const USER_CREATED		= 'user_created';
	const USER_UPDATED		= 'user_updated';

	const SCHEDULE_ID		= 'schedule_id';
	const SCHEDULE_USER		= 'schedule_user';
	const SCHEDULE_TITLE	= 'schedule_title';
	const SCHEDULE_START	= 'schedule_start';
	const SCHEDULE_END		= 'schedule_end';

	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_search		= self::SEARCH;
	protected $_collection	= self::COLLECTION;
	protected $_model		= self::MODEL;
	protected $_table		= self::USER_TABLE;
	protected $_primary		= self::USER_ID;

	/* Private Properties
	-------------------------------*/
	/* Get
	-------------------------------*/
	public static function i() {
		return self::_getSingleton(__CLASS__);
	}

	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}