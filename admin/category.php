<?php include($ququkPlugin."admin/tpl/header.php"); //Imclude Header File (Style and Javascript Include) ?>
<?php
$cats       = pagination($_GET['pages'],"ququkCategory",$ququkCatUrl); //Return Pagination and Table Results
$allCat     = $cats['table'];
$pagination = $cats['pagination'];
?>
<br />
<div class="success"></div>
<form id="formCheck">
    <input type="hidden" name="type" value="catDelete" />
    <input type="hidden" name="homeQuquk" value="<?php echo $homeQuquk; ?>" />
    <input type="hidden" name="ququkPluginDir" value="<?php echo $ququkPlugin; ?>"/>
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
        <td class="text-center" id="id-<?php echo $row->Id; ?>"><?php echo $row->Id; ?></td>
        <td class="text-center" id="slug-id-<?php echo $row->Id; ?>"><?php echo $row->Slug; ?></td>
        <td class="text-center" id="title-id-<?php echo $row->Id; ?>"><?php echo $row->title; ?></td>
        <td class="text-center"><label for="checkbox<?php echo $row->Id; ?>"><input type="checkbox" id="<?php echo $row->Id; ?>" name="catDelete[]" value="<?php echo $row->Id; ?>" style="display: inline-block;"> delete category?</label></td>
        <td class="text-center"><a id="edited" class="button secondary radius" edited="<?php echo $row->Id; ?>">Edited</a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
</form>
<qq></qq>
<script type="text/javascript">
    jQuery(document).ready(function($){
        $("td a").click(function(){
            var id = $(this).parent().find("a").attr("edited");
            $.ajax({
               type: 'POST',
                data: { 'id' : id, 'type' : "catGet", 'homeQuquk' : '<?php echo $homeQuquk; ?>', 'ququkPluginDir' : '<?php echo $ququkPlugin; ?>' },
                url: "<?php echo $ququkAdmin; ?>ajax.php",
                success:function(data){
                 $("qq").html(data);
               }
            });
        });
    });
</script>
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
        jQuery("#formCat").remove();
        jQuery.ajax({
            type: 'POST',
            data: jQuery("#formCheck").serialize(),
            url : "<?php echo $ququkAdmin; ?>ajax.php",
            success: function(data){
                jQuery(".success").html(data);
                if(window.top==window) {
                    window.setTimeout('location.reload()', 2500); //reloads after 3 seconds
                }
            }
        });
    });
</script>
<?php include($ququkPlugin."admin/tpl/footer.php"); //Include Footer File (All Js include) ?>
