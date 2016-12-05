<?php get_header();?>
<div id="wrap" class="row">
<div id="content" class="twelve columns">
	<?php if (is_page( array('mapa-do-site') )): ?>
		<div class="row sitemap">
			<div class="three columns">
				<h3>Institucional</h3>
				<?php wp_nav_menu( array('theme_location' => 'sitemap-menu1', 'fallback_cb' => '') ); ?>
			</div>
			<div class="three columns">
				<h3>Imóveis</h3>
				<?php wp_nav_menu( array('theme_location' => 'sitemap-menu2', 'fallback_cb' => '') ); ?>
			</div>
			<div class="three columns">
				<h3>Central de Atendimento</h3>
				<?php wp_nav_menu( array('theme_location' => 'sitemap-menu3', 'fallback_cb' => '') ); ?>
			</div>
			<div class="three columns">
				<h3>Outros</h3>
				<?php wp_nav_menu( array('theme_location' => 'sitemap-menu4', 'fallback_cb' => '') ); ?>
			</div>
		</div>
	<?php else: ?>
	<div class="post-container short">
	<?php if(have_posts()):?>
	<?php while(have_posts()):the_post();?>
		<div class="post-title">
			<h1><a href="<?php the_permalink();?>"><?php the_title();?> </a></h1>
		</div><!--post-title-->			
		<?php if($post->post_content != ''): ?>
		<div class="post-content">
			<?php the_content();?>
		</div><!--post-contetn-->
		<?php endif; ?>
	<?php endwhile;?>			
	<?php endif;?>
	<?php endif;?>
	<?php //include(TEMPLATEPATH . '/contact-forms.php'); ?>
	</div><!--post-container-->
</div><!--end content-->
<?php // get_sidebar();?>
<?php get_footer();?>