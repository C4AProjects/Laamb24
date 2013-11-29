<div id="site-tools">           
            
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Right Sidebar") ) : ?>
            <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style">
                <a class="addthis_button_print at300b" title="Print" href="#"><span class="at300bs at15nc at15t_print"></span></a>
                <span class="addthis_separator"> | </span>
                <a class="addthis_button"><img height="16" border="0" width="125" alt="Share" src="//s7.addthis.com/static/btn/v2/lg-share-en.gif"></a>
              </div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4de7bd176f7214a5"></script>
</div><!-- AddThis Button END -->
<?php 
if($post->post_parent == 15){ ?><div class="block first">
    <a href="<?php echo get_page_link('145'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/register-online.png" width="172" height="61" alt="Training Registration" /></a>               
</div>
<?php } ?>
<div class="block">
    <a href="<?php echo get_page_link('23'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/call-us.png" width="172" height="61" alt="Call Us: 030 930930" /></a>               
</div>
<div class="block">
    <a href="<?php echo get_page_link('21'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/downloads.png" width="172" height="61" alt="Downloads" /></a>
</div>
            
<?php endif; ?>
