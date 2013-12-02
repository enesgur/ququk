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
</script>
<script src="<?php echo $ququkThemes; ?>js/foundation.min.js"></script>
<!--

<script src="js/foundation/foundation.js"></script>

<script src="js/foundation/foundation.interchange.js"></script>

<script src="js/foundation/foundation.abide.js"></script>

<script src="js/foundation/foundation.dropdown.js"></script>

<script src="js/foundation/foundation.placeholder.js"></script>

<script src="js/foundation/foundation.forms.js"></script>

<script src="js/foundation/foundation.alerts.js"></script>

<script src="js/foundation/foundation.magellan.js"></script>

<script src="js/foundation/foundation.reveal.js"></script>

<script src="js/foundation/foundation.tooltips.js"></script>

<script src="js/foundation/foundation.clearing.js"></script>

<script src="js/foundation/foundation.cookie.js"></script>

<script src="js/foundation/foundation.joyride.js"></script>

<script src="js/foundation/foundation.orbit.js"></script>

<script src="js/foundation/foundation.section.js"></script>

<script src="js/foundation/foundation.topbar.js"></script>

-->

<script>
   jQuery(document).foundation();
</script>