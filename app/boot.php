<?php

require_once 'config.php';
require_once 'db.php';
require_once 'controllers/ListController.php';
require_once 'controllers/NavigationController.php';

$list = new ListController;
$page = new NavigationController;

echo $page->getView('header');
echo $list->getView();
echo $page->getView('footer');