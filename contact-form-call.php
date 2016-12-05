



<?php include(TEMPLATEPATH . '/options.php'); ?>

<div class="eight form">

	<form id="myform" method="post">

		<div class="row">

			<div class="two columns">

				<label for="selMotivo" class="right">Assunto</label>

			</div>

			<div class="seven columns">

				<select name="selAssunto" id="selAssunto">

					<option value="">Selecione</option>

					<?php 

					$subjects_array = explode("\n", $eko_call_subject);



					foreach ($subjects_array as $subject_array) {

						$subject = explode(":", $subject_array);

						echo "<option value='" . $subject[0] . "'>" . $subject[0] . "</option>";

					}

				?>

				</select>

			</div>

			<div class="three columns"></div>

		</div>

		<div class="row">

			<div class="two columns">

				<label for="txtTelefone" class="right">Nome:</label>

			</div>

			<div class="seven columns">

				<input type="text" name="txtNomeCompleto" id="txtNomeCompleto" required />

			</div>

			<div class="three columns"></div>

		</div>

		<div class="row">

			<div class="two columns">

				<label for="txtEmail" class="right">E-mail:</label>

			</div>

			<div class="seven columns">
				
				<input type="email" name="txtEmail" id="txtEmail" required />

			</div>

			<div class="three columns"></div>

		</div>

		<div class="row">

			<div class="two columns">

				<label for="txtDddTelefone" class="right">DDD:</label>

			</div>

			<div class="two columns">

				<input type="tel" class="number" name="txtDddTelefone" id="txtDddTelefone" maxlength="2" placeholder="DDD" required />

			</div>

			<div class="five columns"></div>

			<div class="three columns"></div>

		</div>

		<div class="row">

			<div class="two columns">

				<label for="txtTelefone" class="right">Número:</label>

			</div>

			<div class="seven columns">

				<input type="tel" class="number" name="txtTelefone" id="txtTelefone" required />

			</div>

			<div class="three columns">

				<input type="submit" value="Enviar" style="padding: 5px 15px;" />

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
        'selAssunto': 'Assunto'
     };
    options = { fieldMapping: meus_campos };
    RdIntegration.integrate('5bc74d9a15dc71ab1bd0bc162ae544d5', 'Ligamos para Você - Eko Construtora', options);  
</script>

<?php

	if ($_POST)

	{

		$forms = $_POST;

		$form_valid = false;

		//$eko_email = $eko_email_contact_call;



		$emails_array = explode("\n", $eko_call_subject);



		foreach ($emails_array as $email_array)

		{

			$subject = explode(":", $email_array);



			if ($subject[0] == $_POST['selAssunto'])

			{

				$eko_email = $subject[1];

			}

		}

		

		//$eko_email = "dmorsoleto@gmail.com";

		$eko_email_subject = 'Ligamos para Você';

		$eko_email_message = '';

		$eko_email_headers = 'From: ADMIN EKO <' . get_option('admin_email') . '>' . "\r\n";



		foreach ($forms as $form)

		{

			if ($form != '')

			{

				$eko_email_message .= $form . "\n";

				$form_valid = true;

			}

			else 

			{

				$form_valid = false;

			}			

		}



		if ($form_valid)

		{
			$eko_email = 'atendimento@ekoconstrutora.com.br';

			if (wp_mail($eko_email, $eko_email_subject, $eko_email_message, $eko_email_headers))



			{}

				//echo 'Mensagem enviada com sucesso.';

			else

			{}

				//echo 'Falha no envido dos dados! Tente novamente.';

		}

		else

		{

			//echo 'Erro! Tente novamente.';

		}

	}

?>



