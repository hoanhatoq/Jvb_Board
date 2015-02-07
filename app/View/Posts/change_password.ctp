<div class="Change Password">
		<h1>Change PassWord</h1>
		<?php echo $this->Form->create('User'); ?>
		<?php echo $this->Form->input('user_id', array('type'=>'hidden')); ?>
		<div id="password"><?php echo $this->Form->input('password');?></div>
		<?php echo $this->Form->input('email_add', array('type'=>'hidden'));?>
		<?php echo $this->Form->input('fullname', array('type'=>'hidden'));?>	
		<?php echo $this->Form->input('nickname', array('type'=>'hidden'));?>
		<?php echo $this->Form->input('slogan', array('type'=>'hidden'));?>
		<?php echo $this->Form->input('status', array('type'=>'hidden')); ?>
		<?php echo $this->Form->input('create_time', array('type'=>'hidden')); ?>
		<?php echo $this->Form->input('update_time', array('type'=>'hidden')); ?>
		<?php echo $this->Form->end(__('Save '));?>
</div>
