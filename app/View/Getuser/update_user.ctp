<div class="EditUser">

		<h1>Edit User</h1>
		<?php echo $this->Form->create('User'); ?>
		<?php echo $this->Form->input('user_id', array('type'=>'hidden')); ?>		
				
		<div id="email"><?php echo $this->Form->input('email_add');?></div>
		<div id="fullname"><?php echo $this->Form->input('fullname');?></div>		
		<div id="nickname"><?php echo $this->Form->input('nickname');?></div>
		<div id="slogan"><?php echo $this->Form->input('slogan');?></div>
		<div id="team"><?php echo $this->Form->input('team_id', array('label' => 'Team <br>', 'options' => $teams));?></div>
		<div id="role"><?php echo $this->Form->input('role_id', array('label'=>'Role <br>','options'=>$teams1)); ?></div>
		<?php echo $this->Form->input('status', array('type'=>'hidden')); ?>
		<?php echo $this->Form->input('create_time', array('type'=>'hidden')); ?>
		<?php echo $this->Form->input('update_time', array('type'=>'hidden')); ?>
		<?php echo $this->Form->end(__('Save '));?>
		

</div>

