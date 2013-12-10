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
    /*
     * Return QuQuk and Category
     */
    public static function getQuq($id,$table){
        global $wpdb;
        $result = $wpdb->get_results("SELECT * FROM {$table} WHERE Id = {$id}",OBJECT_K);
        return $result;
    }
    /*
     * Delete QuQuk and Category
     */
    public static function deleteQuq($id,$table){
        global $wpdb;
        $count = count($id);
        $i=0;
        foreach($id as $row){
            try{
                $result = array("DELETE FROM {$table} WHERE Id = %s",array($row));
                $wpdb->query($wpdb->prepare($result[0],$result[1]));
                $i++;
            }catch (Exception $e){
                echo $e->getMessage();
                die();
            }
        }
        if($i == $count)
            return true;
        else
            return false;

    }
    /*
     * Update QuQuk Category
     */
    public static function setCat($slug,$title,$id){
        global $wpdb;
        $slug = htmlspecialchars($slug);
        $title= htmlspecialchars($title);
        try{
            $result = array("UPDATE ququkCategory SET Slug= %s, title= %s WHERE id = %s",array($slug,$title,$id));
            $wpdb->query($wpdb->prepare($result[0],$result[1]));
            return true;
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }
    /*
     * Add Database QuQuk
     */
    public function insertQuq($body,$id){
        $wpdb = $this->wpdb;
        //$body = htmlspecialchars($body);
        try{
            $result = array("INSERT INTO ququkContent (Body, CatId) VALUES (%s, %s)",array($body,$id));
            $wpdb->query($wpdb->prepare($result[0],$result[1]));
            return true;
        }catch (PDOException $e){
            echo $e->getMessage();
            echo $e->errorInfo();
        }
    }
    /*
     * Girilen Tablodaki tüm değerleri limite göre listeler
     * İster QuQuk İster Cat
     */
    public static function allQuq($start=null,$limit=null,$table){
        global $wpdb;
        if(is_null($start) || is_null($limit))
            $result = $wpdb->get_results("SELECT * FROM {$table}",OBJECT_K);
        else
            if(!is_null($start) && !is_null($limit))
                $pagenation =  " LIMIT {$start},{$limit}";
            $result = $wpdb->get_results("SELECT * FROM {$table}{$pagenation}",OBJECT_K);
        return $result;
    }

    public static function ququCount($table){
        global $wpdb;
        $result = $wpdb->get_results("SELECT COUNT(*) as Count FROM {$table}",OBJECT_K);
        foreach($result as $row){
            $count = $row->Count;
            break;
        }
        return $count;
    }
   // public function selectQuq($start,$limit,)
}