<h1>Compras - Adicionar</h1>

<form method="POST">
	<label for="name">Nome do Revendedor</label><br/>
	<input type="text" id="search_name" name="name" data-type="searchResellers" autocomplete="off"/>
	<input type="hidden" class="reseller_id" name="reseller_id"/>
	<button class="reseller_add_button">+</button><div style="clear:both;"></div><br/>

	<label for="price">Valor</label><br/>
	<input type="text" id="price" name="price" autocomplete="off"/><br/><br/>
	<hr/>

	<h4>Produtos</h4>
	<fieldset>
		<legend>Adicionar Produto</legend>
		<input type="text" id="add_product" data-type="searchProducts"/>
	</fieldset>
	<table border="0" width="100%" id="products-table">
		<tr>
			<th>Nome do Produto</th>
			<th style="text-align:center;">Quantidade</th>
			<th>Preço Unit.</th>
			<th>Sub-total</th>
			<th>Excluir</th>
		</tr>
	</table>
	<hr/>
	<input type="submit" value="Adicionar Compra"/>
</form> 

<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_purchases_add.js"></script>

