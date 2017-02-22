<?php include(TEMPLATEPATH . '/options.php'); ?>
<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />		
        <meta name="viewport" content="width=device-width" />
        
        <title><?php wp_title(); ?></title>
        
        <?php 
            $post_id = get_the_ID(); 
            $post = get_post($post_id); 
            $meta_description = strip_tags($post->post_content);
            
            if ($tags = get_the_tags($post_id)) {
                foreach($tags as $tag) {
                    $taglist[] = $tag->name;
                    
                }
                $meta_tags = implode(',', $taglist);
            }
        ?>        
        
        <meta name=”keywords” content=”<?php echo $meta_tags; ?>” />
        
        <meta property="og:title" content="<?php bloginfo('name'); ?><?php wp_title(); ?>">
        <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
        <meta property="og:image" content="<?php echo bloginfo('template_directory') . '/images/logo.gif'; ?>">
        <meta property="og:description" content="<?php echo (is_home()) ? bloginfo('description') : $meta_description;?>">
        <meta name="description" content="<?php echo (is_home()) ? bloginfo('description') : $meta_description;?>">

        
        <!--
        <script src="javascripts/modernizr.foundation.js"></script>
        -->
        <!-- IE Fix for HTML5 Tags -->
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' type='text/css'>

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link href="<?php echo ($eko_favIconUrl != '') ? $eko_favIconUrl : bloginfo('template_directory') . '/images/favicon.gif'; ?>" TYPE="image/gif" REL="icon">

        <!--ADD foundation-->
        <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/scripts/foundation-custom.css">

        <!--ADD flexisel-->
        <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/scripts/jquery.flexisel.css">

        <!-- Add jcarousel -->
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/scripts/jquery.jcarousel.css" type="text/css" media="screen" />

        <!-- Add fancyBox -->
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/scripts/jquery.fancybox.css" type="text/css" media="screen" />

        <!-- Add validate -->
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/core.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

        <style type="text/css">
            .zopim {display: none;}
        </style>

    </head>
    <body <?php //body_class(); ?>>

        <div class="row menu-row">
            <div class="columns menu-small">
                <?php
                $opt = array('container_class' => 'menu-header-container-small',
                    'menu_id' => 'menu-header-small',
                    'theme_location' => 'header-menu');

                wp_nav_menu($opt);
                ?>
            </div>
        </div>
        <nav id="access" class="top-bar">
            <div class="row">
                <div class="twelve columns">
                    <?php
                    $opt = array('container_class' => 'menu-header hide-for-small',
                        'theme_location' => 'header-menu');

                    wp_nav_menu($opt);
                    ?>
                    <a class="menu-icon show-for-small">
                        <span></span>
                    </a> 
                </div>
            </div>
        </nav>
        <div id="header">
            <div class="row">
                <div class="twelve columns">
                    <div id="box">

                        <?php
                        if ((is_single() && ('listings' != get_post_type())) || is_category() || is_page('blog')) {
                            $category_blog = get_category_by_slug('blog');
                            $category_blog = $category_blog->cat_ID;
                            ?>
                            <div class="logo-layer twelve blog columns">
                                <a href="<?php bloginfo('url'); ?>">
                                    <img src="<?php echo bloginfo('template_directory'); ?>/images/logo.gif" alt="<?php get_bloginfo('name'); ?>" />
                                </a>
                                <div class="hide-for-small">
                                    <a href="<?php bloginfo('url') ?>/blog/">
                                        <img src="<?php echo bloginfo('template_directory'); ?>/images/logo-blog.gif" alt="Blog" />
                                    </a>
                                    <div class="text">
                                        <h6>Seja bem-vindo ao blog da EKO!</h6>
                                        <p>Fique por dentro de tudo sobre o mercado imobiliário e muitas dicas e novidades para o seu próximo imóvel.</p>
                                    </div>
                                    <div class="feed alignright">
                                        <a href="<?php echo get_category_link($category_blog) ?>/feed" target="_blank">Assine RSS<span class="ilu rss"></span></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="logo-layer three columns">
                                <a href="<?php bloginfo('url'); ?>">
                                    <img src="<?php echo bloginfo('template_directory'); ?>/images/logo.gif" alt="<?php get_bloginfo('name'); ?>" />
                                </a>
                            </div>
                            <div class="search-layer four columns hide-for-small">
                                <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                                    <input type="text" value="" name="s" id="s" placeholder="Busca:" /> 
                                    <input type="submit" id="searchsubmit" value="Search" /> 	
                                </form>	
                            </div>
                            <div class="four columns chat hide-for-small">
                            <?php
                            	$link_corretores_send = get_post_meta($post->ID, 'eko_corretores_online', true);
                            	
                            	if($link_corretores_send == "")
                            	{
	                            	$link_corretores_send = "http://login.zupot.com/client.php?locale=pt&c=NzRfNjk2MjI=";
                            	}
                            ?>
                            	<h4>
                                    <!--<a href="javascript:void(window.open('<?php echo $link_corretores_send; ?>','','width=590,height=610,left=0,top=0,resizable=yes,menubar=no,location=yes,status=yes,scrollbars=yes'))">Corretores Online</a>-->
                                    <a href="javascript:openChat()">Corretores Online</a>
                                </h4>
                                <p>Segunda a Sexta das 09:00 às 18:00</p>
                                <a href="javascript:void(window.open('<?php echo $link_corretores_send; ?>','','width=590,height=610,left=0,top=0,resizable=yes,menubar=no,location=yes,status=yes,scrollbars=yes'))">
                                    <span class="ilu headset"></span>
                                </a>
                                <!--<h4>
                                    <a href="javascript:void(window.open('http://login.zupot.com/client.php?locale=pt&c=NzRfNjk2MjI=','','width=590,height=610,left=0,top=0,resizable=yes,menubar=no,location=yes,status=yes,scrollbars=yes'))">Corretores Online</a>
                                </h4>
                                <p>Segunda a Sexta das 09:00 às 18:00</p>
                                <a href="javascript:void(window.open('http://login.zupot.com/client.php?locale=pt&c=NzRfNjk2MjI=','','width=590,height=610,left=0,top=0,resizable=yes,menubar=no,location=yes,status=yes,scrollbars=yes'))">
                                    <span class="ilu headset"></span>
                                </a>-->
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>
                <?php
                if (!is_home()) {
                    if ('listings' != get_post_type() || is_search()) {
                        ?>
                        <div class="twelve columns">
                            <div id="breadcrumb">
                                <?php the_breadcrumb($post); ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>