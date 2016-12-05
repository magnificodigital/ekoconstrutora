<?php get_header();?>

<?php 
$the_post_image = '';
$the_post_terms = array();
$the_post_title = '';
$the_post_link  = '';

if (have_posts()) :
	while (have_posts()) : the_post();
		$the_post_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(9999, 9999));
		$the_post_image = $the_post_image[0];

		$the_post_title = $post->post_title;

		$the_post_taxonomies = get_object_taxonomies('listings');
		foreach ($the_post_taxonomies as $the_post_taxonomy)
	    {
	        $the_post_terms = get_the_terms( $post->ID, $the_post_taxonomy );

	        if ( !empty( $the_post_terms ) )
	        {
	            foreach ( $the_post_terms as $the_post_term )
	            {
	                switch ($the_post_term->taxonomy) {
	                	case 'locale':
	                		$the_post_terms_locale = $the_post_term->name;
	                		break;
	                	case 'metreage':
	                		$the_post_terms_metreage = $the_post_term->name;
	                		break;
	                	case 'rooms':
	                		$the_post_terms_rooms = $the_post_term->name;
	                		break;
	                }
	            }
	        }
	    }
?>
		<div class="homepage-bg" style="background: url(<?php echo $the_post_image; ?>); background-size: cover;">
			<div class="row">
				<div class="six columns">
					<div class="text">
						<p class="locale"><?= $the_post_terms_locale ?></p>
						<h2><?= $the_post_title ?></h2>
						<p class="room"><?= $the_post_terms_rooms ?></p>
						<p class="metreage"><?= $the_post_terms_metreage ?></p>
					</div>
				</div>
			</div>
		</div>
<?php 
	endwhile;
endif;
?>
<div id="breadcrumb">
	<div class="row">
		<div class="twelve columns">
			<?php the_breadcrumb(); ?>
		</div>
	</div>
</div>
<div id="wrap">
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post();?>
			<div id="info" class="row">
				<div class="eight columns">
					<h4>Sobre o Imóvel</h4>
					<?php the_content();?>
				</div>
				<div class="four columns">
					<div class="box">
						<div class="title">
							<?php
								$listings_prices = get_the_terms($post->ID, 'price');

								if ($listings_prices != '')
								{
									foreach ($listings_prices as $listings_price) {
										$price = $listings_price->name;
									}
								}
							?>
							<small>a partir de:</small>
							<p><strong>R$ <?php echo $price ?></strong></p>
						</div>
						<?php
								$listings_statuses = get_the_terms($post->ID, 'status');

								if ($listings_statuses != '')
								{
									foreach ($listings_statuses as $listings_status) {
										$status = $listings_status->name;
									}
								}
							?>
						<p class="btn green"><?php echo $status; ?></p>
						<a href="#contact" class="btn uppercase-none">Interessado? Fale Conosco</a>
					</div>
				</div>
			</div>
			<div id="terms">
				<div class="row">
					<div class="twelve columns">
						<h3>PRINCIPAIS CARACTERÍSTICAS</h3>
						<?php
							$listings_areas = get_the_terms($post->ID, 'area');

							$listings_area_private = array();
							$listings_area_comum = array();
							$listings_area_geral = array();

							if ($listings_areas != '')
							{
								foreach ($listings_areas as $listings_area)
								{
									$area_parent_id = $listings_area->parent;
									$area_name = $listings_area->name;

									switch ($area_parent_id)
									{
										case '59':
											//area privativa
											array_push($listings_area_private, $area_name);
											break;
										case '60':
											//area comum
											array_push($listings_area_comum, $area_name);
											break;
										case '61':
											//area geral
											array_push($listings_area_geral, $area_name);
											break;
									}
								}
							}
							

							$listings_metreages = get_the_terms($post->ID, 'metreage');
							if ($listings_metreages != '')
							{
								foreach ($listings_metreages as $listings_metreage)
								{
									$metreage_name = $listings_metreage->name;
									array_unshift($listings_area_private, $metreage_name);
								}	
							}

							$listings_rooms = get_the_terms($post->ID, 'rooms');
							if ($listings_rooms != '')
							{
								foreach ($listings_rooms as $listings_room)
								{
									$room_name = $listings_room->name;
									array_unshift($listings_area_private, $room_name);
								}
							}
						?>						
						<div class="three columns item">
							<h4>Área Privativa</h4>
							<ul>
								<?php
									foreach ($listings_area_private as $value)
									{
										echo '<li>' . $value . '</li>';
									}
								?>
							</ul>
						</div>
						<div class="three columns item">
							<h4>Área Comum</h4>
							<ul>
								<?php
									foreach ($listings_area_comum as $value)
									{
										echo '<li>' . $value . '</li>';
									}
								?>
							</ul>
						</div>
						<div class="three columns item">
							<h4>Área Geral</h4>
							<ul>
								<?php
									foreach ($listings_area_geral as $value)
									{
										echo '<li>' . $value . '</li>';
									}
								?>
							</ul>
						</div>
						<div class="three columns"></div>
					</div>
				</div>
			</div>

			<div id="tour-360">
				<div class="row">
					<div class="twelve columns">
						<?php
						$embed = the_field('embed_360');
						echo htmlentities($embed); ?>
					 </div>
				 </div>
			</div>

			<div id="map-locale" class="row">
				<div class="four columns">
					<h3>LOCALIZAÇÃO DO IMÓVEL</h3>
					<?php
						$listings_address = get_post_meta($post->ID, 'eko_address');
						$listings_address = array_shift($listings_address);

						if ($listings_address == '')
						{
							 $listings_address = 'Endereço não informado';
						}
					?>
					<p><?php echo $listings_address?></p>
				</div>
				<div class="eight columns">
					<div class="map">
						<div id="canvas">
							<?php
								$listings_coord = get_post_meta($post->ID, 'eko_coord', true);

								if ($listings_coord == '')
								{
									$listings_coord = '-23.3964516,-46.3214444';
								}
							?>
							<script type="text/javascript">
								var map;
								function initialize()
								{
									var mapOptions = {
										zoom: 15,
										center: new google.maps.LatLng(<?php echo $listings_coord ?>),
		    							streetViewControl: false,
									};

									map = new google.maps.Map(document.getElementById('canvas'), mapOptions);

							        var marker = new google.maps.Marker({
										position: new google.maps.LatLng(<?php echo $listings_coord ?>),
										icon: '<?php bloginfo("template_directory");?>/images/map-icon.png',
										map: map,
										clickable: false,
										draggable: true,
										flat: true
									});
								}

								google.maps.event.addDomListener(window, 'load', initialize);
							</script>
						</div>
					</div>
				</div>
			</div>
			<div id="gallery">
				<div id="gallery-tabs" class="row">
					<div class="twelve columns">
						<dl class="tabs two-up">
							<dd class="active">
								<a href="#galleryOne">
									<h3 class="photo">
										<span class="ico photo hide-for-small"></span>
										Galeria de Fotos
									</h3>
								</a>
							</dd>
							<dd>
								<a href="#galleryTwo">
									<h3 class="flat-map">
										<span class="ico flat-map hide-for-small"></span>
										Plantas Humanizadas
									</h3>
								</a>
							</dd>
						</dl>
					</div>
				</div>
				<div id="gallery-tabs-content">
					<div class="row">
						<div class="twelve columns">
							<ul class="tabs-content">
								<li class="active" id="galleryOneTab">
									<ul id="galleryOneFlexisel">
									<?php
										$media_values = get_post_meta($post->ID, 'mgop_media_value', true);

										if ($media_values['mgop_mb_galeria-de-fotos'])
										{
											$media_values = $media_values['mgop_mb_galeria-de-fotos'];

											foreach ($media_values as $media_value)
											{
												$src_thumb = wp_get_attachment_image_src($media_value, 'large');
												$src_thumb = $src_thumb[0];

												echo '<li>';
												echo '<a rel="galleryOne" href="' . $src_thumb . '">';
												echo wp_get_attachment_image($media_value, 'thumbnail');
												echo '</a>';
												echo '</li>';
											}
										}
									?>
									</ul>
								</li>
								<li id="galleryTwoTab">
									<ul id="galleryTwoFlexisel">
									<?php
										$media_values = get_post_meta($post->ID, 'mgop_media_value', true);

										if ($media_values['mgop_mb_plantas-humanizadas'])
										{
											$media_values = $media_values['mgop_mb_plantas-humanizadas'];

											foreach ($media_values as $media_value)
											{
												$src_thumb = wp_get_attachment_image_src($media_value, 'large');
												$src_thumb = $src_thumb[0];

												echo '<li>';
												echo '<a rel="galleryTwo" href="' . $src_thumb . '">';
												echo wp_get_attachment_image($media_value, 'thumbnail');
												echo '</a>';
												echo '</li>';
											}
										}
									?>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div id="status" class="row">
				<div class="twelve columns">
					<h3>STATUS DA OBRA</h3>
				</div>
				<div class="eight columns">
					<form>
					<?php
						$listings_excavation = get_post_meta($post->ID, 'eko_excavation', true);
						($listings_excavation != '') ? '' : $listings_excavation = '0%';
						$listings_foundation = get_post_meta($post->ID, 'eko_foundation', true);
						($listings_foundation != '') ? '' : $listings_foundation = '0%';
						$listings_structure = get_post_meta($post->ID, 'eko_structure', true);
						($listings_structure != '') ? '' : $listings_structure = '0%';
						$listings_masonry = get_post_meta($post->ID, 'eko_masonry', true);
						($listings_masonry != '') ? '' : $listings_masonry = '0%';
						$listings_external = get_post_meta($post->ID, 'eko_external', true);
						($listings_external != '') ? '' : $listings_external = '0%';
						$listings_internal = get_post_meta($post->ID, 'eko_internal', true);
						($listings_internal != '') ? '' : $listings_internal = '0%';

						$listings_statuses = array(
							array('name' => 'Escavação', 'value' => $listings_excavation),
							array('name' => 'Fundação', 'value' => $listings_foundation),
							array('name' => 'Estrutura', 'value' => $listings_structure),
							array('name' => 'Alvenaria', 'value' => $listings_masonry),
							array('name' => 'Acabamento Externo', 'value' => $listings_external),
							array('name' => 'Acabamento Interno', 'value' => $listings_internal)
						);

						foreach ($listings_statuses as $listings_status)
						{
					?>
							<div class="row">
								<div class="three columns">
									<label class="right"><?php echo $listings_status['name']; ?></label>
								</div>
								<div class="six columns chart">
					<?php
							for ($i = 0; $i <= 19; $i++)
							{
								$class = '';
								
								echo '<script>console.log("'.$listings_status['value'].'")</script>';

								if ($i < ($listings_status['value'] / 5))
									$class = 'full';
								else
									$class = '';

								echo '<span class="' . $class . '"></span>';
							}
					?>
								</div>
								<div class="three columns">
									<label><?php echo $listings_status['value']; ?></label>
								</div>
							</div>
					<?php		
						}
					?>
					</form>
				</div>
				<div class="four columns">
					<?php
						$listings_begin_const = get_post_meta($post->ID, 'eko_beginning_construction', true);
						($listings_begin_const != '') ? '' : $listings_begin_const = 'Sem previsão';
						$listings_end_const = get_post_meta($post->ID, 'eko_end_construction', true);
						($listings_end_const != '') ? '' : $listings_end_const = 'Sem previsão';
					?>
					<div class="dates">
						<div class="date">
							<span class="ico time alignleft"></span>
							<p class="alignleft"><small>Início das Obras:</small><br><?php echo $listings_begin_const ?></p>
						</div>
						<div class="date">
							<span class="ico time alignleft"></span>
							<p class="alignleft"><small>Previsão de Entrega:</small><br><?php echo $listings_end_const ?></p>
						</div>
					</div>
					<?php
						$media_values = get_post_meta($post->ID, 'mgop_media_value', true);

						if ($media_values['mgop_mb_obras'])
						{
					?>
							<a href="#" id="fotosObras" class="btn grey">Veja as fotos da obra</a>
					<?php
						}
					?>
				</div>
			</div>
			<div id="contact" class="row">
				<div class="twelve columns">
					<h3>INTERESSADO? Fale Conosco</h3>
				</div>
				<?php include(TEMPLATEPATH . '/contact-form-listings.php'); ?>
				<div class="four columns">
					<p>Envie a sua mensagem. Entraremos em contato o mais breve possível.</p>
					<?php 
						$listings_download = get_post_meta($post->ID, 'eko_download', true);

						if ($listings_download != '')
						{
					?>
							<a href="<?php echo $listings_download; ?>" target="_blank" class="download">Download do material completo do empreendimento</a>
					<?php
						}
					?>
				</div>
			</div>
	<?php endwhile;?>
<?php endif;?>
</div>

<script type="text/javascript" src="https://d335luupugsy2.cloudfront.net/js/integration/stable/rd-js-integration.min.js"></script>  
<script type="text/javascript">
    var meus_campos = {
        'txtEmail': 'email',
        'txtNomeCompleto': 'nome',
        'txtDddTelefone': 'DDD - Telefone',
        'txtTelefone': 'DDD - Telefone',
        'txtDddCelular': 'DDD - Celular',
        'txtCelular': 'celular',
        'txtMensagem': 'Mensagem'
     };
    options = { fieldMapping: meus_campos };
    RdIntegration.integrate('5bc74d9a15dc71ab1bd0bc162ae544d5', 'Imóveis', options);  
</script>

<?php get_footer();?>