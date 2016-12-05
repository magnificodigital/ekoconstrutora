<?php session_start();
/*
Template Name: Sidebar Right
*/
?>
<?php get_header();?>
<div id="wrap" class="row">
	<div id="content" class="seven columns">
		<div class="post-container short">		
			<?php if(have_posts()):?>
				<?php while(have_posts()):the_post();?>
					<div class="featured">
						<?php echo (has_post_thumbnail()) ? get_the_post_thumbnail($post->ID, array(960,9999)) : ''; ?>
					</div> 	
					<div class="post-content">
						<?php the_content();?>
					</div>			
				<?php endwhile;?>			
			<?php endif;?>
			<?php
				//comments_template( '', true );
				include(TEMPLATEPATH . '/contact-forms.php');
			?>
		</div> 
	</div>
	<div id="sidebar" class="four columns">
		<?php get_sidebar();?>
	</div>
<?php get_footer();?>