<?php
	if (is_page_template('page-with-sidebar-left.php'))
	{
		if (is_page( array('sobre-a-eko', 'localizacao', 'parceiros', 'vantagens') ))
		{
			wp_nav_menu( array('menu' => 'sidebar eko') );
		?>
			<div class="banner hide-for-small">
				<a href="<?php echo get_permalink(get_page_by_path('vantagens')); ?>">
					<img src="<?php bloginfo('template_directory'); ?>/images/sidebar-banner-vantagens.jpg" alt="" />
				</a>
			</div>
			<div class="banner hide-for-small">
				<?php 
					$category_blog = get_category_by_slug('blog');
					$category_blog = $category_blog->cat_ID;
				?>
				<a href="<?php echo get_category_link($category_blog) ?>">
					<img src="<?php bloginfo('template_directory'); ?>/images/sidebar-banner-blog.jpg" alt="" />
				</a>
			</div>
		<?php		
		}
		else if (is_page( array('fale-conosco', 'venda-seu-terreno', 'calcule-o-seu-financiamento') ))
		{
			wp_nav_menu( array( 'menu' => 'sidebar contato') );
		}
		else if (is_page( array('central-de-atendimento', 'tire-suas-duvidas', 'ligamos-para-voce', 'agende-uma-visita') ))
		{
			wp_nav_menu( array( 'menu' => 'sidebar atendimento') );	
		}
		else if (is_page( array('area-restrita') ))
		{
		?>
			<ul class="menu">
				<li><a href="#">Download</a></li>
				<?php if (is_user_logged_in()) : ?>
				<li><?php wp_loginout( home_url() ); ?></li>
				<?php endif; ?>
			</ul>
		<?php
		}

		if (function_exists('dynamic_sidebar'))
		{
			dynamic_sidebar('left_sidebar');
		}
	}
	else if (is_page_template('page-with-sidebar-right.php'))
	{
	if (is_page( array('pesquisa-de-satisfacao') ))
		{
			?>
		<h1>Portal do Cliente</h1>
	<?php
			}
		else {
		?>
    		<h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
        	<?php
		}
		if (is_page( array('corretores', 'investidores') ))
		{
			if (!is_user_logged_in() )
			{
	?>
				<p>Você é um <?php echo str_replace('res', 'r', get_the_title());?> EKO? Faça o seu login e tenha acesso ao conteúdo exclusivo.</p>	
	<?php
			}
			include(TEMPLATEPATH . '/login-form.php');
		}
		
		if (is_page( array('pesquisa-de-satisfacao') ))
		{
			include(TEMPLATEPATH . '/lateral-portal.php');
			}
	
		if (function_exists('dynamic_sidebar'))
		{
			dynamic_sidebar('right_sidebar');
		}	 
	}
	else {
		if (function_exists('dynamic_sidebar'))
		{
			dynamic_sidebar('blog_sidebar');
		}
	}
?>