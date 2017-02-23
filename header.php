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

                
        <script src="<?php bloginfo('template_directory'); ?>/scripts/foundation.js" type="text/javascript"></script>
        <script src="<?php bloginfo('template_directory'); ?>/scripts/jquery.flexisel.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/jquery.mousewheel-3.0.6.pack.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/jquery.jcarousel.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/jquery.fancybox.pack.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/jquery.form.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/jquery.validate.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
        <script type="text/javascript">//<![CDATA[

         // Google Analytics

         var _gaq = _gaq || [];

         _gaq.push(['_setAccount', 'UA-47651710-1']);

         _gaq.push(['_trackPageview']);

         (function () {

         var ga = document.createElement('script');

         ga.type = 'text/javascript';

         ga.async = true;

         ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

         var s = document.getElementsByTagName('script')[0];

         s.parentNode.insertBefore(ga, s);

         })();

        //]]></script>

        <!-- Facebook Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','https://connect.facebook.net/en_US/fbevents.js');

        fbq('init', '1107754155960776');
        fbq('track', "PageView");
        </script>

        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=1107754155960776&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Facebook Pixel Code -->

        <!--RD-->
        <script type="text/javascript" async src="https://d335luupugsy2.cloudfront.net/js/loader-scripts/1f43a906-f1a1-427f-bb5d-30ea68ae49f5-loader.js"></script>


        <!-- Etc -->
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/app.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/tinynav.js"></script>
        <script type="text/javascript">
            jQuery.noConflict();

            jQuery(document).ready(
                    function()
                    {
                        //MENU SMALL
                        jQuery(".menu-icon").click(
                                function()
                                {
                                    jQuery(".menu-small").animate({left: 0}, 600);
                                    return false;
                                }
                        );

                        jQuery("html:not(.menu-icon)").click(
                                function()
                                {
                                    jQuery(".menu-small").animate({left: -260}, 600);
                                }
                        );

                        //Banners
                        var jcarousel = jQuery('.jcarousel');

                        jcarousel
                                .on('jcarousel:reload jcarousel:create', function() {
                                    var width = jcarousel.innerWidth();

                                    jcarousel.jcarousel('items').css('width', width + 'px');
                                })
                                .jcarousel({
                                    wrap: 'circular'
                                })
                                .jcarouselAutoscroll({
                                    interval: 5000,
                                    target: '+=1',
                                    autostart: true
                                });

                        //Carrousel Home
                        var lancamentosFlexisel = jQuery("#lancamentosFlexisel li").size();

                        if (lancamentosFlexisel > 0)
                        {
                            (lancamentosFlexisel < 3) ? lancamentosFlexisel = 1 : lancamentosFlexisel = 3;

                            jQuery("#lancamentosFlexisel").flexisel({
                                autoPlay: true,
                                autoPlaySpeed: 5000,
                                visibleItems: lancamentosFlexisel,
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint: 640,
                                        visibleItems: 1
                                    },
                                    landscape: {
                                        changePoint: 670,
                                        visibleItems: 2
                                    },
                                    tablet: {
                                        changePoint: 860,
                                        visibleItems: 2
                                    }
                                }
                            });
                        }

                        var emobrasFlexisel = jQuery("#em-obrasFlexisel li").size();

                        if (emobrasFlexisel > 0)
                        {
                            (emobrasFlexisel < 3) ? emobrasFlexisel = 1 : emobrasFlexisel = 3;

                            jQuery("#em-obrasFlexisel").flexisel({
                                autoPlay: true,
                                autoPlaySpeed: 5000,
                                visibleItems: emobrasFlexisel,
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint: 640,
                                        visibleItems: 1
                                    },
                                    landscape: {
                                        changePoint: 670,
                                        visibleItems: 2
                                    },
                                    tablet: {
                                        changePoint: 860,
                                        visibleItems: 2
                                    }
                                }
                            });
                        }

                        var prontosParaMorarFlexisel = jQuery("#prontos-para-morarFlexisel li").size();
                        ;

                        if (prontosParaMorarFlexisel > 0)
                        {
                            (prontosParaMorarFlexisel < 3) ? prontosParaMorarFlexisel = 1 : prontosParaMorarFlexisel = 3;

                            jQuery("#prontos-para-morarFlexisel").flexisel({
                                autoPlay: true,
                                autoPlaySpeed: 5000,
                                visibleItems: prontosParaMorarFlexisel,
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint: 640,
                                        visibleItems: 1
                                    },
                                    landscape: {
                                        changePoint: 670,
                                        visibleItems: 2
                                    },
                                    tablet: {
                                        changePoint: 860,
                                        visibleItems: 2
                                    }
                                }
                            });
                        }

                        //Carrousel Imovel
                        var galleryOneFlexisel = jQuery("#galleryOneFlexisel li").size();

                        if (galleryOneFlexisel > 0)
                        {
                            (galleryOneFlexisel < 3) ? galleryOneFlexisel = 1 : galleryOneFlexisel = 3;

                            jQuery("#galleryOneFlexisel").flexisel({
                                visibleItems: galleryOneFlexisel,
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint: 640,
                                        visibleItems: 1
                                    },
                                    landscape: {
                                        changePoint: 670,
                                        visibleItems: 2
                                    },
                                    tablet: {
                                        changePoint: 860,
                                        visibleItems: 2
                                    }
                                }
                            });
                        }

                        var galleryTwoFlexisel = jQuery("#galleryTwoFlexisel li").size();

                        if (galleryTwoFlexisel > 0)
                        {
                            (galleryTwoFlexisel < 3) ? galleryTwoFlexisel = 1 : galleryTwoFlexisel = 3;

                            jQuery("#galleryTwoFlexisel").flexisel({
                                visibleItems: galleryTwoFlexisel,
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint: 640,
                                        visibleItems: 1
                                    },
                                    landscape: {
                                        changePoint: 670,
                                        visibleItems: 2
                                    },
                                    tablet: {
                                        changePoint: 860,
                                        visibleItems: 2
                                    }
                                }
                            });
                        }

                        //Forms
                        $hasMessage = false;
                        $message = '';

                        if (jQuery('#selAssunto').length > 0) {
                            jQuery('#selAssunto').change(function() {
                                
                                if (jQuery(this).val() === 'Trabalhe conosco') {
                                    jQuery('.row.empreendimento').hide();
                                } else {
                                    jQuery('.row.empreendimento').show();
                                }
                                
                                switch(jQuery(this).val()) {
                                    case 'Trabalhe conosco':
                                        $hasMessage = true;
                                        $message = '<p>&nbsp;</p><p>Seu currículo será analisado e caso haja interesse em seu perfil profissional, voltaremos a fazer contato.</p><p>Agradecemos por sua disposição e interesse em fazer parte do Grupo EKO.</p>';
                                        break;
                                    case 'Outros assuntos':
                                    case 'Compra de imóveis':
                                        $hasMessage = true;
                                        $message = '<h2>Qual a sua opinião sobre nossos serviços?</h2><p>Nós estamos sempre preocupados em melhorar cada vez mais, e por isso gostaríamos de saber a sua opinião.<br>É simples, rápido e fácil. Em menos de 1 minuto você responde as perguntas.<br><a href="https://docs.google.com/forms/d/1YbVKjsZo9uEQrw8Ogxt1DoujuFNzS7zn5699tyUvjsE/viewform" target="_blank">CLIQUE AQUI</a></p>';
                                        break;
                                    case 'Financeiro':
                                    case 'Solicitação de reparo ou serviço':
                                        $hasMessage = true;
                                        $message = '<h2>Qual a sua opinião sobre nossos serviços?</h2><p>Nós estamos sempre preocupados em melhorar cada vez mais, e por isso gostaríamos de saber a sua opinião.<br>É simples, rápido e fácil. Em menos de 1 minuto você responde as perguntas.<br><a href="https://docs.google.com/forms/d/1zLEGMsKK02uq5YSjg6sJ1EbbdQGwW07oNYOnWG6_t1U/viewform" target="_blank">CLIQUE AQUI</a></p>';
                                        break;
                                    default:
                                        $hasMessage = false;
                                        break;
                                }
                            });
                        }

                        var form = jQuery("#myform");
                        form.validate();

                        form.submit(
                                function(event)
                                {
                                    if (form.valid()) {
                                        jQuery.ajax({
                                            type: "POST", 
                                            data: form.serialize()})
                                            .success(
                                                    function(msg)
                                                    {
                                                        jQuery('#showAlertSuccessForm').trigger('click');
                                                        
                                                        if ($hasMessage) {
                                                            jQuery('#modalAlertSuccessForm').find('.close a').attr('data-reveal-id', 'secondModal').html('Próximo');
                                                            jQuery("#secondModal .message-box").html($message);
                                                        } else {
                                                            jQuery('#modalAlertSuccessForm').find('.close a').removeAttr('data-reveal-id').html('Fechar');
                                                        }
                                                        
                                                        form[0].reset();
                                                    }
                                            );
                                    } else {
                                        jQuery('#showAlertError').trigger('click');
                                    }

                                    return false;
                                }
                        );

                        //Lightbox Imóveis
                        <?php
                        $media_values = get_post_meta($post->ID, 'mgop_media_value', true);

                        if ($media_values['mgop_mb_obras']) {
                            $media_values = $media_values['mgop_mb_obras'];

                            foreach ($media_values as $media_value) {
                                $media = wp_get_attachment_image_src($media_value, 'large');
                                $media_url .= '"' . $media[0] . '",';
                            }
                            ?>
                            jQuery("#fotosObras").click(
                                    function()
                                    {
                                        jQuery.fancybox([
                                        <?php echo $media_url; ?>
                                        ], {
                                            'padding': 0,
                                            'transitionIn': 'none',
                                            'transitionOut': 'none',
                                            'type': 'image',
                                            'changeFade': 0
                                        });

                                        return false;
                                    }
                            );
                            <?php
                        }
                        ?>

                        //FancyBox
                        jQuery("a[rel=galleryOne]").fancybox({
                            'padding': 0,
                            'transitionIn': 'none',
                            'transitionOut': 'none',
                            'type': 'image',
                            'changeFade': 0
                        });

                        jQuery("a[rel=galleryTwo]").fancybox({
                            'padding': 0,
                            'transitionIn': 'none',
                            'transitionOut': 'none',
                            'type': 'image',
                            'changeFade': 0
                        });
                        
                        <?php if ($_GET['newsletter'] == 'true') : ?>
                            jQuery('#showAlertSuccess').trigger('click');
                        <?php endif; ?>
                            
                        jQuery('.btn-close').click(function(event){
                            event.preventDefault();
                            jQuery('#secondModal').hide(function(){
                                jQuery('.overlay').hide();
                            });
                        });
                    }
            );
        </script>

        <!-- Início do script Omnize --> 
        <script>document.addEventListener('DOMContentLoaded',function(){var JSLink=location.protocol+'//widget.omnize.com',JSElement=document.createElement('script');JSElement.async=!0;JSElement.charset='UTF-8';JSElement.src=JSLink;JSElement.onload=OnceLoaded;document.getElementsByTagName('body')[0].appendChild(JSElement);function OnceLoaded(){wOmz.init({id:3666});}},false);</script> 
        <!-- Fim do script Omnize -->

        <!--lightbox-->
        <script type="text/javascript">
            jQuery(document).ready(function(){

                jQuery('.lightbox').fadeIn('fast',function(){
                    
                });
                jQuery('.close-box, .mask').on('click',function(){
                    jQuery('.lightbox').fadeOut('fast');
                });

            });
        </script>



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