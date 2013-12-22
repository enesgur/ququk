<?php
/**
 * @package QuQuk
 * @version 1.0
 */
/*
Plugin Name: QuQuk
Plugin URI: http://wordpress.org/plugins/~
Description: ~
Author: Enes Gür
Version: 1.0
Author URI: http://enesgur.com.tr/
*/

//İnclude Class System
include("inc.php");
include("db.php");
include($ququkPlugin."functions.php"); //Imclude Functions File

$homeQuquk      = ABSPATH;
$ququkPlugin    = ABSPATH."wp-content/plugins/ququk/";
$ququkThemes    =  plugins_url()."/ququk/admin/tpl/";
$ququkAdmin     = plugins_url()."/ququk/admin/";
$ququkUrl       = plugins_url()."/ququk";
$ququkCatUrl    = admin_url(catUrl());

$ququkDb    = new ququkDb();
$ququk      = new ququk();

//Widget
$ququk->widget();
if(is_admin()){
    $ququk->adminPageAction();
    $ququk->adminPageFunction();
    $ququk->adminPageSubmenuFunction();
    $ququk->adminSubmenuPage();
}
?>
