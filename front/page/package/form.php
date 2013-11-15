<?php //-->
/*
 * This file is part a custom application package.
 * (c) 2009-2011 Christian Blanquera <cblanquera@gmail.com>
 */

/**
 * Default logic to output a page
 *
 * @author     Christian Blanquera <cblanquera@gmail.com>
 * @version    $Id: index.php 14 2010-01-13 03:39:03Z blanquera $
 */
class Front_Page_Package_Form extends Front_Page {
    /* Constants
    -------------------------------*/
    /* Public Properties
    -------------------------------*/
    /* Protected Properties
    -------------------------------*/
    protected $_title       = 'Donation Form';
    protected $_class       = 'donation-form';
    protected $_template    = '/package/form.phtml';
    protected $_session     = false;
    protected $_active      = 'donation-form';

    /* Private Properties
    -------------------------------*/
    /* Get
    -------------------------------*/
    /* Magic
    -------------------------------*/
    /* Public Methods
    -------------------------------*/
    public function render() {
        return $this->_renderPage();
    }

    /* Protected Methods
    -------------------------------*/
    /* Private Methods
    -------------------------------*/
}