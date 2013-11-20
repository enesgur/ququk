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
$homeQuquk      = ABSPATH;
$ququkPlugin    = ABSPATH."wp-content/plugins/ququk/";
$ququkThemes    =  plugins_url()."/ququk/admin/tpl/";
//İnclude Class System
include("inc.php");
include("db.php");
$ququkDb    = new ququkDb();
$ququk      = new ququk();

if(is_admin()){
    $ququk->adminPageAction();
    $ququk->adminPageFunction();
    $ququk->adminPageSubmenuFunction();
    $ququk->adminSubmenuPage();
}
?>
