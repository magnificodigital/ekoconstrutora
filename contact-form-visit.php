<?php include(TEMPLATEPATH . '/options.php'); ?>
<div class="form">
	<form id="myform" method="post">
		<div class="row">
			<div class="three columns">
				<label for="selMotivo" class="right">Qual o motivo da visita?</label>
			</div>
			<div class="six columns">
				<select name="selMotivo" id="selMotivo">
					<option value="">Selecione</option>
					<?php 
					$subjects_array = explode("\n", $eko_visit_subject);

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
		<div class="row">
			<div class="three columns">
				<label for="txtData" class="right">Data:</label>
			</div>
			<div class="six columns">
				<input type="date" name="txtData" id="txtData" />
			</div>
			<div class="three columns"></div>
		</div>
		<div class="row">
			<div class="three columns">
				<label for="selHorario" class="right">Horário:</label>
			</div>
			<div class="six columns">
				<select name="selHorario" id="selHorario" >
					<option value="">Selecione</option>
					<option value="9h00">9h00</option>
					<option value="9h30">9h30</option>
					<option value="10h00">10h00</option>
					<option value="10h30">10h30</option>
					<option value="11h00">11h00</option>
					<option value="11h30">11h30</option>
					<option value="12h00">12h00</option>
					<option value="12h30">12h30</option>
					<option value="13h00">13h00</option>
					<option value="13h30">13h30</option>
					<option value="14h00">14h00</option>
					<option value="14h30">14h30</option>
					<option value="15h00">15h00</option>
					<option value="15h30">15h30</option>
					<option value="16h00">16h00</option>
					<option value="16h30">16h30</option>
					<option value="17h00">17h00</option>
					<option value="17h30">17h30</option>
					<option value="18h00">18h00</option>
				</select>
			</div>
			<div class="three columns">
				<input type="submit" value="Enviar" style="padding: 7px 15px" />
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
        'selMotivo': 'Motivo',
        'selHorario': 'Horário'
     };
    options = { fieldMapping: meus_campos };
    RdIntegration.integrate('5bc74d9a15dc71ab1bd0bc162ae544d5', 'Agende uma visita', options);  
</script>

<?php
	if ($_POST)
	{
		$forms = $_POST;
		$form_valid = false;

		$emails_array = explode("\n", $eko_visit_subject);

		foreach ($emails_array as $email_array)
		{
			$subject = explode(":", $email_array);

			if ($subject[0] == $_POST['selMotivo'])
			{
				$eko_email = $subject[1];
			}
		}

		$eko_email_subject = 'Agende uma Visita';
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
			{
				fbq('track', 'Lead');
				echo 'Mensagem enviada com sucesso.';
			}				
			else
			{
				echo 'Falha no envido dos dados! Tente novamente.';
			}
		}
		else
		{
			echo 'Erro! Tente novamente.';
		}
	}
?>