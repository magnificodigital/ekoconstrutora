<?php get_header();?>
<div id="wrap" class="row">
<div id="content" class="eight columns">
	<div class="post-container short">		
		<?php if(have_posts()):?>
		<?php while(have_posts()):the_post();?>			
			<div class="post-title">
				<h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
			</div><!--post-title-->
			<div class="post-meta">
				<span class="date"><?php the_time('j \d\e F \d\e Y');?></span>
				&nbsp;|&nbsp;
				postado por <?php the_author_posts_link(); ?> 
				<?php
					if ('listings' != get_post_type())
					{
				?>
						na categoria <?php the_category(', '); ?>
				<?php
					}
				?>
			</div>
			<div class="featured">
				<?php echo (has_post_thumbnail()) ? get_the_post_thumbnail($post->ID, array(960,9999)) : ''; ?>
			</div>
			<div class="post-content">
				<?php the_content();?>
			</div><!--post-contetn-->			
		<?php endwhile;?>			
		<?php endif;?>
		<!--
		<div class="blog-social hide-for-small">
			<h3>Compartilhe</h3>
<span class='st_facebook' displayText='Facebook'></span>
<span class='st_twitter' displayText='Tweet'></span>
<span class='st_sharethis' displayText='ShareThis'></span>
<span class='st_pinterest' displayText='Pinterest'></span>
<span class='st_email' displayText='Email'></span>
<span class='st_fblike' displayText='Facebook Like'></span>
<span class='st_plusone' displayText='Google +1'></span>
		-->
<div class="post-related">
<h3 class="related_post_title" style="margin-bottom:12px !important;">Compartilhe</h3>
<span class='st_facebook' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
<span class='st_twitter' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
<span class='st_linkedin' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
<span class='st_email' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
<span class='st_sharethis' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
<span class='st_fblike' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
<span class='st_plusone' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
<span class='st_pinterest' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>	
</div>

</div><!--post-container-->
	<div class="post-related">
		<?php 
			if(function_exists('wp_related_posts'))
			{
		    	wp_related_posts();
			}
		?>
	</div>
	<?php comments_template('/comments.php'); ?>
</div><!--end content-->
<div class="four columns blog-sidebar">
	<?php get_sidebar();?>
</div>


<?php get_footer();?>