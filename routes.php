<?php

require_once '../controllers/controller.php';

$controller=new Controller();

$action=isset($_GET['action'])?$_GET['action']:"";
$action2=isset($_POST['action'])?$_POST['action']:"";

switch($action){

case "addtocart":
$controller->addToCart();
break;


case "showcart":
$controller->showCart();
break;

case "emptycart":
$controller->emptyCart();
break;

case "continueshopping":
$controller->continueShopping();
break;

case "deletearticle":
$controller->deleteArticle();
break;

case "Refresh cart":
$controller->refreshCart();
break;

case "deletebrand":
$controller->deleteBrand();
break;

case "viewupdatepage":
$controller->viewUpdatePage();
break;

case "Update article":
$controller->updateArticle();
break;

case "logout":
$controller->logout();
break;


}

switch($action2){

case "Register":
$controller->register();
break;

case "Log in":
$controller->login();
break;

case "Confirm":
$controller->doOrder();
break;


case "Insert article":
$controller->insertArticle();
break;


}

















?>