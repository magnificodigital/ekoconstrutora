<?php session_start();
/*
Template Name: Listings Search Results
*/
?>
<?php get_header();?>
<div id="wrap">
<div id="search-form">
	<?php if(!is_paged()):
		include (TEMPLATEPATH . '/search-form-listings.php');
		endif;
	?>
</div>
<?php  
$list = array();
$item = array();  
if($_POST){
	foreach($_POST as $key => $value){
		if($value != ''){
			$item['taxonomy'] = htmlspecialchars($key);
			$item['terms'] = htmlspecialchars($value);
			$item['field'] = 'slug';
			$list[] = $item;
		}		
	}
	$_SESSION['eko-search'] = !empty($list) ? $list : array();
}
$search = !empty($_SESSION['eko-search']) ? $_SESSION['eko-search'] : array();
$cleanArray = array_merge(array('relation' => 'AND'), $search);
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args['post_type'] = 'listings';
$args['showposts'] = 8;
$args['paged'] = $paged;  
$args['tax_query'] = $cleanArray; 

$the_query = new WP_Query( $args );
?>
<div class="row">
	<div id="content" class="twelve columns">
	<?php //echo ($the_query->found_posts > 0) ? '<h3 class="foundPosts">' . $the_query->found_posts. ' listings found</h3>' : '<h3 class="foundPosts">We found no results</h3>';?>
	<div class="">
		<?php $x = 1; ?>		  
		<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
		<?php
			$listings_locales = get_the_terms($post->ID, 'locale');
			if ($listings_locales != '')
			{
				foreach ($listings_locales as $listings_locale)
				{
					$locale = $listings_locale->name;
				}
			}

			$listings_rooms = get_the_terms($post->ID, 'rooms');
			if ($listings_rooms != '')
			{
				foreach ($listings_rooms as $listings_room) 
				{
					$room = $listings_room->name;
				}
			}
			else
			{
				$listings_types = get_the_terms($post->ID, 'type');
				if ($listings_types != '')
				{
					foreach ($listings_types as $listings_type)
					{
						$room = $listings_type->name;
					}
				}
			}

			$listings_metreages = get_the_terms($post->ID, 'metreage');

			if ($listings_metreages != '')
			{
				foreach ($listings_metreages as $listings_metreage)
				{
					$metreage = $listings_metreage->name;
				}
			}

			$listings_statuses = get_the_terms($post->ID, 'status');
			if ($listings_statuses != '')
			{
				foreach ($listings_statuses as $listings_status)
				{
					$status = $listings_status->name;
					$status_class = $listings_status->slug;
				}
			}

			$listings_prices = get_the_terms($post->ID, 'price');
			if ($listings_prices != '')
			{
				foreach ($listings_prices as $listings_price)
				{
					$price = $listings_price->name;
				}
			}
		?>
		<div class="twelve columns listings-box-search <?php echo $x == $the_query->found_posts ? 'end' : ''; ?>">
			<span class="ilu-status <?php echo $status_class ?>"><?php echo $status; ?></span>
			<div class="four columns image">
				<div class="hide-for-small">
					<?php echo has_post_thumbnail() ? my_get_image(true) :  my_get_image_blank();?>
				</div>
				<div class="show-for-small">
					<?php echo has_post_thumbnail() ? my_get_image() :  my_get_image_blank();?>
				</div>
			</div>
			<div class="one columns hide-for-small">
				<?php
					$media_values = get_post_meta($post->ID, 'mgop_media_value', true);

					if ($media_values['mgop_mb_galeria-de-fotos'])
					{
						$media_values = $media_values['mgop_mb_galeria-de-fotos'];

						foreach ($media_values as $index => $media_value)
						{
							if ($index <= 1)
								echo wp_get_attachment_image($media_value, 'thumbnail');
							else
								break;
						}
					}
				?>
			</div>
			<div class="four columns">
				<p class="locale"><?php echo $locale; ?></p> 
				<h1><?php the_title();?></h1>
				<p class="room"><?php echo $room; ?></p>
				<p class="metreage"><?php echo $metreage; ?></p>
				<?php the_excerpt(); ?>
			</div>
			<div class="three columns">
				<div class="box">
					<div class="title">
						<small>a partir de:</small>
						<p><strong>R$ <?php echo $price ?></strong></p>
					</div>
					<div class="box-content">
						<div class="row">
							<div class="twelve columns">
								<a href="<?php the_permalink(); ?>" class="btn green">Saiba mais</a>
							</div>
						</div>
						<div class="row">
							<div class="twelve columns">
								<?php
									if ($status == "Últimas unidades")
									{
										$text = "Garanta já o seu";
										$class = "red";
									}
									else
									{
										$text = "Oportunidade Única";
										$class = "";
									}
								?>
								<a href="<?php the_permalink(); ?>" class="btn big uppercase-none <?php echo $class ?>"><?php echo $text ?></a>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>		
		<?php $x++; ?>
		<?php endwhile; wp_reset_postdata();?>		 
	</div>
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
</div>
<?php get_footer();?>