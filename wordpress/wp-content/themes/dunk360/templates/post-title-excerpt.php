<h3 class="entry-title">
<!-- <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'dunk360' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php 	echo short_title('...', 4); ?></a> -->
</h3>
<h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'Laamb24' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
<?php
if($post->post_excerpt != ''){
		//echo the_title();
		echo short_title('...', 15);
}else {
			// echo the_title();
			echo short_title('...', 15);
}
 ?>
</a></h4>