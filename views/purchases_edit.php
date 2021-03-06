<h1>Compras - Editar</h1>

<strong>Nome do Revendedor</strong><br/>
<?php echo $purchases_info['info']['reseller_name']; ?><br/><br/>

<strong>Data da Venda</strong><br/>
<?php echo date('d/m/Y', strtotime($purchases_info['info']['date_purchase'])); ?><br/><br/>

<strong>Total</strong><br/>
<?php echo number_format($purchases_info['info']['total_price'], 2, ',', '.'); ?><br/><br/>

<table border="0" width="100%">
	<tr>
		<th>Nome do Produto</th>
		<th>Quantidade</th>
		<th>Preço Unitatio</th>
		<th>Preço Total</th>
	</tr> 
	<?php foreach($purchases_info['products'] as $product): ?>
		<tr>
			<td><?php echo $product['name']; ?></td>
			<td><?php echo $product['quantity']; ?></td>
			<td><?php echo number_format($product['purchase_price'], 2, ",", "."); ?></td>
			<td><?php echo number_format($product['purchase_price']*$product['quantity'], 2, ",", "."); ?></td>
		</tr> 
	<?php endforeach; ?>
</table>