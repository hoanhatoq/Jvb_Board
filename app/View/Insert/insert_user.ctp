	
	<div class="Insert Form">
		
		<?php echo $this->Form->create('User');?>
		<legend><?php echo __(''); ?></legend>	
		<div id="username"><?php echo $this->Form->input('username');?></div>
		<div id="password"><?php echo $this->Form->input('password');?></div>
		<div id="email"><?php echo $this->Form->input('email_add');?></div>
		<div id="nickname"><?php echo $this->Form->input('nickname');?></div>
		<div id="fullname"><?php echo $this->Form->input('fullname');?></div>
		<div id="team"><?php echo $this->Form->input('team_id', array('label' => 'Team <br>', 'options' => $newTeam));?></div>
		<div id="role"><?php echo $this->Form->input('role_id',array('label' => 'Role <br>', 'options' => $newRole));?></div>
		<div id="slogan"><?php echo $this->Form->input('slogan');?></div>
		<?php echo $this->Form->end('Save ');?>
			
	</div>
