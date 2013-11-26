<div class="related-stories">
<h1>Related Stories</h1>
    <?php $posts = previous_post_link_plus( array(
'order_by' => 'post_date',
'thumb' => true,
'format' => '%link',
'link' => '%title',
'before' => '<ul>',
'after' => '</ul>',
'in_same_cat' => true,
'num_results' => 3,
'return' => 'object'
) );?>
 <?php

	if ($posts) : 
?>
           <div class="post-entries">
        	<ul>
            <?php foreach($posts as $post) :  ?>
            <li><div class="post-news-item lft">
	<div class="post-thumbnail">
		<a href="<?php the_permalink(); ?>"><?php locate_template( array( '/templates/thumb.php'), true, false ); ?></a>
	</div>
	<div class="post-details">
		<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'dunk360' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php 	echo short_content($post->post_title, '...', 3); ?></a></h3>
<h4><?php
if($post->post_excerpt != ''){
	echo short_content(strip_tags($post->post_excerpt), '...', 6);
}else {
	echo short_content(strip_tags($post->post_content), '...', 6);
}
 ?></h4>        
		<div class="post-link">
		<a href="<?php the_permalink(); ?>" class="readnow"><span>Read Now</span></a>
		<?php locate_template( array( '/templates/simplelikes.php'), true, false ); ?>
	</div>
	</div>
	
</div> </li>
            	
            <?php endforeach; ?>
            </ul>
           </div> 
           <?php else : ?>
            <div><p><?php _e('You do not have any related posts to display.','kava'); ?></p></div>
            <?php endif; ?>  
    </div>