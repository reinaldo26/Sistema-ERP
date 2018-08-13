<h1>Clientes</h1>

<?php if($edit_permission): ?>
<div class="button">
	<a href="<?php echo BASE_URL; ?>/clients/add" class="button">Adicionar Cliente</a>
</div>
<?php endif; ?>

<input type="text" id="search" data-type="searchClients"/>
		
<table border="0" width="100%">
	<tr>
		<th>Nome</th>
		<th>E-mail</th>
		<th>Telefone</th>
		<th>Cidade</th>
		<th>Estrelas</th>
		<th width="160" style="text-align:center;">Ações</th>
	</tr>
		<?php foreach($clients_list as $client): ?>
		<tr>
			<td><?php echo $client['name']; ?></td>
			<td><?php echo $client['email']; ?></td>
			<td><?php echo $client['phone']; ?></td>
			<td><?php echo $client['address_city']; ?></td>
			<td style="text-align: center;"><?php echo $client['stars']; ?></td>
			<td style="text-align: center;">
			<?php if($edit_permission): ?>
				<div class="button button-small">
					<a href="<?php echo BASE_URL; ?>/clients/edit/<?php echo $client['id'];?>">Editar</a>
				</div>	

				<div class="button button-small">
					<a href="<?php echo BASE_URL; ?>/clients/delete/<?php echo $client['id'];?>" onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
				</div>
			<?php else: ?>
				<div class="button button-small">
					<a href="<?php echo BASE_URL; ?>/clients/view/<?php echo $client['id'];?>">Visualizar</a>
				</div>
			<?php endif; ?>
			</td>
		</tr>	
	<?php endforeach; ?>
</table>

<div class="pagination">
	<?php for($i=1; $i<=$page_count; $i++): ?>
		<div class="page_item <?php echo($i==$p)?'page_active':''; ?>"><a href="<?php echo BASE_URL; ?>/clients?p=<?php echo $i; ?>"><?php echo $i; ?></a></div>
	<?php endfor; ?>
</div>

<div style="clear:both;"></div>