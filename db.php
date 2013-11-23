<?php
class ququkDb {

    public $wpdb;

    public function __construct(){
        global $wpdb;
        $this->wpdb = $wpdb;
    }
//        $ququkInsert[] = array("INSERT INTO ququkCategory (Id, Slug, title) VALUES (%d, %s, %s)",array(1,'default','The default category'));

    public function insertCat($slug,$title){
        $wpdb = $this->wpdb;
        $slug = htmlspecialchars($slug);
        $title= htmlspecialchars($title);
        try{
            $result = array("INSERT INTO ququkCategory (Slug, title) VALUES (%s, %s)",array($slug,$title));
            $wpdb->query($wpdb->prepare($result[0],$result[1]));
            return true;
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function insertQuq($body,$id){
        $wpdb = $this->wpdb;
        //$body = htmlspecialchars($body);
        try{
            $result = array("INSERT INTO ququkContent (Body, CatId) VALUES (%s, %s)",array($body,$id));
            $wpdb->query($wpdb->prepare($result[0],$result[1]));
        }catch (PDOException $e){
            echo $e->getMessage();
            echo $e->errorInfo();
        }
    }

    public static function allCat(){
        global $wpdb;
        $result = $wpdb->get_results('SELECT Id, Slug FROM ququkCategory',OBJECT_K);
        return $result;
    }
   // public function selectQuq($start,$limit,)
}