<h1>Vendas - Adicionar</h1>

<form method="POST">
	<label for="name">Nome do Cliente</label><br/>
	<input type="text" id="search_name" name="name" data-type="searchClients" required/>
	<input type="hidden" name="client_id"/>
	<button class="client_add_button">+</button><div style="clear:both;"></div><br/>

	<label for="price">Valor</label><br/>
	<input type="text" id="price" name="price"/><br/><br/>

	<label for="status">Status</label><br/>
	<select name="status" id="status">
		<option value="0">Aguardando Pagamento</option>
		<option value="1">Pago</option>
		<option value="2">Cancelado</option>
	</select><br/><br/>

	<input type="submit" value="Adicionar Venda"/>
</form>

<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_sales_add.js"></script>

