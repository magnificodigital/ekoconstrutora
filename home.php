<?php get_header();?>
<?php include(TEMPLATEPATH . '/options.php'); ?>
<?php
$banner_image = '';
$banner_terms = array();
$banner_title = '';
$banner_link  = '';

$args = array(
	'showposts'   	   => 3,
	'offset'           => 0,
	'orderby'          => 'post_date',
	'order'            => 'DESC',
	'post_type'        => 'listings',
	'post_status'      => 'publish',
	'suppress_filters' => true
);

$banner_array = get_posts( $args );

if ($banner_array) { ?>

<div class="jcarousel-wrapper">

<div class="jcarousel">

<ul class="banners">

<?php

	foreach ($banner_array as $banner)

	{

	
		$banner_image = wp_get_attachment_image_src( get_post_thumbnail_id($banner->ID), array(9999, 9999));
		$banner_image = $banner_image[0];

		$banner_image_desktop = get_field('banner_desktop',$banner->ID);
		$banner_image_tablet = get_field('banner_tablet',$banner->ID);
		$banner_image_mobile = get_field('banner_mobile',$banner->ID);



		$banner_title = $banner->post_title;
		$banner_link = get_bloginfo('url') . '\/imovel/' . $banner->post_name;

		$banner_taxonomies = get_object_taxonomies('listings');

		$banner_terms_locale = '';
    	$banner_terms_metreage = '';
    	$banner_terms_rooms = '';



	    foreach ($banner_taxonomies as $banner_taxonomy)

	    {

	        $banner_terms = get_the_terms( $banner->ID, $banner_taxonomy );

	        if ( !empty( $banner_terms ) )
	        {
	            foreach ( $banner_terms as $banner_term )
	            {
	                switch ($banner_term->taxonomy) {
	                	case 'locale':
	                		$banner_terms_locale = $banner_term->name;
	                		break;
	                	case 'metreage':
	                		$banner_terms_metreage = $banner_term->name;
	                		break;
	                	case 'rooms':
	                		$banner_terms_rooms = $banner_term->name;
	                		break;
	                }
	            }
	        }
	    }
?>



		<li>	
			<!--Desktop-->
			<div class="homepage-bg desktop" style="background: url(<?php echo $banner_image_desktop; ?>); background-size: cover; background-position: center bottom;">
				<div class="row">
					<div class="six columns">


						<?php if ($banner->ID === 483 || $banner->ID === 116) { ?> 

						<div class="text">
							<p class="locale"><?= $banner_terms_locale ?></p>
							<h2><?= $banner_title ?></h2>
							<p class="room"><?= $banner_terms_rooms ?></p>
							<p class="metreage"><?= $banner_terms_metreage ?></p>
							<a href="<?= $banner_link ?>" class="btn">Conheça</a>
						</div>

						<?php } ?>

					</div>
				</div>
			</div>

			<!--Tablet-->
			<div class="homepage-bg tablet" style="background: url(<?php echo $banner_image_tablet; ?>); background-size: cover; background-position: center bottom;">
				<div class="row">
					<div class="six columns">

						<?php if ($banner->ID === 483 || $banner->ID === 116) { ?> 

						<div class="text">
							<p class="locale"><?= $banner_terms_locale ?></p>
							<h2><?= $banner_title ?></h2>
							<p class="room"><?= $banner_terms_rooms ?></p>
							<p class="metreage"><?= $banner_terms_metreage ?></p>
							<a href="<?= $banner_link ?>" class="btn">Conheça</a>
						</div>

						<?php } ?>

					</div>
				</div>
			</div>

			<!--Mobile-->
			<div class="homepage-bg mobile" style="background: url(<?php echo $banner_image_mobile; ?>); background-size: cover; background-position: center bottom;">
				<div class="row">
					<div class="six columns">

						<?php if ($banner->ID === 483 || $banner->ID === 116) { ?> 

						<div class="text">
							<p class="locale"><?= $banner_terms_locale ?></p>
							<h2><?= $banner_title ?></h2>
							<p class="room"><?= $banner_terms_rooms ?></p>
							<p class="metreage"><?= $banner_terms_metreage ?></p>
							<a href="<?= $banner_link ?>" class="btn">Conheça</a>
						</div>

						<?php } ?>

					</div>
				</div>
			</div>
		</li>

<?php

	}	

}

wp_reset_postdata();

?>

</ul>

</div>

</div>

<div id="wrap">

	<div id="tabs" class="row">

		<div class="twelve columns">

			<dl class="tabs three-up">

				<dd class="active"><a href="#lancamentos"><h3><span class="ico star hide-for-small"></span>Lançamentos</h3></a></dd>

				<dd><a href="#em-obras"><h3><span class="ico building hide-for-small"></span>Em obras</h3></a></dd>

				<dd><a href="#prontos-para-morar"><h3><span class="ico key hide-for-small"></span>Prontos para morar</h3></a></dd>

			</dl>

		</div>

	</div>

	<div id="tabs-content">

		<div class="row">

			<div class="twelve columns">

				<ul class="tabs-content">

					<li class="active" id="lancamentosTab">

						<ul id="lancamentosFlexisel">

						<?php //echo has_post_thumbnail() ? my_get_image(true) :  my_get_image_blank(true);?>

						<?php

							$args = array(

								'orderby'          => 'post_date',

								'order'            => 'DESC',

								'post_type'        => 'listings',

								'status'		   => 'lancamento',

								'post_status'      => 'publish',

								'suppress_filters' => true

							);



							$releases_array = get_posts($args);



							if ($releases_array)

							{

								foreach ($releases_array as $release)

								{

									$release_locale = '';

									$release_title = $release->post_title;

									$release_room = '';

									$release_metreage = '';

									$release_url = get_bloginfo('url') . '\/imovel/' . $release->post_name;

								    

							        $locales = get_the_terms($release->ID, 'locale');



							        if ( !empty($locales) )

							        {

							            foreach ($locales as $locale)

							            {

							                $release_locale = $locale->name; 

							            }

							        }



							        $rooms = get_the_terms($release->ID, 'rooms');



							        if ( !empty($rooms) )

							        {

							            foreach ($rooms as $room)

							            {

							                $release_room = $room->name; 

							            }

							        }



							        $metreages = get_the_terms($release->ID, 'metreage');



							        if ( !empty($metreages) )

							        {

							            foreach ($metreages as $metreage)

							            {

							                $release_metreage = $metreage->name; 

							            }

							        }

						?>

									<li>

										<div class="image">

											<a href="<?php echo $release_url; ?>">

												<?php

													$img = wp_get_attachment_image_src(get_post_thumbnail_id($release->ID), array(240,180));

													$img = $img[0];

												?>

												<img src="<?php echo $img ?>" alt="" />


											</a>

										</div>

										<p class="locale"><?php echo $release_locale; ?></p>

										<p class="title"><?php echo $release_title; ?></p>

										<p class="room"><?php echo $release_room; ?></p>

										<p class="metreage"><?php echo $release_metreage; ?></p>

									</li>

						<?php

								}

							}

						?>

						</ul>

					</li>

					<li id="em-obrasTab">

						<ul id="em-obrasFlexisel">

						<?php //echo has_post_thumbnail() ? my_get_image(true) :  my_get_image_blank(true);?>

						<?php

							$args = array(

								'orderby'          => 'post_date',

								'order'            => 'DESC',

								'post_type'        => 'listings',

								'status'		   => 'em-obras',

								'post_status'      => 'publish',

								'suppress_filters' => true

							);



							$buildings_array = get_posts($args);



							if ($buildings_array)

							{

								foreach ($buildings_array as $building)

								{

									$building_locale = '';

									$building_title = $building->post_title;

									$building_room = '';

									$building_metreage = '';

									$building_url = get_bloginfo('url') . '\/imovel/' . $building->post_name;

								    

							        $locales = get_the_terms($building->ID, 'locale');



							        if ( !empty($locales) )

							        {

							            foreach ($locales as $locale)

							            {

							                $building_locale = $locale->name; 

							            }

							        }



							        $rooms = get_the_terms($building->ID, 'rooms');



							        if ( !empty($rooms) )

							        {

							            foreach ($rooms as $room)

							            {

							                $building_room = $room->name; 

							            }

							        }



							        $metreages = get_the_terms($building->ID, 'metreage');



							        if ( !empty($metreages) )

							        {

							            foreach ($metreages as $metreage)

							            {

							                $building_metreage = $metreage->name; 

							            }

							        }

						?>

									<li>

										<div class="image">

											<a href="<?php echo $building_url; ?>">

												<?php

													$img = wp_get_attachment_image_src(get_post_thumbnail_id($building->ID), array(240,180));

													$img = $img[0];

												?>

												<img src="<?php echo $img ?>" alt="" />

											</a>

										</div>

										<p class="locale"><?php echo $building_locale; ?></p>

										<p class="title"><?php echo $building_title; ?></p>

										<p class="room"><?php echo $building_room; ?></p>

										<p class="metreage"><?php echo $building_metreage; ?></p>

									</li>

						<?php

								}

							}

						?>

						</ul>

					</li>

					<li id="prontos-para-morarTab">

						<ul id="prontos-para-morarFlexisel">

						<?php //echo has_post_thumbnail() ? my_get_image(true) :  my_get_image_blank(true);?>

						<?php

							$args = array(

								'orderby'          => 'post_date',

								'order'            => 'DESC',

								'post_type'        => 'listings',

								'status'		   => 'pronto-para-morar',

								'post_status'      => 'publish',

								'suppress_filters' => true

							);



							$keys_array = get_posts($args);



							if ($keys_array)

							{

								foreach ($keys_array as $key)

								{

									//$release_taxonomies = get_object_taxonomies('listings');

									$key_locale = '';

									$key_title = $key->post_title;

									$key_room = '';

									$key_metreage = '';

									$key_url = get_bloginfo('url') . '\/imovel/' . $key->post_name;

								    

							        $locales = get_the_terms($key->ID, 'locale');



							        if ( !empty($locales) )

							        {

							            foreach ($locales as $locale)

							            {

							                $key_locale = $locale->name; 

							            }

							        }



							        $rooms = get_the_terms($key->ID, 'rooms');



							        if ( !empty($rooms) )

							        {

							            foreach ($rooms as $room)

							            {

							                $key_room = $room->name; 

							            }

							        }



							        $metreages = get_the_terms($key->ID, 'metreage');



							        if ( !empty($metreages) )

							        {

							            foreach ($metreages as $metreage)

							            {

							                $key_metreage = $metreage->name; 

							            }

							        }

						?>

									<li>

										<div class="image">

											<a href="<?php echo $key_url; ?>">

												<?php

													$img = wp_get_attachment_image_src(get_post_thumbnail_id($key->ID), array(240,180));

													$img = $img[0];

												?>

												<img src="<?php echo $img ?>" alt="" />

											</a>

										</div>

										<p class="locale"><?php echo $key_locale; ?></p>

										<p class="title"><?php echo $key_title; ?></p>

										<p class="room"><?php echo $key_room; ?></p>

										<p class="metreage"><?php echo $key_metreage; ?></p>

									</li>

						<?php

								}

							}

						?>

						</ul>

					</li>

				</ul>

			</div>

		</div>

	</div>

	<div id="content">

		<?php

			if ( is_active_sidebar('home_content') )

			{

		?>

				<div class="row home-content hide-for-small">

					<div class="twelve columns">

						<?php dynamic_sidebar('home_content') ?>

					</div>

				</div>

		<?php

			}

		?>

		<div class="row blog">

			<div class="twelve columns">

			<div class="three columns nopadding title">

				<a href="<?php bloginfo('url') ?>/blog">
					<h3 class="ilu home">Blog</h3>
				</a>

			</div>

			<?php

				$args = array(

					'posts_per_page'   => 3,

					'offset'           => 0,

					'category'         => 'blog',

					'orderby'          => 'post_date',

					'order'            => 'DESC',

					'include'          => '',

					'exclude'          => '',

					'meta_key'         => '',

					'meta_value'       => '',

					'post_type'        => 'post',

					'post_mime_type'   => '',

					'post_parent'      => '',

					'post_status'      => 'publish',

					'suppress_filters' => true

				);



				$posts_array = get_posts($args);



				if (sizeof($posts_array) <= 1)

					$columns = "nine";

				else if (sizeof($posts_array) == 2)

					$columns = "four";

				else

					$columns = "three";

				

				if ($posts_array)

				{

					foreach ($posts_array as $post_array)

					{

			?>

						<div class="<?php echo $columns ?> columns box">

							<small><?php echo date('d/m/Y', strtotime($post_array->post_date)); ?></small>

							<a href="<?php echo get_permalink($post_array->ID) ?>"><h5><?php echo $post_array->post_title; ?></h5></a>

							<a href="<?php echo get_permalink($post_array->ID) ?>"><p><?php echo $post_array->post_excerpt; ?></p></a>

							<a href="<?php echo get_permalink($post_array->ID) ?>" class="ico more hide-for-small">Mais</a>

						</div>

			<?php

					}

				}

				else

				{

			?>

					Nenhum conteúdo encontrado.

			<?php

				}



				wp_reset_query();

			?>

			</div>

		</div>

		<div class="row links">

			<div class="twelve columns">

			<ul class="block-grid four-up centered">

				<li>

					<a href="<?php echo get_permalink(get_page_by_path('venda-seu-terreno')) ?>">

						<img class="hide-for-small" src="<?php echo  bloginfo('template_directory'); ?>/images/img-venda-terreno.jpg" alt="Venda seu terreno" />

						<img class="show-for-small" src="<?php echo  bloginfo('template_directory'); ?>/images/img-venda-terreno-ico.png" alt="Venda seu terreno" />

						<p class="hide-for-small">Venda<br>seu terreno</p>

					</a>

				</li>

				<li>

					<!--

					<a href="<?php echo get_permalink(get_page_by_path('investidores')) ?>">

						<img class="hide-for-small" src="<?php echo  bloginfo('template_directory'); ?>/images/img-calc-fin.jpg" alt="Calcule financiamento" />

						<img class="show-for-small" src="<?php echo  bloginfo('template_directory'); ?>/images/img-calc-fin-ico.png" alt="Calcule financiamento" />

						<p class="hide-for-small">Oportunidade<br>para investidores</p>

					</a>-->

					<a href="<?php echo get_permalink(get_page_by_path('investidores')) ?>">

						<img class="hide-for-small" src="<?php echo  bloginfo('template_directory'); ?>/images/img-calc-fin.jpg" alt="Calcule financiamento" />

						<img class="show-for-small" src="<?php echo  bloginfo('template_directory'); ?>/images/img-calc-fin-ico.png" alt="Calcule financiamento" />

						<p class="hide-for-small">Oportunidade<br>para investidores</p>

					</a>

				</li>

				<li>

					<a href="<?php echo get_permalink(get_page_by_path('tire-suas-duvidas')) ?>">

						<img class="hide-for-small" src="<?php echo  bloginfo('template_directory'); ?>/images/img-duvidas.jpg" alt="Tire suas dúvidas" />

						<img class="show-for-small" src="<?php echo  bloginfo('template_directory'); ?>/images/img-duvidas-ico.png" alt="Tire suas dúvidas" />

						<p class="hide-for-small fix">Tire suas dúvidas</p>

					</a>

				</li>

				<li>

					<a href="http://ekoconstrutora.com/mapa/" target="_blank">

						<img class="hide-for-small" src="<?php echo  bloginfo('template_directory'); ?>/images/img-nav-map.jpg" alt="Navegue pelo mapa" />

						<img class="show-for-small" src="<?php echo  bloginfo('template_directory'); ?>/images/img-duvidas-ico.png" alt="Tire suas dúvidas" />

						<p class="hide-for-small">Navegue<br>pelo mapa</p>

					</a>

				</li>

			</ul>

			</div>

		</div>

	</div><!--end content-->

<?php get_footer();?>