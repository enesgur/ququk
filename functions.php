<?php
function pagination($page=null,$table,$url){
    global $ququkDb;
    $ququkCatUrl = $url;
    $limit = 4;
    $count = ququkDb::ququCount($table);
    $totalPage = ceil($count / $limit);
    if(!is_numeric($page) || is_null($page) || $page > $totalPage || $page < 1){
        $page = 1;
    }
    $pages = ($page-1) * $limit;
    $resultsTable = ququkDb::allQuq($pages,$limit,$table); //Results Query
    $results['table'] = $resultsTable;

    //Pagination Nav Start
    if($page > 1){
        $pagination[] = "<li class='arrow'><a href='{$ququkCatUrl}&pages=".($page-1)."'>&laquo;</a></li>"; //Back Button.
    }
    for($i=1;$i <= $totalPage;$i++){
        if($page == $i)
            $pagination[] = "<li class='current'><a href='{$ququkCatUrl}&pages=".$i."'>{$i}</a></li>";
        else
            $pagination[] = "<li><a href='{$ququkCatUrl}&pages=".$i."'>{$i}</a></li>";
    }
    if($page < $totalPage)
        $pagination[] = "<li class='arrow'><a href='{$ququkCatUrl}&pages=".($page+1)."'>&raquo;</a></li>"; //Next Button

    $results['pagination'] = $pagination;
    return $results;
}
/*
 * Submenü olarak eklenen sayfanın adresi
 * Bu adres Pagination kısmında lazım olacaktır.
 */
function catUrl(){
    $admin = "admin.php?page=";
    $url = $_SERVER[REQUEST_URI];
    $url = explode("ququk-",$url);
    $url = "ququk-".$url[1];
    if(strstr($url,"&"))
        $url = strstr($url,"&",true);
    $url = $admin.$url;
    return $url;
}
