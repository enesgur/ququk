<?php include($ququkPlugin."admin/tpl/header.php"); //Imclude Header File (Style and Javascript Include) ?>
<?php
$cat = ququkDb::allQuq(null,null,"ququkCategory");
foreach ($cat as $key) {
    $row .= "<option value='$key->Id' >".$key->Slug."</option>\n";
}
?>
    <!-- Contact Details -->
<div class="success"></div>
<form id="formCat" action="" method="post">
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
            <a class="button addCat secondary">Add Category</a>
    </fieldset>
</form>
<form id="formQuq" action="" method="post">
    <fieldset>
        <legend name="cat"><a name="cat"/>Add QuQuk</a></legend>
        <div class="row">
            <div class="large-5 columns">
                <label>Body</label>
               <textarea name="body" placeholder="Body"></textarea>
            </div>
            <div class="large-5 pull-2 columns">
                <label for="Cat">Cat</label>
                <select name="cat" class="medium">
                    <?php echo $row; ?>    
                 </select>
                <input type="hidden" name="homeQuquk" value="<?php echo $homeQuquk; ?>" />
                <input type="hidden" name="ququkPluginDir" value="<?php echo $ququkPlugin; ?>" />
                <input type="hidden" name="type" value="ququkQuq" />
            </div>

        </div>
            <a class="button addQuq secondary">Add Quq</a>
    </fieldset>
</form>
<!-- Footer -->



<?php include($ququkPlugin."admin/tpl/footer.php"); //Include Footer File (All Js include) ?>
