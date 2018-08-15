<h1>Vendas - Adicionar</h1>

<form method="POST">
	<label for="name">Nome do Cliente</label>
	<input type="text" id="search_name" name="name" data-type="searchClients" required/><br/><br/>

	<label for="price">Valor</label><br/>
	<input type="text" id="price" name="price" required/><br/><br/>

	<label for="date">Data da Compra</label><br/>
	<input type="text" id="date" name="date" required/><br/><br/>

	<label for="status">Status</label><br/>
	<input type="text" id="status" name="status" required/><br/><br/>

	<input type="submit" value="Adicionar"/>
</form>

<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_sales_add.js"></script>

