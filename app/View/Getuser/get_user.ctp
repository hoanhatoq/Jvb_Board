<div class="Ge tUser">
	<table border ="1" width="50%">
		<tr>
			<th>Username</th>
		<td>	<div class="username"><?php echo h($user['User']['username']);?></div></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><div class="email"><?php echo h($user['User']['email_add']);?></div></td>
		</tr>
		<tr>
			<th>Fullname</th>
			<td><div class="fullname"><?php echo h($user['User']['fullname']);?></div></td>
		</tr>
		<tr>
			<th>Nickname</th>
			<td><div class="nickname"><?php echo h($user['User']['nickname']);?></div></td>
		</tr>
		<tr>
			<th>Team</th>
			<td><div class="Team"> <?php echo h($user['Team']['name']);?></div></td>
		
		</tr>
		<tr>
			<th>Role</th>
			<td><div class="Role"><?php echo h($user['Role']['value']);?></div></td>
		</tr>
		<tr>
			<th>Slogan</th>
			<td><div class="slogan"><?php echo h($user['User']['slogan']);?></div></td>
		</tr>
			
	</table>
	
	<?php echo $this->html->link('Back','index');?>
	<?php echo $this->Html->link('Update',array('action' => 'updateUser', $user['User']['user_id']));?>
    
</div>
	