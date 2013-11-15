<?php //-->
/*
 * This file is part of the Eden package.
 * (c) 2009-2011 Christian Blanquera <cblanquera@gmail.com>
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

/**
 * The base class for any class that defines a view.
 * A view controls how templates are loaded as well as 
 * being the final point where data manipulation can occur.
 *
 * @package    Eden
 * @author     Christian Blanquera <cblanquera@gmail.com>
 * @version    $Id: page.php 8 2010-01-09 07:04:02Z blanquera $
 */
abstract class Front_Page extends Eden_Class {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_request = NULL;
	protected $_messages = array();
	protected $_meta = array();
	protected $_body = array();
	protected $_title = 'Eden';
	protected $_class = 'eden';
	protected $_template = NULL;
	protected $_session = false;
	protected $_active = NULL;
	
	/* Private Properties
	-------------------------------*/
	/* Get
	-------------------------------*/
	/* Magic
	-------------------------------*/
	public function __construct(Eden_Registry $request = NULL) {
		$this->_request = $request;
	}
	
	public function __toString() {
		try {
			$output = $this->render();
		} catch(Exception $e) {
			echo $e;
			exit;
			Eden_Error_Event:: i()->exceptionHandler($e);
			return '';
		}
		
		if(is_null($output)) {
			return '';
		}
		
		return $output;
	}
	
	/* Public Methods
	-------------------------------*/
	/**
	 * Returns a string rendered version of the output
	 *
	 * @return string
	 */
	abstract public function render();
	
	/* Protected Methods
	-------------------------------*/
	protected function _addMessage($message, $type = NULL, $flash = false) {
		if($flash) {
			$_SESSION['messages'][] = array('type' => $type, 'message' => $message);
			return $this;
		}
		
		$this->_messages[] = array('type' => $type, 'message' => $message);
		
		return $this;
	}
	
	protected function _renderPage() {
		$tpl = $this->_request['path']['template'];
		
		if(isset($_SESSION['messages']) && is_array($_SESSION['messages'])) {
			foreach($_SESSION['messages'] as $message) {
				$this->_addMessage($message['message'], $message['type']);
			}
			unset($_SESSION['messages']);
		}
		
		$head = array('active' => $this->_active);
		$foot = array();
		
		$this->_body['messages'] = $this->_messages;
		
		$head		 = front()->template($tpl.'/_head.php', $head);
		$body 		 = front()->template($tpl.$this->_template, $this->_body);
		$foot 		 = front()->template($tpl.'/_foot.php', $foot);
		
		return front()->template($tpl.'/_page.php', array(
			'meta' 			=> $this->_meta,
			'title'			=> $this->_title,
			'class'			=> $this->_class,
			'head'			=> $head,
			'body'			=> $body,
			'foot'			=> $foot));
	}
	
	/* Private Methods
	-------------------------------*/
}