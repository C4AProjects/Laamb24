<?php
/**
* @package Dunk360 WordPress Theme Framework
* @subpackage dunk360
* @author Kava Media - www.kavamediagh.com
*/

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.');?></p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->
<div id="comments">
<?php if ( have_comments() ) : ?>
	
	
	<h2><?php printf( 'Comments: %1$s', get_comments_number()  );?> <a href="#" id="toggle-comments">Hide Comments</a></h2>

<div id="comment-lists">	
	<ul class="commentlist">
	<?php wp_list_comments("callback=dunk_comments"); ?>
	</ul>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
</div>	
 <?php else : // this is displayed if there are no comments so far ?>

	
<?php endif; ?>

</div>


<?php if ( comments_open() ) : ?>

<div id="respond">

<!--<h2><?php comment_form_title( _e('Comment','dunk360')); ?></h2>-->

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>

<div class="login-post-comment"><?php do_action( 'wordpress_social_login' ); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e('Sign Up ','dunk360');?></a> to post comments 
<p><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea></p>

</div>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p><?php _e('Connecté en tant que:','dunk360').' '?><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out','dunk360');?>"><?php _e('Déconnexion','dunk360');?></a></p>

<?php else : ?>
<?php do_action( 'wordpress_social_login' ); ?>
<p>
<label for="author"><small><?php _e('Nom d\'utilisateur','dunk360');?> <?php if ($req) _e('(requis)','dunk360'); ?></small></label>
<input type="text" name="author" id="author" value="<?php /*echo esc_attr($comment_author); */ echo esc_attr($comment_author);?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
</p>

<p>
<label for="email"><small><?php _e('Email','dunk360'); _e('(ne sera pas publié)','dunk360'); if ($req) _e('(requis)','dunk360'); ?></small></label>
<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
</p>

<p>
<label for="url"><small><?php _e('Website','dunk360');?></small></label>
<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
</p>

<?php endif; ?>

<p><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Poster" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>