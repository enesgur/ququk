<?php 
if($_POST){
	/*
	 *İnclude wp-blog-header.php
	*/
	if(isset($_POST['homeQuquk'])){
		$wpheader = $_POST['homeQuquk']."wp-blog-header.php";
		$ququkDir = $_POST['ququkPluginDir']."db.php";
		if(file_exists($wpheader)){
			include($wpheader);
		}
	}else
		die();

	if ($_POST['type'] === "ququkCategory") {
		$slug 	= $_POST['slug'];
		$title  = $_POST['title'];
		if(!$slug == '' && !$title == ''){ //null variables not insert db.
			if($ququkDb->insertCat($slug,$title)){
				echo '<div data-alert class="alert-box success">';
				echo 'success add <b>ququkCategory</b>';
				echo '<a href="#" class="close">&times;</a>';
				echo '</div>';
			}
			else{
				echo '<div data-alert class="alert-box round">';
				echo 'failed add <b>ququkCategory</b>';
				echo '<a href="#" class="close">&times;</a>';
				echo '</div>';
			}
		}else{
			echo '<div data-alert class="alert-box alert">';
			echo 'failed add <b>ququkCategory</b>';
			echo '<a href="#" class="close">&times;</a>';
			echo '</div>';
		}
	}

}
?>