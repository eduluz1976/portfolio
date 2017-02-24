<?php

//global $smarty;
//
//$smarty->assign('name','Eduardo');
//$smarty->display('home.tpl');

//die('ok... ' . \core\App::getInstance()->getParm('xpto',12));


$x = new FinantialApp();



$x->getSmarty()->assign('name','Eduardo');
$x->getSmarty()->display('home.tpl');
