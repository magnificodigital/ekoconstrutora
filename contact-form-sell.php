<?php include(TEMPLATEPATH . '/options.php'); ?>
<div class="form">
	<form id="myform" method="post">
		<div class="row">
			<div class="three columns">
				<label for="txtNomeCompleto" class="right">Nome Completo:</label>	
			</div>
			<div class="six columns">
				<input type="text" name="txtNomeCompleto" id="txtNomeCompleto" />
			</div>
			<div class="three columns"></div>
		</div>
		<div class="row">
			<div class="three columns">
				<label for="txtEmail" class="right">E-mail:</label>
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
		<div class="post-title" style="margin-top: 30px;">
			<h2>Sobre o Terreno</h2>
		</div>
		<div class="row">
			<div class="three columns">
				<label for="txtEndereco" class="right">Endereço:</label>
			</div>
			<div class="six columns">
				<input type="text" name="txtEndereco" id="txtEndereco" />
			</div>
			<div class="three columns"></div>
		</div>
		<div class="row">
			<div class="three columns">
				<label for="txtNumero" class="right">Número:</label>
			</div>
			<div class="one columns">
				<input type="text" name="txtNumero" id="txtNumero" />
			</div>
			<div class="five columns"></div>
			<div class="three columns"></div>
		</div>
		<div class="row">
			<div class="three columns">
				<label for="txtComplemento" class="right">Complemento:</label>
			</div>
			<div class="six columns">
				<input type="text" name="txtComplemento" id="txtComplemento" />
			</div>
			<div class="three columns"></div>
		</div>
		<div class="row">
			<div class="three columns">
				<label for="txtBairro" class="right">Bairro:</label>
			</div>
			<div class="six columns">
				<input type="text" name="txtBairro" id="txtBairro" />
			</div>
			<div class="three columns"></div>
		</div>
		<div class="row">
			<div class="three columns">
				<label for="txtCidade" class="right">Cidade:</label>
			</div>
			<div class="six columns">
				<input type="text" name="txtCidade" id="txtCidade" />
			</div>
			<div class="three columns"></div>
		</div>
		<div class="row">
			<div class="three columns">
				<label for="txtEstado" class="right">Estado:</label>
			</div>
			<div class="one columns">
				<input type="text" name="txtEstado" id="txtEstado" />
			</div>
			<div class="five columns"></div>
			<div class="three columns"></div>
		</div>
		<div class="row">
			<div class="three columns">
				<label for="txtCEP" class="right">CEP:</label>
			</div>
			<div class="six columns">
				<input type="text" name="txtCEP" id="txtCEP" />
			</div>
			<div class="three columns"></div>
		</div>
		<div class="row">
			<div class="three columns">
				<label for="txtMensagem" class="right">Mensagem:</label>
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
        'txtEndereco': 'Endereço',
        'txtNumero': 'Número - Endereço',
        'txtComplemento': 'Complemento',
        'txtBairro': 'Bairro',
        'txtCidade': 'cidade',
        'txtEstado': 'estado',
        'txtCEP': 'CEP',
        'txtDddTelefone': 'DDD - Telefone',
        'txtTelefone': 'telefone',
        'txtDddCelular': 'DDD - Celular',
        'txtCelular': 'celular',
        'txtMensagem': 'Mensagem'
     };
    options = { fieldMapping: meus_campos };
    RdIntegration.integrate('5bc74d9a15dc71ab1bd0bc162ae544d5', 'Venda seu terreno', options);  
</script>

<?php
	if ($_POST)
	{
		$forms = $_POST;
		$form_valid = false;
		$eko_email = $eko_email_contact_sell;
		$eko_email_subject = 'Venda seu Terreno';
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