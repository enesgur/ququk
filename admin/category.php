<?php include($ququkPlugin."admin/tpl/header.php"); //Imclude Header File (Style and Javascript Include) ?>
<?php
    function pagination($page=null,$table){
        global $ququkDb;
        $limit = 2;
        $count = ququkDb::ququCount($table);
        $totalPage = ceil($count / $limit);
        echo $totalPage;
        if(!is_numeric($page) || is_null($page) || $page > $totalPage || $page < 1){
            $page = 1;
        }
        $pages = ($page-1) * $limit;
        $resultsTable = ququkDb::allQuq($pages,$limit,$table); //Results Query
        return $resultsTable;

        if($page > 1)
            $pagination[] = '<li class="arrow"><a href="">&laquo;</a></li>'; //geri butonu.
    }
//pagination($_GET['pages'],"ququkCategory");
?>
<?php $allCat = pagination($_GET['pages'],"ququkCategory"); // ququkDb::allQuq(0,2,"ququkCategory"); //***********SAYFALAMA SİSTEMİNDEN DEVAM EDİLECEK*************?>
<br />
<div class="pagination-centered">
    <ul class="pagination">
        <li class="arrow unavailable"><a href="">&laquo;</a></li>
        <li class="current"><a href="">1</a></li>
        <li><a href="">2</a></li>
        <li><a href="">3</a></li>
        <li><a href="">4</a></li>
        <li class="unavailable"><a href="">&hellip;</a></li>
        <li><a href="">12</a></li>
        <li><a href="">13</a></li>
        <li class="arrow"><a href="">&raquo;</a></li>
    </ul>
</div>
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
            <td class="text-center"><label for="checkbox<?php echo $row->Id; ?>"><input type="checkbox" id="checkbox<?php echo $row->Id; ?>" name="catDelete[]" value="<?php echo $row->Id; ?>" style="display: inline-block;"> delete category?</label></td>
            <td class="text-center"><a href="#edited" class="button secondary radius">Edited</a></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
<input type="button" class="goDelete button round right" value="delete" onclick="confirm('Are you sure you want to delete categories?')" />
<script type="text/javascript">
    //Delete Ajax Category.
    jQuery(".goDelete").click(function(){
        var data = { 'delete[]' : []};
        jQuery("input:checked").each(function() {
            data['delete[]'].push(jQuery(this).val());
        });
        console.log(data);
    });


</script>
<?php include($ququkPlugin."admin/tpl/footer.php"); //Include Footer File (All Js include) ?>
