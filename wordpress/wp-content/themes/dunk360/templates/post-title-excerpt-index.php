<h3 class="entry-title">
<!-- <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'dunk360' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php 	echo short_title('...', 4); ?></a> -->
	<?php
	$category = get_the_category(); 
	echo $category[0]->cat_name;
    ?>
</h3>
<h4><?php
if($post->post_excerpt != ''){
		echo the_title();
}else {
			echo the_title();
}
 ?></h4>