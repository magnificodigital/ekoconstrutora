<?php include(TEMPLATEPATH . '/options.php'); ?>
<div class="eight columns">
	<form id="myform" method="post">
		<div class="row">
			<div class="three columns">
				<label for="" class="right">Nome:</label>	
			</div>
			<div class="six columns">
				<input type="text" name="txtNomeCompleto" id="txtNomeCompleto" />
			</div>
			<div class="three columns"></div>
		</div>
		<div class="row">
			<div class="three columns">
				<label for="" class="right">E-mail:</label>
			</div>
			<div class="six columns">
				<input type="email" class="email" name="txtEmail" id="txtEmail" required/>
			</div>
			<div class="three columns"></div>
		</div>
		<div class="row">
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
		<div class="row">
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
		<div class="row">
			<div class="three columns">
				<label for="" class="right">Mensagem:</label>
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
<?php
	$email_send = get_post_meta($post->ID, 'eko_email_imovel', true);
	
	/*echo '
		<script>
			if(console)
			{
				console.log("Email: '.$email_send.'");
			}
		</script>
	';*/
	
	if ($_POST)
	{
		$forms = $_POST;
		$form_valid = false;
		if(!empty($email_send))
		{
			$eko_email = $email_send;
		}
		else
		{
			$eko_email = $eko_email_contact_listings;
		}
		
		$eko_email_subject = 'Imóvel - ' . get_the_title();
		$eko_email_message = '';
		$eko_email_headers = 'From: EKO CONSTRUTORA <' . get_option('admin_email') . '>' . "\r\n";

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
			{
				//echo "beleza";
			}
			else
			{
				//echo "not beleza";
			}
		}
		else
		{
			//echo "not beleza";
		}
	}
?>