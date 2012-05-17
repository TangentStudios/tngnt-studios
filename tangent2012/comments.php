<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		This post is password protected. Enter the password to view comments.
	<?php
		return;
	}
?>

<?php if ($comments) : ?>
	<?php foreach ($comments as $comment) : ?>
	<?php $i++; ?>
	<article id="comment"
	    <?php if($i&1) {
	        echo 'class="odd clearfix"';
	    } else {
	        echo 'class="even clearfix"';
	    } ?>>
		<figure class="comment-avatar">
			<?php if(function_exists('get_avatar')) { echo get_avatar($comment, '80', 'http://tngnt.co/wp-content/themes/tangent2012/img/avatar.png'); } ?>
		</figure>
			
		<div class="comment-text">
			<h6><?php comment_author_link() ?> &mdash;</h6>
			<?php comment_text() ?>
		</div>
	</article>
	<?php endforeach; /* end for each comment */ ?>

 	<?php else : // this is displayed if there are no comments so far ?>
 		
	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
		<article id="comment" class="odd clearfix">
			<figure class="comment-avatar">
				<img src="<?php bloginfo('template_directory'); ?>/img/avatar.png" />
			</figure>
				
			<div class="comment-text">
				<h6>Tangent Studios &mdash;</h6>
				Be the first to comment on this post!
			</div>
		</article>

	<?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<h3 style="text-align: center;"><em>Comments are closed</em></h3>
		
		<?php endif; ?>
		
<?php endif; ?>

<?php if ( comments_open() ) : ?>

<article id="respond" class="clearfix">

	<h3><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>

	<div class="cancel-comment-reply">
		<?php cancel_comment_reply_link(); ?>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentForm">

		<?php if ( is_user_logged_in() ) : ?>

			<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
			
			<ul>

		<?php else : ?>
		<ul>
			<li>
				<label for="author"><?php if ($req) echo '<span class="req">*</span> '; ?>Name</label>
				<input type="text" name="author" id="author" class="textInput" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
			</li>

			<li>
				<label for="email"><?php if ($req) echo '<span class="req">*</span> '; ?>Email</label>
				<input type="text" name="email" id="email" class="textInput" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
			</li>

			<li>
				<label for="url">Website</label>
				<input type="text" name="url" id="url" class="textInput" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
			</li>

		<?php endif; ?>

		<!--<p>You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->

			<li>
				<label for="comment">Comment</label>
				<textarea name="comment" id="comments" class="textInput" cols="30" rows="10" tabindex="4"></textarea>
			</li>
	
			<li>
				<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
				<?php comment_id_fields(); ?>
			</li>
		
		<?php do_action('comment_form', $post->ID); ?>
		
		</ul>
		
	</form>

	<?php endif; // If registration required and not logged in ?>
	
</article>

<?php endif; ?>
