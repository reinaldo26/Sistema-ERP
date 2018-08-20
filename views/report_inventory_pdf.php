<?php
require_once("libraries/dompdf/dompdf_config.inc.php");
$dompdf = new DOMPDF();
ob_start(); 
?>

<h1>Relatório de Estoque</h1>

<fieldset>
	Intens com estoque abaixo do mínimo.
</fieldset>
<br/>

<table border="0" width="100%">
	<tr>
		<th style="text-align:left;">Nome</th>
		<th style="text-align:left;">Preço</th>
		<th style="text-align:center;">Quantidade</th>
		<th style="text-align:center;">Quantidade Minima</th>
	</tr>
	<?php foreach($inventory_list as $product): ?>
		<tr>
			<td style="text-align:left;"><?php echo $product['name']; ?></td>
			<td style="text-align:left;">R$<?php echo number_format($product['price'], 2, ',', '.'); ?></td>
			<td style="text-align:center;"><?php 
				if($product['min_quantity'] > $product['quantity']){
					echo "<span style='color:red'>".($product['quantity'])."</span>";
				} else {
					echo $product['quantity']; 
				} ?>
			<td style="text-align:center;"><?php echo $product['min_quantity']; ?></td>
		</tr>
	<?php endforeach; ?>
</table>

<?php
$html = ob_get_contents();
ob_end_clean();

/* Carrega o HTML */
$dompdf->load_html($html);

/* Renderiza */
$dompdf->render();

/* Exibe */
$dompdf->stream("relatorio_de_vendas.pdf", ["Attachment" => false]); // download set true
?>