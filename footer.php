</div><!--wrap-->

<?php include(TEMPLATEPATH . '/options.php'); ?>

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




<footer>

    <div id="newsletter">

        <form method="post" name="form1" action="http://cache.mail2easy.com.br/integracao">

            <div class="row">

                <div class="four columns">

                    <p>Receba os nossos Newsletters:</p>

                    <input type="hidden" name="CON_ID" value="10856.2e6503dab45435a733032bd926387577" />

                    <input type="hidden" name="DESTINO" value="<?php bloginfo('url'); ?>?newsletter=true#message" />

                    <input type="hidden" name="GRUPOS_CADASTRAR" value="33" />

                    <input type="hidden" name="GRUPOS_DESCADASTRAR" value="" />

                    <input type="hidden" name="SMT_RECEBER" value="1" />

                    <input type="email"  name="SMT_email" placeholder="Digite o seu E-mail" required/>

                </div>

                <div class="two columns">

                    <input type="submit" name="submit" value="Cadastrar">

                </div>

                <div class="six columns">

                    <?php

                    $opt = array('menu_class' => 'mn_social block-grid alignright',

                        'theme_location' => 'social-media',

                        'fallback_cb' => '');



                    wp_nav_menu($opt);

                    ?>

                </div>

            </div>

        </form>

    </div>

    <div id="maplinks">

        <div class="row">

            <div class="four columns logo-layer">

                <a href="<?php bloginfo('url'); ?>">

                    <img src="<?php echo bloginfo('template_directory'); ?>/images/logo.gif" alt="<?php get_bloginfo('name'); ?>" />

                </a>

            </div>

            <div class="three columns">

                <h3>Construtora</h3>

                <?php wp_nav_menu(array('theme_location' => 'footer-menu1', 'fallback_cb' => '')); ?>

            </div>

            <div class="three columns">

                <h3>Informações</h3>

                <?php wp_nav_menu(array('theme_location' => 'footer-menu2', 'fallback_cb' => '')); ?>

            </div>

            <div class="two columns">

                <h3>Para você</h3>

                <?php wp_nav_menu(array('theme_location' => 'footer-menu3', 'fallback_cb' => '')); ?>

            </div>

            <div class="twelve columns closure">

                <?php

                $defaultFooterText = "&copy; " . date('Y') . " " . get_bloginfo('name') . "  Todos os direitos reservados. ";

                echo ($eko_footerText != '') ? $eko_footerText : $defaultFooterText;

                ?>

            </div>

        </div>

    </div>

    <div id="contact">

        <div class="row">

            <div class="two columns">

                <h4>Fale com a EKO</h4>

            </div>

            <div class="ten columns">

                <ul class="block-grid four-up">

                    <li>

                        <a href="<?php echo get_permalink(get_page_by_path('fale-conosco')) ?>">

                            <span class="ilu email"></span>

                            <span class="hide-for-small">Atendimento<span class="breakline">por e-mail</span></span>

                        </a>

                    </li>

                    <li>

                        <a href="<?php echo get_permalink(get_page_by_path('ligamos-para-voce')) ?>">

                            <span class="ilu phone"></span>

                            <span class="hide-for-small">Ligamos<span class="breakline">para você</span></span>

                        </a>

                    </li>

                    <li>

                        <a href="<?php echo get_permalink(get_page_by_path('agende-uma-visita')) ?>">

                            <span class="ilu date"></span>

                            <span class="hide-for-small">Agende<span class="breakline">uma visita</span></span>

                        </a>

                    </li>

                    <li>

                        <!--javascript:void(window.open('http://login.zupot.com/client.php?locale=pt&c=NzRfNjk2MjI=','','width=590,height=610,left=0,top=0,resizable=yes,menubar=no,location=yes,status=yes,scrollbars=yes'))-->

                        <a href="javascript:openChat()">

                            <span class="ilu chat"></span>

                            <span class="hide-for-small">Corretor<span class="breakline">Online</span></span>

                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</footer>

<div class="overlay reveal-modal-bg"></div>

<div id="modalAlertSuccess" class="alert box success reveal-modal small">

    <span class="ilu success"></span>

    <h2>E-MAIL CADASTRADO COM SUCESSO!</h2>

    <p>Obrigado!</p>

    <p>Em breve você receberá nossas conteúdos<br>exclusivos em seu e-mail.</p>

    <div class="close">

        <a href="#" class="close-reveal-modal">Fechar</a>

    </div>			

</div>

<div id="modalAlertSuccessForm" class="alert box success-form reveal-modal" data-reveal>

    <span class="ilu success"></span>

    <h2>MENSAGEM ENVIADA COM SUCESSO!</h2>

    <p>Obrigado por entrar em contato com a EKO!<br>Retornaremos o mais breve possível.</p>

    <div class="close">

        <a href="#" class="close-reveal-modal">Fechar</a>

    </div>			

</div>        

<div id="modalError" class="alert box error-form reveal-modal" data-reveal>

    <span class="ilu error"></span>

    <h2>OPS!</h2>

    <p>A sua mensagem não foi entregue corretamente.<br>Por favor, tente novamente.</p>

    <p>Se preferir, ligue para: (11) 4655-8022 ou envie um e-mail para: contato@ekoconstrutora.com.br.</p>

    <div class="close">

        <a href="#" class="close-reveal-modal">Fechar</a>

    </div>			

</div>

<div id="secondModal" class="alert box success-form-secundary reveal-modal large" data-reveal>

    <div class="message-box"></div>

    <div class="close">

        <a href="#" class="close-reveal-modal btn-close">Fechar</a>

    </div>			

</div>

<a href="#" id="showAlertSuccess" class="hide" data-reveal-id="modalAlertSuccess">Modal</a>

<a href="#" id="showAlertSuccessForm" class="hide" data-reveal-id="modalAlertSuccessForm">Modal</a>

<a href="#" id="showAlertError" class="hide" data-reveal-id="modalError">Modal</a>

<!--Start of Zopim Live Chat Script>

<script type="text/javascript">

window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=

d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.

_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");

$.src="//v2.zopim.com/?3ouh11f0fCCct6Rpb5sJQvduUHHR3yKM";z.t=+new Date;$.

type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");



function openChat(){

	$zopim.livechat.window.show();

}

</script>

nd of Zopim Live Chat Script-->

<?php //wp_footer(); ?>

</body>

</html>