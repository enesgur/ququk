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
$ququkAdmin     = plugins_url()."/ququk/admin/";
$ququkUrl       = plugins_url()."/ququk";
$ququkCatUrl    = admin_url('admin.php?page=ququk-cat');

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
