<div class="row">
	<div class="twelve columns listing-search">
		<div class="search-wrap row">
		<form  method="post" action="<?php echo get_permalink(get_page_by_path('imoveis'));?>"> 
			<div class="two columns"><p>Procurar por:</p></div>
			<div class="three columns">
				<?php echo buildSelect('status'); ?>
			</div>
			<div class="three columns">
				<?php echo buildSelect('locale'); ?>
			</div>
			<div class="two columns">
				<?php echo buildSelect('type'); ?>
			</div>
			<div class="two columns"><input type="submit" class="button" value="Buscar" /></div>	
		</form>
		</div>	 
	</div>
</div>