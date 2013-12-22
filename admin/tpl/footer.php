</div>
<footer class="row">
    <div class="large-12 columns">
        <hr>
        <div class="row">
            <div class="large-6 columns">
                <p>© Copyright no one at all. Go to town.</p>
            </div>
            <div class="large-6 columns">
                <ul class="inline-list right">
                    <li><a href="http://enesgur.com.tr">Enes Gür</a></li>
                    <li><a href="http://wordpress.org">Wordpress</a></li>
                    <li><a href="#">Link 3</a></li>
                    <li><a href="#">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script>
jQuery.noConflict();
    document.write('<script src=' +
        ('__proto__' in {} ? '<?php echo $ququkThemes; ?>js/vendor/zepto' : 'js/vendor/jquery') +
        '.js><\/script>')
</script>
<script type="text/javascript">
    /* Add Quq Cat */
    jQuery(window).load(function($){
        jQuery(".addCat").click(function(){
            jQuery.ajax({
                type: "post",
                url: "<?php echo $ququkAdmin; ?>ajax.php",
                data:jQuery("#formCat").serialize(),
                success: function(data){
                    jQuery(".success").html(data);
                }
            });
        });
    /*Add Quq */
        jQuery(".addQuq").click(function(){
            selectVal = jQuery("option:selected").val();
            selectName= jQuery("select").attr("name");
            select = selectName+"="+selectVal+"&";
            input  = jQuery("#formQuq input").serialize();
            textarea = jQuery("#formQuq textarea").serialize()+"&";
            dataQuq = select+textarea+input;
            jQuery.ajax({
                type: "post",
                url: "<?php echo $ququkAdmin; ?>ajax.php",
                data:dataQuq,
                success: function(data){
                    jQuery(".success").html(data);
                }
            });
        });
    });
    jQuery(document).on("DOMNodeInserted", function(){
        jQuery(".editCat").click(function(){
            jQuery.ajax({
               type: "post",
               url: "<?php echo $ququkAdmin; ?>ajax.php",
               data:jQuery("#formCat").serialize(),
               success: function(data){
                   jQuery(".success").html(data);
               }
           });
            var id      = jQuery(".id").attr("value");
            var slug    = jQuery("input[name='slug']").val();
            var title   = jQuery("input[name='title']").val();
            jQuery("#slug-id-"+id).html(slug);
            jQuery("#title-id-"+id).html(title);
        });
    });
</script>
<script src="<?php echo $ququkThemes; ?>js/foundation.min.js"></script>
<script>
   jQuery(document).foundation();
</script>