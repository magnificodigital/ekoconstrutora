<?php get_header();?>
<div id="wrap" class="row">
<div id="content" class="eight columns">
	 <div class="post-container">
		<?php if(have_posts()): ?>
			<?php while(have_posts()):the_post(); ?>
				<div class="post-title">
					<h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
				</div><!--post-title-->
				<div class="post-meta">
					<span class="date"><?php the_time('j \d\e F \d\e Y');?></span>
					&nbsp;|&nbsp;
					postado por <?php the_author_posts_link(); ?>
					<?php
						if ('post' == get_post_type())
						{
					?>
							na categoria <?php the_category(', '); ?>
					<?php
						}
					?>
					<?php //comments_popup_link('No Comments', '1 Comment', '% Comments');?>
				</div>
				<div class="featured">
					<?php echo (has_post_thumbnail()) ? get_the_post_thumbnail($post->ID, array(960,9999)) : ''; ?>
				</div>
				<?php if($post->post_content != ''): ?>
				<div class="post-content">
					<?php the_excerpt();?>
					<a class="btn" href="<?php the_permalink();?>">+ Leia Mais</a>
				</div><!--post-contetn-->
				<?php endif; ?>
			<?php endwhile;?>
		<?php else: ?>
			<div class="post-title">
				<h1>Sua busca não teve nenhum resultado</h1>
			</div>
			<p>
				1 - Verifique se suas palavras estão escritas corretamente.<br>
				2 - Reescreva sua busca usando sinônimos.
			</p>
		<?php endif;?>
	 </div><!--post-container-->	 
	<div class="row page-navigation">
		<div class="twelve columns">
			<?php 
				if(function_exists('wp_paginate'))
				{
			    	wp_paginate();
				}
			?>
		</div>
	</div>	 
</div><!--end content-->
<div class="four columns blog-sidebar">
	<?php get_sidebar();?>
</div>
<?php get_footer();?>