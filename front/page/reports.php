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
class Front_Page_Reports extends Front_Page {
    /* Constants
    -------------------------------*/
    /* Public Properties
    -------------------------------*/
    /* Protected Properties
    -------------------------------*/
    protected $_title       = 'Reports';
    protected $_class       = 'reports';
    protected $_template    = '/reports.phtml';
    protected $_session     = true;
    protected $_active      = 'reports';

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