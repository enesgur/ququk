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
	}elseif ($_POST['type'] === "ququkQuq") {
		$body	= $_POST['body'];
		$cat 	= $_POST['cat'];
		if(!$body == '' && !$cat == ''){ //null variables not insert db.
			if($ququkDb->insertQuq($body,$cat)){
				echo '<div data-alert class="alert-box success">';
				echo 'success add <b>Quq</b>';
				echo '<a href="#" class="close">&times;</a>';
				echo '</div>';
			}
			else{
                echo '<div data-alert class="alert-box round">';
                echo 'failed add <b>Quq</b>';
                echo '<a href="#" class="close">&times;</a>';
                echo '</div>';
            }
        }else{
			echo '<div data-alert class="alert-box alert">';
			echo 'failed add <b>Quq</b>';
			echo '<a href="#" class="close">&times;</a>';
			echo '</div>';
		}
	}elseif($_POST['type'] == "catGet"){
        $id     = $_POST['id'];
        $return = ququkDb::getQuq($id,"ququkCategory");

        $form = '<form id="formCat" action="" method="post">';
        $form .= '<fieldset>';
        $form .= '<legend name="cat"><a name="cat"/>Edit QuQuk Category</a></legend>';
        $form .= '<div class="row">';
        $form .= '<div class="large-5 columns">';
        $form .= '<label>Slug</label>';
        $form .= '<input type="text" name="slug" value="Slug">';
        $form .= '</div>';
        $form .= '<div class="large-5 pull-2 columns">';
        $form .= '<label>Title</label>';
        $form .= '<input type="text" name="title" value="Title">';
        $form .= "<input type='hidden' class='id' name='id' value='$id' />";
        $form .= '<input type="hidden" name="homeQuquk" value="'.$homeQuquk.'" />';
        $form .= '<input type="hidden" name="ququkPluginDir" value="'.$ququkPlugin.'" />';
        $form .= '<input type="hidden" name="type" value="ququkCategoryEdit" />';
        $form .= '</div></div>';
        $form .= '<a class="button editCat secondary" onclick="confirm(\'Are you sure?\')">Edit Category</a>';
        $form .= '</fieldset>';
        $form .= '</form>';

        foreach($return as $row){
            $form = str_replace(array('value="Title"','value="Slug"'),array("value='$row->title'","value='$row->Slug'"),$form);
            echo $form;
        }
    }elseif($_POST['type'] == "ququkCategoryEdit"){
        $slug  = $_POST['slug'];
        $title = $_POST['title'];
        $id    = $_POST['id'];
        if($slug == "" || $title == ""){
            echo '<div data-alert class="alert-box alert">';
            echo 'failed edit <b>cat</b>';
            echo '<a href="#" class="close">&times;</a>';
            echo '</div>';
            die();
        }
        if(ququkDb::setCat($slug,$title,$id)){
            echo '<div data-alert class="alert-box success">';
            echo 'success Edit <b>ququkCategory</b>';
            echo '<a href="#" class="close">&times;</a>';
            echo '</div>';
        }

    }elseif($_POST['type'] == "catDelete"){
        $cats = $_POST['catDelete'];
        if(count($cats) != 0){
            if(ququkDb::deleteQuq($cats,"ququkCategory")){
                echo '<div data-alert class="alert-box success">';
                echo 'Success Deleted Categories and Will be redirected in 3 seconds';
                echo '<a href="#" class="close">&times;</a>';
                echo '</div>';
            }else{
                echo '<div data-alert class="alert-box alert">';
                echo 'failed delete <b>cats</b> and Will be redirected in 3 seconds';
                echo '<a href="#" class="close">&times;</a>';
                echo '</div>';
            }
        }else{
            echo '<div data-alert class="alert-box alert">';
            echo 'failed delete <b>cats</b> and Will be redirected in 3 seconds';
            echo '<a href="#" class="close">&times;</a>';
            echo '</div>';
        }

    }
}

?>