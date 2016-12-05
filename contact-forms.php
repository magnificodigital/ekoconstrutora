<?php
if (is_page('ligamos-para-voce'))
{
	include(TEMPLATEPATH . '/contact-form-call.php');
}
else if (is_page('fale-conosco'))
{
	include(TEMPLATEPATH . '/contact-form-message.php');
}
else if (is_page('venda-seu-terreno'))
{
	include(TEMPLATEPATH . '/contact-form-sell.php');
}
else if (is_page('calcule-o-seu-financiamento'))
{
	include(TEMPLATEPATH . '/contact-form-fin.php');
}
else if (is_page('agende-uma-visita'))
{
	include(TEMPLATEPATH . '/contact-form-visit.php');
}
?>