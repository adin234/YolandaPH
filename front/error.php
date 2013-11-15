<?php //-->
/*
 * This file is part of the Eden package.
 * (c) 2009-2011 Christian Blanquera <cblanquera@gmail.com>
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

/**
 * Front application exception
 *
 * @author     Christian Blanquera <cblanquera@gmail.com>
 * @version    $Id: exception.php 9 2010-01-03 00:28:47Z blanquera $
 */
class Front_Error extends Eden_Error {
	/* Constants
	-------------------------------*/
	const BLOCK_NOT_EXIST = 'Block %s does not exist.';
	
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	/* Private Properties
	-------------------------------*/
	/* Get
	-------------------------------*/
	public static function i($message = NULL, $code = 0) {
		$class = __CLASS__;
		return new $class($message, $code);
	}
	
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/	
	public function initError($e, $event, $type, $level, $class, $file, $line, $message, $trace, $offset) {
		$history = array();
		for(; isset($trace[$offset]); $offset++) {
			$row = $trace[$offset];
			 
			//lets formulate the method
			$method = $row['function'].'()';
			if(isset($row['class'])) {
				$method = $row['class'].'->'.$method;
			}
			 
			$rowLine = isset($row['line']) ? $row['line'] : 'N/A';
			$rowFile = isset($row['file']) ? $row['file'] : 'Virtual Call';
			 
			//add to history
			$history[] = array($method, $rowFile, $rowLine);
		}
		
		//get the error variables
		$error = Eden_Template::i()
			->set('history', $history)
			->set('type', $type)
			->set('level', $level)
			->set('class', $class)
			->set('file', $file)
			->set('line', $line)
			->set('message', $message)
			->set('url', $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		
		
		//die($template);
		
		//get the template
		$mail = $error->set('mail', true)->parsePhp(dirname(__FILE__).'/template/error.php');
		
		
		if($_SERVER['HTTP_HOST'] == 'dev.kosmos.ph' 
		|| $_SERVER['HTTP_HOST'] == 'kosmos.project.dev') {
			//echo $mail;
			//exit;
		}
		
		//set information for smtp
		//ready for email
		$registry	= front()->getRegistry();
		$path		= $registry->get('path', 'root').'/../../config/email.php';
		$email		= eden('file', realpath($path))->getData();
		
		eden('mail')
			->smtp('smtp.gmail.com', $email['email'], $email['pass'], 465, true)
			->setSubject('Expresso Error Notification')
			->setBody($mail, true)
			->addTo('cgalgo@openovate.com')
			->send();
		
		
		$template = $error->set('mail', true)->parsePhp(dirname(__FILE__).'/template/_error.php');
	}
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
