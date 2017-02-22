<?php
function myDir()
{
	return get_bloginfo('template_directory');
}
function replace_excerpt($content)
{
	return str_replace('[...]',
		   '<br /><a class="small button continue" href="'. get_permalink() .'">Continue Reading</a>',
		   $content
	);
}
function getPhotoAttachements($id)
{
	$args = array(
		'post_type' => 'attachment',
		'orderby' => 'menu_order',
		'order' => ASC,
		'numberposts' => -1,
		'post_status' => null,
		'post_parent' => $id
	);
	return get_posts($args);
}
function isFullWidth()
{
	global $post;
	$x = get_post_meta($post->ID, 'eko_selectPageLayout', true);

	if($x == 'full width')
	{
		return true;
	}
	elseif($x == 'sidebar')
	{
		return false;
	}
	else
	{
		return false;
	}
}
function buildSelect($tax)
{
	$terms = get_terms($tax);
	$term = get_taxonomy($tax);
	$x = '<select name="'. $tax .'">';
	$x .= '<option value="">'. $term->label .'</option>';
	foreach ($terms as $term) {
	   $x .= '<option value="' . $term->slug . '">' . $term->name . '</option>';	
	}
	$x .= '</select>';
	return $x;
}
function my_get_image($short=false)
{
	global $post;
	$h = ($short == false) ? '600' : '200';
	$w = ($short == false) ? '900' : '300';

	$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(9999, 9999));							
	$img = '<a href="' . get_permalink() . '">';
	$img .= '<img src="' . myDir() . '/scripts/resize.php?src=' . $src[0] . '&amp;w=' . $w . '&amp;h=' . $h . '&amp;q=100" alt="" />';
	$img .= '</a>';
	return $img;
}
function my_get_image_blank($short=false)
{
	$i = ($short == false) ? 'blank.gif' : 'blank-short.gif';
	$img = '<a href="' . get_permalink() . '">';
	$img .= '<img src="' . myDir() . '/images/' . $i . '" />';
	$img .= '</a>';
	return $img; 
}
function my_remove_menu_pages()
{
	global $current_user;

	if(!$current_user->caps['administrator'])
	{
		remove_menu_page('upload.php');
		remove_submenu_page('upload.php', 'media-new.php');
		//remove_submenu_page('upload.php', 'upload.php');
		wp_enqueue_style('style_admin', get_bloginfo('template_url') .'/style_admin.css');
	}
}
function my_login_logo()
{ ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>/images/logo.gif);
            background-size: 152px 70px;
            padding-bottom: 30px;
        }
    </style>
<?php 
}
function custom_excerpt_length( $length ) {
	return 20;
}
function custom_excerpt_trim( $excerpt ) {
	return str_replace( '[...]', '...', $excerpt );
}
function dummy_listings()
{
	$html  = '<div class="four columns listing">';
	$html .= '<div class="post-container short">';
	$html .= '<a href="#"><img src="' . myDir() . '/images/blank-short.gif" /></a>'; 
	$html .= '<h5><a href="#">100 Some Street</a></h5>';
	$html .= '<p>added August 12, 2012<a class="small button" href="#">&rarr;</a></p>';			 
	$html .= '</div></div>';
	return $html;
}
function the_breadcrumb( $post = null )
{
	echo '<a href="' . get_option('home') . '">Home</a> / ';

	if (is_category() || is_single() || is_tag())
	{		
		if ('listings' == get_post_type())
		{
			echo '<a href="' . get_permalink(get_page_by_path('imoveis')) . '">Imóveis</a>';
		}
		else if ('post' == get_post_type())
		{
			$category_blog = get_category_by_slug('blog');
			$category_blog = $category_blog->cat_ID;

			echo '<a href="' . get_category_link($category_blog) . '">Blog</a>';
		}

		//the_category(' / ');
		
		if (is_single())
		{
			echo " / ";
			the_title();
		}
	}
	elseif (is_page())
	{
		if ($post->post_parent != 0)
			echo '<a href="' . get_permalink($post->post_parent) . '">' . get_the_title($post->post_parent) . '</a> / ';

		echo the_title();
	}
	elseif (is_search())
	{
		echo 'busca';
	}
}
function remove_dashboard ()
{
	if (!current_user_can('level_10'))
	{
		global $menu, $submenu, $user_ID;

        $the_user = new WP_User($user_ID);
        reset($menu); $page = key($menu);
        while ((__('Dashboard') != $menu[$page][0]) && next($menu))
                $page = key($menu);
        if (__('Dashboard') == $menu[$page][0]) unset($menu[$page]);
        reset($menu); $page = key($menu);
        while (!$the_user->has_cap($menu[$page][1]) && next($menu))
                $page = key($menu);
        if (preg_match('#wp-admin/?(index.php)?$#',$_SERVER['REQUEST_URI']) && ('index.php' != $menu[$page][2]))
                wp_redirect(get_option('siteurl') . '/wp-admin/profile.php');
	}
}
function remove_media_view($actions, $page_object)
{
	unset($actions['view']);
	return $actions;
}
function add_media_download($actions, $post)
{
    /* Almost sure this is not necessary. Just in case... */
    global $current_screen;

    if ( 'upload' != $current_screen->id ) 
        return $actions; 
 
    // if not PDF file, return default $actions
    if ( 'application/pdf' != $post->post_mime_type )
        return $actions;
 
    // relative path/name of the file
    $the_file = str_replace(WP_CONTENT_URL, '.', $post->guid);
 
    // adding the Action to the Quick Edit row
    $actions['pre-view'] = '<a href="' . WP_CONTENT_URL . '/' . $the_file . '" target="_blank">Preview</a>';
    $actions['download'] = '<a href="' . WP_CONTENT_URL . '/download.php?file=' . $the_file . '">Download</a>';

    return $actions;    
}

if ( function_exists( 'add_theme_support' ) )
{
	add_theme_support( 'post-thumbnails' );	
}

if ( function_exists('register_sidebar') )
{
    register_sidebar(array(
    	'name' => 'Sidebar Left',
    	'id' => 'left_sidebar',
        'before_widget' => '<div class="sidebar-box">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title">',
        'after_title' => '</div>',
    ));
    register_sidebar( array(
		'name' => 'Sidebar Right',
		'id' => 'right_sidebar',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
	));
	register_sidebar( array(
		'name' => 'Home Content',
		'id' => 'home_content',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
	));
	register_sidebar( array(
		'name' => 'Sidebar Blog',
		'id' => 'blog_sidebar',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
	));
 }

function insert_jquery()
{
	wp_enqueue_script('jquery');
}
function register_my_menu()
{
	register_nav_menu('header-menu', __('Header Menu'));
	register_nav_menu('social-media', __('Social Media'));
	register_nav_menu('sitemap-menu1', __('Sitemap Institucional'));
	register_nav_menu('sitemap-menu2', __('Sitemap Imóveis'));
	register_nav_menu('sitemap-menu3', __('Sitemap Central de Atendimento'));
	register_nav_menu('sitemap-menu4', __('Sitemap Outros'));
	register_nav_menu('footer-menu1', __('Footer Construtora'));
	register_nav_menu('footer-menu2', __('Footer informações'));
	register_nav_menu('footer-menu3', __('Footer Para Você'));
}
function create_post_type_listings()
{
	register_post_type('listings',
		array(
			'labels' => array(
				'name' => __('Imóveis'),
				'singular_name' => __('Imóvel'),
				'menu_name' => 'Imóveis',
				'all_items' => 'Todos os Imóveis'
			),
		'public' => true,
		'rewrite' => array('slug' => 'imovel', 'with_front' => false),
		'has_archive' => true,		 
		'supports' => array('title', 'editor', 'excerpt', 'custom-fields', 'thumbnail'),
		'menu_position' => 6
		)
	);
}
function listings_taxonomy()
{
   	register_taxonomy(  
	'type',  
	'listings',  
	array(  
		'hierarchical' => true,  
		'label' => 'Tipo do imóvel',  
		'query_var' => true,
		'rewrite' => array('slug' => 'type')  
		)  	
	);
	register_taxonomy(  
	'rooms',  
	'listings',  
	array(  
		'hierarchical' => true,  
		'label' => 'Cômodos',  
		'query_var' => true,
		'rewrite' => array('slug' => 'rooms')  
		)  	
	);
	register_taxonomy(  
	'metreage',  
	'listings',  
	array(  
		'hierarchical' => true,  
		'label' => 'Metragem',  
		'query_var' => true,
		'rewrite' => array('slug' => 'metreage')  
		)  	
	);
	register_taxonomy(  
		'area',  
		'listings',  
		array(  
			'hierarchical' => true,  
			'label' => 'Área',  
			'query_var' => true,
			'rewrite' => array('slug' => 'area')  
		)  
	);
	register_taxonomy(  
		'locale',  
		'listings',  
		array(  
			'hierarchical' => true,  
			'label' => 'Localização',  
			'query_var' => true,
			'rewrite' => array('slug' => 'locale')  
		)  
	);
	register_taxonomy(  
		'price',  
		'listings',  
		array(  
			'hierarchical' => true,  
			'label' => 'Valor',  
			'query_var' => true,
			'rewrite' => array('slug' => 'price')  
		)  
	);
	register_taxonomy(  
	'status',  
	'listings',  
	array(  
		'hierarchical' => true,  
		'label' => 'Status da obra',  
		'query_var' => true,
		'rewrite' => array('slug' => 'status')  
		)  	
	);
}

//add_filter('the_excerpt', 'replace_excerpt');
add_filter('excerpt_length', 'custom_excerpt_length', 999);
add_filter('wp_trim_excerpt', 'custom_excerpt_trim');
add_filter('use_default_gallery_style', '__return_false');
add_filter('media_row_actions', 'add_media_download', 10, 2);
add_filter('media_row_actions', 'remove_media_view', 10, 2);
add_action('init', 'register_my_menu');
add_action('init', 'insert_jquery');
add_action('init', 'create_post_type_listings');
add_action('init', 'listings_taxonomy' );
add_action('login_enqueue_scripts', 'my_login_logo');
add_action('admin_menu', 'remove_dashboard');
add_action('admin_init', 'my_remove_menu_pages');
add_theme_support('post-thumbnails');
add_theme_support('menus');
remove_role('subscriber');
remove_role('author');
remove_role('editor');
remove_role('contributor');
add_role(
    'corretor',
    __('Corretor'),
    array(
        'read'         => true,
        'upload_files' => false,
        'delete_posts' => false,
		'edit_posts'   => false
    )
);
add_role(
    'investidor',
    __('Investidor'),
    array(
        'read'         => true,
        'upload_files' => false,
        'delete_posts' => false,
		'edit_posts'   => false
    )
);

//meta boxes in single post pages
$prefix = 'eko_'; 
$meta_box = array(
	'id' => 'my-meta-box',
	'title' => 'Options',
	'page' => 'listings', //show in listings custom post type only
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => 'Email para envido do form',
			'id' => $prefix . 'email_imovel',
			'type' => 'text'
		),
		array(
			'name' => 'Link corretores online',
			'id' => $prefix . 'corretores_online',
			'type' => 'text'
		),
		array(
			'name' => 'URL Material para download',
			'id' => $prefix . 'download',
			'type' => 'text'
		),	
		array(
			'name' => 'Localização do imóvel',
			'id' => $prefix . 'address',
			'type' => 'textarea'
		),
		array(
			'name' => 'Coordenada (long/lat)',
			'id' => $prefix . 'coord',
			'type' => 'text'
		),
		array(
			'name' => 'Início das Obras',
			'id' => $prefix . 'beginning_construction',
			'type' => 'text'
		),
		array(
			'name' => 'Previsão de Entrega',
			'id' => $prefix . 'end_construction',
			'type' => 'text'
		),
		array(
			'name' => 'Escavação',
			'id' => $prefix . 'excavation',
			'type' => 'select',
			'options' => array('0%', '5%', '10%', '15%', '20%', '25%', '30%', '35%', '40%', '45%', '50%', '55%', '60%', '65%', '70%', '75%', '80%', '85%', '90%', '95%', '100%')
		),
		array(
			'name' => 'Fundação',
			'id' => $prefix . 'foundation',
			'type' => 'select',
			'options' => array('0%', '5%', '10%', '15%', '20%', '25%', '30%', '35%', '40%', '45%', '50%', '55%', '60%', '65%', '70%', '75%', '80%', '85%', '90%', '95%', '100%')
		),
		array(
			'name' => 'Estrutura',
			'id' => $prefix . 'structure',
			'type' => 'select',
			'options' => array('0%', '5%', '10%', '15%', '20%', '25%', '30%', '35%', '40%', '45%', '50%', '55%', '60%', '65%', '70%', '75%', '80%', '85%', '90%', '95%', '100%')
		),
		array(
			'name' => 'Alvenaria',
			'id' => $prefix . 'masonry',
			'type' => 'select',
			'options' => array('0%', '5%', '10%', '15%', '20%', '25%', '30%', '35%', '40%', '45%', '50%', '55%', '60%', '65%', '70%', '75%', '80%', '85%', '90%', '95%', '100%')
		),
		array(
			'name' => 'Acabamento Externo',
			'id' => $prefix . 'external',
			'type' => 'select',
			'options' => array('0%', '5%', '10%', '15%', '20%', '25%', '30%', '35%', '40%', '45%', '50%', '55%', '60%', '65%', '70%', '75%', '80%', '85%', '90%', '95%', '100%')
		)
		,
		array(
			'name' => 'Acabamento Interno',
			'id' => $prefix . 'internal',
			'type' => 'select',
			'options' => array('0%', '5%', '10%', '15%', '20%', '25%', '30%', '35%', '40%', '45%', '50%', '55%', '60%', '65%', '70%', '75%', '80%', '85%', '90%', '95%', '100%')
		)
	)
);
function mytheme_show_box()
{
	global $meta_box, $post; 
	// Use nonce for verification
	echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';	 
	echo '<table class="form-table">';	 
	foreach ($meta_box['fields'] as $field)
	{
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);	 
		echo '<tr>',
		'<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
		'<td>';
		switch ($field['type']) {
			case 'text':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />', $field['desc'];
			break;
			case 'textarea':
				echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
			break;
			case 'select':
				echo '<select name="', $field['id'], '" id="', $field['id'], '">';
				foreach ($field['options'] as $option) {
					echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
				}
				echo '</select>';
			break;
			case 'radio':
				foreach ($field['options'] as $option) {
					echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
				}
			break;
			case 'checkbox':
				echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
			case 'file':
				echo '<input type="file" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' "' : '', ' />';
			break;
		}
		echo '<td>',
		'</tr>';
	}
	echo '</table>';
}
function mytheme_save_data($post_id)
{
	global $meta_box; 
	// verify nonce
	if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	} 
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	} 
	// check permissions
	if ('page' == $_POST['post_type'])
	{
		if (!current_user_can('edit_page', $post_id))
		{
			return $post_id;
		}
	} 
	elseif (!current_user_can('edit_post', $post_id))
	{
		return $post_id;
	}

	foreach ($meta_box['fields'] as $field)
	{
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];

		if ($new && $new != $old)
		{
			update_post_meta($post_id, $field['id'], $new);
		}
		elseif ('' == $new && $old)
		{
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}
function mytheme_add_box()
{
	global $meta_box; 
	add_meta_box($meta_box['id'], $meta_box['title'], 'mytheme_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}

add_action('admin_menu', 'mytheme_add_box');
add_action('save_post', 'mytheme_save_data');

?>
<?php //theme options - no other code beyond this line
$themename = "EKO";
$shortname = "eko";
$options = array (
array(
	"name" => "E-mail Settings",
	"type" => "sub-title"),
array(
	"type" => "open"
	),
array(
	"name" => "Agende uma Visita",
	"desc" => "Preencha o campo acima com o email para Agende um Visita.",
	"id" => $shortname."_email_contact_visit",
	"type" => "text",
	"std" => ''
	),
array(
	"name" => "Ligamos para Você",
	"desc" => "Preencha o campo acima com o email para Ligamos para Você.",
	"id" => $shortname."_email_contact_call",
	"type" => "text",
	"std" => ''
	),
array(
	"name" => "Imóveis",
	"desc" => "Preencha o campo acima com o email para Imóveis.",
	"id" => $shortname."_email_contact_listings",
	"type" => "text",
	"std" => ''
	),
array(
	"name" => "Venda de Terreno",
	"desc" => "Preencha o campo acima com o email para Vendas de Terrenos.",
	"id" => $shortname."_email_contact_sell",
	"type" => "text",
	"std" => ''
	),
array(
	"name" => "Financiamento",
	"desc" => "Preencha o campo acima com o email para Simulação do Financiamento.",
	"id" => $shortname."_email_contact_fin",
	"type" => "text",
	"std" => ''
	),
array(
	"type" => "close"
	),
array(
	"name" => "Fale Conosco Settings",
	"type" => "sub-title"),
array(
	"type" => "open"
	),
array(
	"name" => "Assuntos",
	"desc" => "Preencha o campo acima com o os assuntos e emails para o formulário de fale conosco.<br><em>Ex.: Negócios:neg@ekoarq.com.br;</em>",
	"id" => $shortname."_contact_subject",
	"type" => "textarea",
	"std" => ''
	),
array(
	"type" => "close"
	),
array(
	"name" => "Agende uma visita Settings",
	"type" => "sub-title"),
array(
	"type" => "open"
	),
array(
	"name" => "Assuntos",
	"desc" => "Preencha o campo acima com o os assuntos e emails para o formulário de agende uma visita.<br><em>Ex.: Negócios:neg@ekoarq.com.br;</em>",
	"id" => $shortname."_visit_subject",
	"type" => "textarea",
	"std" => ''
	),
array(
	"type" => "close"
	),
array(
	"name" => "Ligamos para você Settings",
	"type" => "sub-title"),
array(
	"type" => "open"
	),
array(
	"name" => "Assuntos",
	"desc" => "Preencha o campo acima com o os assuntos e emails para o formulário de ligamos para você.<br><em>Ex.: Negócios:neg@ekoarq.com.br;</em>",
	"id" => $shortname."_call_subject",
	"type" => "textarea",
	"std" => ''
	),
array(
	"type" => "close"
	),
array(
	"name" => "Header Settings",
	"type" => "sub-title"),
array(
	"type" => "open"
	),
array(
	"name" => "Favicon Url",
	"desc" => "Preencha o campo acima com a url do novo favicon ou deixe em branco pra usar o icone padrão.",	
	"id" => $shortname."_favIconUrl",
	"type" => "text",
	"std" => ''
	),
array(
	"type" => "close"
	),
array(
	"name" => "Footer Settings",
	"type" => "sub-title"),
array(
	"type" => "open"
	),
array(
	"name" => "Footer Text",
	"desc" => "Preencha o campo acima com as informações que deseja ser exibida em todas as páginas.",
	"id" => $shortname."_footerText",
	"type" => "text",
	"std" => ''
	),
array(
	"type" => "close"
	)				
);

//presentation//

function mytheme_add_admin()
{
	global $themename, $shortname, $options;
	 
	if ( $_GET['page'] == basename(__FILE__) ) {
	 
	if ( 'save' == $_REQUEST['action'] ) {
	 
	foreach ($options as $value) {
	update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
	 
	foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
	 
	header("Location: themes.php?page=functions.php&saved=true");
	die;
	 
	} else if( 'reset' == $_REQUEST['action'] ) {
	 
	foreach ($options as $value) {
	delete_option( $value['id'] ); }
	 
	header("Location: themes.php?page=functions.php&reset=true");
	die;
	 
	}
	}
	add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
 
function mytheme_admin()
{
 
	global $themename, $shortname, $options;
	 
	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
	 
	?>
	<div class="wrap">
	<h2><?php echo $themename; ?> Settings</h2>
	<form method="post">
		<?php foreach ($options as $value)
		{
			switch ( $value['type'] ) 
			{
				case "open":
				?>
				<table width="100%" border="0" style="background-color:#eef5fb; padding:10px;">
				<?php break;
				case "close":
				?>
				</table><br />
				<?php break;
				case "title":
				?>
				<table width="100%" border="0" style="background-color:#dceefc; padding:5px 10px;"><tr>
				<td valign="top" colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
				</tr>
				<!--custom-->
				<?php break; 
				case "sub-title":
				?>
				<h3 style="font-family:'Abel', Georgia,'Times New Roman',Times,serif; font-size:20px; padding-left:8px;"><?php echo $value['name']; ?></h3> 
				<!--end-of-custom-->
				<?php break;
				case 'text':
				?>
				<tr>
				<td valign="top" width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
				<td width="80%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
				</tr>
				<tr>
				<td><small><?php echo $value['desc']; ?></small></td>
				</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
				<?php
				break;
				case 'textarea':
				?>
				<tr>
				<td valign="top" width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
				<td width="80%">
					<textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo ( get_option( $value['id'] ) != "") ? stripslashes(get_option( $value['id'] )) : stripslashes($value['std']); ?></textarea>
				</td>
				</tr>
				<tr>
				<td><small><?php echo $value['desc']; ?></small></td>
				</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
				<?php
				break;
				case 'select':
				?>
				<tr>
				<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
				<td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
				</tr>
				<tr>
				<td><small><?php echo $value['desc']; ?></small></td>
				</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
				<?php
				break;
				case "checkbox":
				?>
				<tr>
				<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
				<td width="80%"><?php if(get_option($value['id'])){$checked = "checked=\"checked\""; }else{ $checked = "";} ?>
				<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
				</td>
				</tr>
				<tr>
				<td><small><?php echo $value['desc']; ?></small></td>
				</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
				<?php break;
			}
		}
	?>

		<p class="submit">
		<input name="save" type="submit" value="Save changes" />
		<input type="hidden" name="action" value="save" />
		</p>
	</form>
	<form method="post">
		<p class="submit">
			<input name="reset" type="submit" value="Reset" />
			<input type="hidden" name="action" value="reset" />
		</p>
	</form>
 
<?php
}

add_action('admin_menu', 'mytheme_add_admin');
?>
<?php
//custom widget tutorial /*8-19-2013*/
/*class Realty_Widget extends WP_Widget 
{
	function __construct() {
		parent::__construct(
			'realty_widget', // Base ID
			'Realty Widget', // Name
			array('description' => __( 'Displays your latest listings. Outputs the post thumbnail, title and date per listing'))
		);
	}
	function widget($args, $instance) { //output
		extract( $args );
		// these are the widget options
		$title = apply_filters('widget_title', $instance['title']);
		$numberOfListings = $instance['numberOfListings'];
		echo $before_widget;
		// Check if title is set
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		$this->getRealtyListings($numberOfListings);
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['numberOfListings'] = strip_tags($new_instance['numberOfListings']);
		return $instance;
	}	
    
    // widget form creation
	function form($instance) {

	// Check values
	if( $instance) {
		$title = esc_attr($instance['title']);
		$numberOfListings = esc_attr($instance['numberOfListings']);
	} else {
		$title = '';
		$numberOfListings = '';
	}
	?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'realty_widget'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('numberOfListings'); ?>"><?php _e('Number of Listings:', 'realty_widget'); ?></label>		
		<select id="<?php echo $this->get_field_id('numberOfListings'); ?>"  name="<?php echo $this->get_field_name('numberOfListings'); ?>">
			<?php for($x=1;$x<=10;$x++): ?>
			<option <?php echo $x == $numberOfListings ? 'selected="selected"' : '';?> value="<?php echo $x;?>"><?php echo $x; ?></option>
			<?php endfor;?>
		</select>
		</p>		 
	<?php
	}
	
	function getRealtyListings($numberOfListings) { //html
		global $post;
		add_image_size( 'realty_widget_size', 85, 45, false );
		$listings = new WP_Query();
		$listings->query('post_type=listings&posts_per_page=' . $numberOfListings );	
		if($listings->found_posts > 0) {
			echo '<ul class="realty_widget">';
				while ($listings->have_posts()) {
					$listings->the_post();
					$image = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, 'realty_widget_size') : '<div class="noThumb"></div>'; 
					$listItem = '<li>' . $image; 
					$listItem .= '<a href="' . get_permalink() . '">';
					$listItem .= get_the_title() . '</a>';
					$listItem .= '<span>Added ' . get_the_date() . '</span></li>'; 
					echo $listItem; 
				}
			echo '</ul>';
			wp_reset_postdata(); 
		}else{
			echo '<p style="padding:25px;">No listing found</p>';
		} 
	}
	
}*/ //end class Realty_Widget
//register_widget('Realty_Widget');
?>

<?php
	//adiciona suporte para embed
 	wp_oembed_add_provider();
 ?>