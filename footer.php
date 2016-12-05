</div><!--wrap-->

<?php include(TEMPLATEPATH . '/options.php'); ?>

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