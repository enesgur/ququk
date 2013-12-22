<?php
/**
 * Created by PhpStorm.
 * User: enes
 * Date: 11/16/13
 * Time: 4:56 PM
 */
class ququk {
    public $wpdb;

    public function __construct(){
        global $wpdb;
        $this->wpdb = $wpdb;
        if($_GET['activate'] == true){
            $result = $wpdb->get_col("SHOW TABLES LIKE '%ququk%'");
            self::controlDatabase($result);
        }
    }

    private function controlDatabase($result){
        $controlTable = array("ququkCategory","ququkContent");
        $countTable = count($controlTable);
        if(count(array_intersect($controlTable,$result)) == $countTable)
            true;
        else
            self::createTable();
    }

    private function createTable(){
        global $homeQuquk, $wpdb;
        require_once( $homeQuquk . 'wp-admin/includes/upgrade.php' );
        $ququkTable[] = "CREATE TABLE IF NOT EXISTS ququkCategory (
  Id int(11) NOT NULL AUTO_INCREMENT,
  Slug varchar(255) CHARACTER SET utf8 NOT NULL,
  title varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (Id),UNIQUE KEY Slug (Slug)) ENGINE=InnoDB  DEFAULT CHARSET=utf8";
        $ququkTable[] = "CREATE TABLE IF NOT EXISTS ququkContent(
  Id int(11) NOT NULL AUTO_INCREMENT,
  Body text NOT NULL,
  CatId int(11) NOT NULL,
  PRIMARY KEY (Id)) ENGINE=InnoDB  DEFAULT CHARSET=utf8";

        $ququkInsert[] = array("INSERT INTO ququkCategory (Id, Slug, title) VALUES (%d, %s, %s)",array(1,'default','The default category'));
        $ququkInsert[] = array("INSERT INTO ququkContent (Id, Body, CatId) VALUES (%d, %s, %d)",array(1, 'Example QuQuk..\nPlugin Web Site: <a href="http://enesgur.com.tr">Enes Gür</a>', 1));
        foreach($ququkTable as $row){
            dbDelta($row);
        }
        /*
         *Insert Prepare Statement..
         *Example: http://codex.wordpress.org/Class_Reference/wpdb#INSERT_rows
         *$metakey = "Harriet's Adages";
         *$metavalue = "WordPress' database interface is like Sunday Morning: Easy.";
         *$wpdb->query( $wpdb->prepare("INSERT INTO $wpdb->postmeta( post_id, meta_key, meta_value )VALUES ( %d, %s, %s )", array(10, $metakey,$metavalue)) );
         */

        foreach($ququkInsert as $row){
            $wpdb->query($wpdb->prepare(
                $row[0],
                $row[1]
            ));
        }
    }

    public function adminPageAction(){
            /*
             * Add Admin Menu
             */
            add_action( 'admin_menu', 'ququkAdminPage' );
            /*
             * Add Admin Submenu
             */
            add_action('admin_menu', 'ququkAdminSubMenu');
    }

    public function  adminPageFunction(){
        function ququkAdminPage(){
            /*
             * Add Admin Page Menu
             * Left bar menu
             */
            add_menu_page( 'QuQuk Admin Page', 'QuQuk Config', 'manage_options', 'ququk/admin/ququk.php', '','', 6 );
        }
    }

    public function adminPageSubmenuFunction(){
        //Add Category Page Function
        function ququkAdminSubMenu() {
            add_submenu_page( 'ququk/admin/ququk.php', 'Category Settings', 'Category Settings', 'manage_options', 'ququk-cat', 'ququkAdminSubmenuCategory' );
            add_submenu_page( 'ququk/admin/ququk.php', 'Content Settings', 'Content Settings', 'manage_options', 'ququk-body', 'ququkAdminSubmenuContent' );

        }
    }
    /*
     * İnclude Submenu Page
     */
    public function adminSubmenuPage(){
        //Add Hook Category Page Function.
        function ququkAdminSubmenuCategory(){
            global $ququkPlugin;
            global $ququkThemes;
            global $homeQuquk;
            global $ququkAdmin;
            global $ququkUrl;
            global $ququkCatUrl;
            include($ququkPlugin."/admin/category.php");
        }
        //Add Hook Content Page Function.
        function ququkAdminSubmenuContent(){
            global $ququkPlugin;
            global $ququkThemes;
            global $homeQuquk;
            global $ququkAdmin;
            global $ququkUrl;
            global $ququkCatUrl;
            include($ququkPlugin."/admin/content.php");
        }
    }
     public function widget(){
        include("widget.php");
        add_action( 'widgets_init', function(){
            register_widget( 'Quq_Widget' );
        });
    }

} 