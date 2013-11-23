<?php include($ququkPlugin."admin/tpl/header.php"); //Imclude Header File (Style and Javascript Include) ?>
<?php

?>

    <!-- Contact Details -->

<form id="form" action="" method="post">
    <fieldset>
        <legend name="cat"><a name="cat"/>Add QuQuk Category</a></legend>
        <div class="row">
            <div class="large-5 columns">
                <label>Slug</label>
                <input type="text" name="slug" placeholder="Slug">
            </div>
            <div class="large-5 pull-2 columns">
                <label>Title</label>
                <input type="text" name="title" placeholder="Title">
                <input type="hidden" name="homeQuquk" value="<?php echo $homeQuquk; ?>" />
                <input type="hidden" name="ququkPluginDir" value="<?php echo $ququkPlugin; ?>" />
                <input type="hidden" name="type" value="ququkCategory" />
            </div>

        </div>
            <a class="button secondary">Add Category</a>
    </fieldset>
</form>
<div class="success"></div>
<!-- Footer -->



<?php include($ququkPlugin."admin/tpl/footer.php"); //Include Footer File (All Js include) ?>
