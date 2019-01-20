<?php

use core\router;

router::add('^product/(?P<alias>[a-z0-9-]+)/?$', ['controller' => 'Product', 'action' => 'view']);
router::add('^category/(?P<alias>[a-z0-9-_]+)/?$', ['controller' => 'Category', 'action' => 'view']);

//default routes
router::add('^admin$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);
router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

router::add('^$', ['controller' => 'Main', 'action' => 'index']);
router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
