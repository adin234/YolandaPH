<?php //-->
/*
 * This file is part a custom application package.
 * (c) 2009-2011 Christian Blanquera <cblanquera@gmail.com>
 */
 
/**
 * Defines the starting point of every application call.
 * Starts laying out how classes and methods are handled.
 *  
 * @package    Back
 * @author     Christian Blanquera <cblanquera@gmail.com>
 * @version    $Id: application.php 21 2010-01-06 01:19:17Z blanquera $
 */
class Front_Handler extends Eden_Class {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_registry = NULL;
	
	/* Private Properties
	-------------------------------*/
	/* Get
	-------------------------------*/
	public static function i() {
		return self::_getSingleton();
	}
	
	/* Magic
	-------------------------------*/
	public function __construct(Eden $app) {
		$this->_registry = $app->getRegistry();
		$app->listen('request', $this, 'sessionStart');
		$app->listen('notification', $this, 'notification');
	}
	
	/* Public Methods
	-------------------------------*/
	public function notification($event, $instance, $data) {
		//expected data
		/*
		$data = array(
			'recipient'	=> 'danmichaelmolina@gmail.com',
			'template'	=> 'test.phtml',
			'subject'	=> 'This is the DevCup Notification'
		);
		*/
		
		$path 	= $this->_registry->get('path', 'config').'/mail.php';
		$config = eden('file', $path)->getData();
		
		$smtp	= eden('mail')->smtp(
			$config['host'],
			$config['email'],
			$config['password'],
			$config['port'],
			($config['ssl']) ? true : false);
		
		//get the error variables
		$template = Eden_Template::i()
			->parsePhp(dirname(__FILE__).'/block/template/email/'.$data['template']);
		
		$smtp->setSubject($data['subject'])
			->setBody($template, true)
			->addTo($data['recipient'])
			->send();
			
		return $this;
	}
	
	public function sessionStart() {
		$session = $this->Eden_Session();		
		$this->_registry->set('session', 'data', $session);
		$this->_registry->set('session', 'id', $session->getId());
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
