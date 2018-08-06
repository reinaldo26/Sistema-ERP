<h1>Usuários</h1>

<div class="button">
	<a href="<?php echo BASE_URL; ?>/users/add" class="button">Adicionar Usuário</a>
</div>
		
<table border="0" width="100%">
	<tr>
		<th>Usuário</th>
		<th>E-mail</th>
		<th width="145">Grupo de Permissões</th>
		<th width="160" style="text-align:center;">Ações</th>
	</tr>
		<?php foreach($users_list as $user): ?>
		<tr>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td style="text-align:center;"><?php echo $user['p_name']; ?></td>
			<td>
				<div class="button button-small">
					<a href="<?php echo BASE_URL; ?>/users/edit/<?php echo $user['id'];?>">Editar</a>
				</div>	

				<div class="button button-small">
					<a href="<?php echo BASE_URL; ?>/users/delete/<?php echo $user['id'];?>" onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
				</div>
			</td>
		</tr>	
	<?php endforeach; ?>
</table>