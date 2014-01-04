<?php
 $page_dat_id = 437;
 $page_dat = get_page($page_dat_id);
 
?>
<div class="block lft" id="contacts-info">
 <h3><a href="<?php  echo get_page_link( $page_dat_id ); ?>"><?php echo $page_dat->post_title; ?></a></h3>
    <ul>	
<li>Email: <a href="mailto:<?php echo get_option('kava_contact_email'); ?>" style="display:inline;"><?php echo str_replace('@','<code>@</code>',get_option('kava_contact_email')); ?></a><br />
Phone 1: <?php echo get_option('kava_contact_phone1'); ?><br />
Phone 2: <?php echo get_option('kava_contact_phone2'); ?></li>
<li><?php echo get_option('kava_contact_address'); ?></li>
</ul>
 </div>