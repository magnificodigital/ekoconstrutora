<?php include(TEMPLATEPATH . '/options.php'); ?>
<div class="form">
    <form id="myform" method="post">
        <div class="row assunto">
            <div class="three columns">
                <label for="selAssunto" class="right">Assunto:</label>
            </div>
            <div class="six columns">
                <select name="selAssunto" id="selAssunto">
                    <option value="">Selecione</option>
                    <?php
                    $subjects_array = explode("\n", $eko_contact_subject);

                    foreach ($subjects_array as $subject_array) {
                        $subject = explode(":", $subject_array);
                        echo "<option value='" . $subject[0] . "'>" . $subject[0] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="three columns"></div>
        </div>
        <div class="row empreendimento">
            <div class="three columns">
                <label for="selEmpreendimento" class="right">Empreendimento:</label>	
            </div>
            <div class="six columns">
                <select name="selEmpreendimento" id="selEmpreendimento">
                    <option value="">Selecione</option>
                    <?php
                    $args = array(
                        'orderby' => 'title',
                        'order' => 'ASC',
                        'post_type' => 'listings',
                        'post_status' => 'publish',
                        'posts_per_page' => -1
                    );

                    $listings = get_posts($args);

                    foreach ($listings as $listing) {
                        ?>
                        <option value="<?php echo $listing->post_title ?>"><?php echo $listing->post_title ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="three columns"></div>
        </div>
        <div class="row nome-completo">
            <div class="three columns">
                <label for="txtNomeCompleto" class="right">Nome Completo:</label>	
            </div>
            <div class="six columns">
                <input type="text" name="txtNomeCompleto" id="txtNomeCompleto" />
            </div>
            <div class="three columns"></div>
        </div>
        <div class="row email">
            <div class="three columns">
                <label for="" class="right">E-mail:</label>
            </div>
            <div class="six columns">
                <input type="email" class="email" name="txtEmail" id="txtEmail" required/>
            </div>
            <div class="three columns"></div>
        </div>
        <div class="row telefone">
            <div class="three columns">
                <label for="txtDddTelefone" class="right">Telefone:</label>
            </div>
            <div class="one columns">
                <input type="tel" class="number" name="txtDddTelefone" id="txtDddTelefone" maxlength="2" placeholder="DDD" />
            </div>
            <div class="five columns">
                <input type="tel" class="number" name="txtTelefone" id="txtTelefone" />
            </div>
            <div class="three columns"></div>
        </div>
        <div class="row celular">
            <div class="three columns">
                <label for="txtDddCelular" class="right">Celular:</label>
            </div>
            <div class="one columns">
                <input type="tel" class="number" name="txtDddCelular" id="txtDddCelular" maxlength="2" placeholder="DDD" />
            </div>
            <div class="five columns">
                <input type="tel" class="number" name="txtCelular" id="txtCelular" />
            </div>
            <div class="three columns"></div>
        </div>
        <div class="row mensagem">
            <div class="three columns">
                <label for="txtMensagem" class="right">Mensagem</label>
            </div>
            <div class="six columns">
                <textarea name="txtMensagem" id="txtMensagem" ></textarea>
            </div>
            <div class="three columns">
                <input type="submit" value="Enviar" style="margin-top: 121px" />
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="https://d335luupugsy2.cloudfront.net/js/integration/stable/rd-js-integration.min.js"></script>
<script type="text/javascript">
    var meus_campos = {
        'txtEmail': 'email',
        'txtNomeCompleto': 'nome',
        'txtDddTelefone': 'DDD - Telefone',
        'txtTelefone': 'telefone',
        'txtDddCelular': 'DDD - Celular',
        'txtCelular': 'celular',
        'selAssunto': 'Assunto',
        'selEmpreendimento': 'Empreendimento',
        'txtMensagem': 'Mensagem'
     };
    options = { fieldMapping: meus_campos };
    RdIntegration.integrate('5bc74d9a15dc71ab1bd0bc162ae544d5', 'Fale Conosco', options);  
</script>

<?php
if ($_POST) {
    $forms = $_POST;
    $form_valid = false;
    $eko_mail = get_option('admin_email');

    $emails_array = explode("\n", $eko_contact_subject);

    foreach ($emails_array as $email_array) {
        $subject = explode(":", $email_array);

        if ($subject[0] == $_POST['selAssunto']) {
            $eko_email = $subject[1];
        }
    }

    $eko_email_subject = 'Fale Conosco';
    $eko_email_message = '';
    $eko_email_headers = 'From: ADMIN EKO <' . get_option('admin_email') . '>' . "\r\n";

    foreach ($forms as $form) {
        if ($form != '') {
            $eko_email_message .= $form . "\n";
            $form_valid = true;
        } else {
            $form_valid = false;
        }
    }

    if ($form_valid) {

        $eko_email = 'atendimento@ekoconstrutora.com.br';

        if (wp_mail($eko_email, $eko_email_subject, $eko_email_message, $eko_email_headers)) {
            
        } else {
            
        }
    } else {
        
    }
}

