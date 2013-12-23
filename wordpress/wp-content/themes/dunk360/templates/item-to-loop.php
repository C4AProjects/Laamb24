<li class="grid_4"><div class="post-news-item lft">
	<div class="post-thumbnail">
		<a href="<?php the_permalink(); ?>"><?php locate_template( array( '/templates/thumb.php'), true, false ); ?></a>
	</div>
	<div class="post-details">
		<?php locate_template( array( '/templates/post-title-excerpt.php'), true, false ); ?>
		<div class="post-link">
		<!--	
		<a href="<?php the_permalink(); ?>" class="readnow"><span>Read Now</span></a>
	   -->
	    <a class="thumb_readnow_lnk" href="<?php echo the_permalink(); ?>">Lire</a>
		
		<?php locate_template( array( '/templates/simplelikes.php'), true, false ); ?>
	   
	</div>
	</div>
	
</div> </li>