<h1>Vendas</h1>

<div class="button">
	<a href="<?php echo BASE_URL; ?>/sales/add" class="button">Adicionar Venda</a>
</div>

<table border="0" width="100%">
	<tr>
		<th>Nome do Cliente</th>
		<th>Valor</th>
		<th>Data</th>
		<th>Status</th>
		<th>Ações</th>
	</tr>
	<?php foreach($sales_list as $sale): ?>
		<tr>
			<td><?php echo $sale['name']; ?></td>
			<td>R$<?php echo number_format($sale['total_price'], 2, ",", ".") ; ?></td>
			<td><?php echo date('d/m/Y', strtotime($sale['date_sale'])); ?></td>
			<td><?php echo $sale['status']; ?></td>
			<td>*</td>
		</tr>
	<?php endforeach; ?>
</table>