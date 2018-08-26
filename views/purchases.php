<h1>Compras</h1>

<div class="button">
	<a href="<?php echo BASE_URL; ?>/purchases/add" class="button">Adicionar Compra</a>
</div>

<table border="0" width="100%">
	<tr>
		<th>Nome do Cliente</th>
		<th>Valor</th>
		<th>Data</th>
		<th>Ações</th>
	</tr>
	<?php foreach($purchases_list as $purchase): ?>
		<tr>
			<td><?php echo $purchase['name']; ?></td>
			<td>R$<?php echo number_format($purchase['total_price'], 2, ",", ".") ; ?></td>
			<td><?php echo date('d/m/Y', strtotime($purchase['date_purchase'])); ?></td>
			<td>	
				<a href="<?php echo BASE_URL; ?>/purchases/edit/<?php echo $purchase['id'];?>">
					<div class="button button-small">Visualizar</div>
				</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>