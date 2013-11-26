<h3 class="entry-title">
<!-- <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'dunk360' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php 	echo short_title('...', 4); ?></a> -->
	<?php
	$category = get_the_category(); 
	echo $category[0]->cat_name;
    ?>
</h3>
<h4><?php
if($post->post_excerpt != ''){
	// echo short_content(strip_tags($post->post_excerpt), '...', 6);
		echo short_title('...', 10);
}else {
	// echo short_content(strip_tags($post->post_content), '...', 6);
		echo short_title('...', 10);
}
 ?></h4>