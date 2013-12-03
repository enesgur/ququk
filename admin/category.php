<?php include($ququkPlugin."admin/tpl/header.php"); //Imclude Header File (Style and Javascript Include) ?>
<?php include($ququkPlugin."functions.php"); //Imclude Functions File ?>
<?php
$cats       = pagination($_GET['pages'],"ququkCategory",$ququkCatUrl); //Return Pagination and Table Results
$allCat     = $cats['table'];
$pagination = $cats['pagination'];
?>
<br />
<table>
    <thead>
        <tr>
            <th width="50" class="text-center">Id*</th>
            <th width="350" class="text-center">Slug</th>
            <th width="350" class="text-center">Title</th>
            <th width="125" class="text-center">Delete</th>
            <th width="125" class="text-center">Edited</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($allCat as $row):  ?>
        <tr>
        <td class="text-center"><?php echo $row->Id; ?></td>
        <td class="text-center"><?php echo $row->Slug; ?></td>
        <td class="text-center"><?php echo $row->title; ?></td>
        <td class="text-center"><label for="checkbox<?php echo $row->Id; ?>"><input type="checkbox" id="<?php echo $row->Id; ?>" name="catDelete[]" value="<?php echo $row->Id; ?>" style="display: inline-block;"> delete category?</label></td>
        <td class="text-center"><a href="#edited" class="button secondary radius">Edited</a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<input type="button" class="goDelete button round right" value="delete" onclick="confirm('Are you sure you want to delete categories?')" />
<div class="pagination-centered">
    <ul class="pagination">
        <?php
        foreach($pagination as $row){
        echo $row."\n";
        }
        ?>
    </ul>
</div>
<script type="text/javascript">
    //Delete Ajax Category.
    jQuery(".goDelete").click(function(){
        jQuery.ajax({
            type: 'POST',
            data: jQuery("#formCheck").serialize(),
            url : "<?php echo $ququkAdmin; ?>ajax.php",
            success: function(data){
                alert(data);
            }
        });
        //console.log(data);
    });
</script>
<?php include($ququkPlugin."admin/tpl/footer.php"); //Include Footer File (All Js include) ?>
