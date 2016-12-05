<?php // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) { ?>
	<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php
	return;
}

// add a microid to all the comments
function comment_add_microid($classes) {
	$c_email=get_comment_author_email();
	$c_url=get_comment_author_url();
	if (!empty($c_email) && !empty($c_url)) {
		$microid = 'microid-mailto+http:sha1:' . sha1(sha1('mailto:'.$c_email).sha1($c_url));
		$classes[] = $microid;
	}
	return $classes;	
}
add_filter('comment_class','comment_add_microid');

// show the comments
if ( have_comments() ) : ?>
	<div id="comments"><?php comments_number('Nenhum comentário', 'Um comentário', '% Comentários' );?></div>
	<ul class="commentlist" id="singlecomments">	
		<?php wp_list_comments(array('avatar_size'=>40, 'reply_text'=>'Responder')); ?>
	</ul>	
	<div class="comment-navigation">
		<?php 
			if(function_exists('wp_paginate_comments'))
			{
		    	wp_paginate_comments();
			} 
		?>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post->comment_status) :
		// If comments are open, but there are no comments.
	else : 
		// comments are closed 
	endif;
endif; 

if ('open' == $post-> comment_status) : 

// show the form
?>
<div id="respond">
	<h3>Deixe seu comentário</h3>

	<?php cancel_comment_reply_link('Cancel'); ?> 
	 
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	<div class="twelve columns">
		<?php if ( $user_ID ) : ?>
			<div class="row">
				<div class="twelve columns">
					<p>Logado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.
					<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
				</div>
			</div>
			<div class="row">
				<div class="two columns">
					<label>Comentário:</label>
				</div>
				<div class="seven columns">
					<textarea name="comment" id="comment" class="comment-form-input-fields" cols="40" rows="15" tabindex="4"></textarea>
				</div>
				<div class="three columns">
					<input name="submit" type="submit" id="submit" tabindex="5" value="Enviar" style="margin-top: 122px" />
				</div>
			</div>
		<?php else : ?>	
			<div class="row">
				<div class="two columns">	
					<label>Nome:</label><?php //if ($req) echo "<small>Required:</small>"; ?>
				</div>
				<div class="seven columns">
					<input type="text" name="author" id="author"  size="40" value="<?php echo $comment_author; ?>" class="comment-form-input-fields"  tabindex="1" />
				</div>
				<div class="three columns"></div>
			</div>
			<div class="row">
				<div class="two columns">
					<label>E-mail:</label><?php //if ($req) echo "<small>Required:</small>"; ?>
				</div>
				<div class="seven columns">
					<input type="text" name="email" id="email"  size="40" value="<?php echo $comment_author_email; ?>" class="comment-form-input-fields" tabindex="2" />
				</div>
				<div class="three columns"></div>
			</div>
			<div class="row">
				<div class="two columns">
					<label>Comentário:</label>
				</div>
				<div class="seven columns">
					<textarea name="comment" id="comment" class="comment-form-input-fields in-contact-form"  cols="40" rows="15" tabindex="4"></textarea>
				</div>
				<div class="three columns">
					<input name="submit" type="submit" id="submit" tabindex="5" value="Enviar" style="margin-top: 122px" />
				</div>
			</div>
		<?php endif; ?>

		<div style="display:none;">
			<?php comment_id_fields(); ?>
			<input type="hidden" name="redirect_to" value="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" />
		</div>

		<?php do_action('comment_form', $post->ID); ?>

	</div>
	</form>
<?php endif; ?>
</div>
<?php 
endif;
