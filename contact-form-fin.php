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
			<h2>De acordo com as suas condições</h2>
		</div>
		<div class="row">
			<div class="three columns">
				<label for="selEmpreendimento" class="right">Empreendimento:</label>	
			</div>
			<div class="six columns">
				<select name="selEmpreendimento" id="selEmpreendimento" >
					<option value="">Selecione</option>
					<?php
						$args = array(
							'orderby'          => 'title',
							'order'            => 'ASC',
							'post_type'        => 'listings',
							'post_status'      => 'publish',
						);

						$listings = get_posts($args);

						foreach ($listings as $listing)
						{
					?>
							<option value="<?php echo $listing->post_title ?>"><?php echo $listing->post_title ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="three columns"></div>
		</div>
		<div class="row">
			<div class="three columns">
				<label for="selUnidade" class="right">Unidade:</label>	
			</div>
			<div class="six columns">
				<select name="selUnidade" id="selUnidade">
					<option value="">Selecione</option>
				</select>
			</div>
			<div class="three columns"></div>
		</div>
		<div class="row">
			<div class="three columns">
				<label for="txtValorChaves" class="right" style="line-height: 15px">Valor a ser pago até a Entrega das Chaves:</label>
			</div>
			<div class="six columns">
				<input type="text" name="txtValorChaves" id="txtValorChaves" placeholder="R$" />
			</div>
			<div class="three columns"></div>
		</div>
		<div class="row">
			<div class="three columns">
				<label for="txtValorPrestacao" class="right">Valor da Prestação:</label>
			</div>
			<div class="six columns">
				<input type="text" name="txtValorPrestacao" id="txtValorPrestacao" placeholder="R$" />
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

<script type="text/javascript" src="https://d335luupugsy2.cloudfront.net/js/integration/stable/rd-js-integration.min.js"></script>  
<script type="text/javascript">
    var meus_campos = {
        'txtEmail': 'email',
        'txtNomeCompleto': 'nome',
        'txtDddTelefone': 'DDD - Telefone',
        'txtTelefone': 'telefone',
        'txtDddCelular': 'DDD - Celular',
        'txtCelular': 'celular',
        'txtMensagem': 'Mensagem',
        'selEmpreendimento': 'Empreendimento',
        'selUnidade': 'Unidade',
        'txtValorChaves': 'Valor - Entrega das Chaves',
        'txtValorPrestacao': 'Valor da Prestação'
     };
    options = { fieldMapping: meus_campos };
    RdIntegration.integrate('5bc74d9a15dc71ab1bd0bc162ae544d5', 'Calcule o seu financiamento', options);  
</script>

<?php
	if ($_POST)
	{
		$forms = $_POST;
		$form_valid = false;
		$eko_email = $eko_email_contact_fin;
		$eko_email_subject = 'Calcule o seu Financiamento';
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