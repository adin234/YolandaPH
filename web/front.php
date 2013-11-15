<?php //-->
/*
 * This file is part of the Eden package.
 * (c) 2009-2011 Christian Blanquera <cblanquera@gmail.com>
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */
require dirname(__FILE__).'/../front.php';

/* Get Application
-------------------------------*/
print front()

/* Set Debug
-------------------------------*/
//->setDebug(0, false)
->setDebug(0, false)

/* Set Autoload
-------------------------------*/
->setLoader(NULL, '/model')

/* Set Paths
-------------------------------*/
->setPaths()

->routeClasses(true)

->routeMethods(true)

/* Start Filters
-------------------------------*/
->setFilters(array('Front_Handler'))

/* Trigger Init Event
-------------------------------*/
->trigger('init')

/* Set Timezone
-------------------------------*/
->setTimezone('Asia/Manila')

/* Set Database
-------------------------------*/
//->addDatabase(include(dirname(__FILE__).'/../../config/database.php'))

/* Trigger Init Event
-------------------------------*/
->trigger('config')

/* Start Session
-------------------------------*/
->startSession()

/* Trigger Session Event
-------------------------------*/
->trigger('session')

/* Set Request
-------------------------------*/
->setRequest()

/* Trigger Request Event
-------------------------------*/
->trigger('request')

/* Set Response
-------------------------------*/
->setResponse('Front_Page_Index')

/* Trigger Response Event
-------------------------------*/
->trigger('response')

/* Get the Response
-------------------------------*/
->getResponse();
