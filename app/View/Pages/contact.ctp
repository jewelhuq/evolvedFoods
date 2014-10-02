<?php $this->layout = 'evolvedFoods'?>
<?php echo $this->Form->create('User', array(
	'inputDefaults' => array(
		'div' => 'centeredInput'
	)
)); ?>
<fieldset>
	<legend><?php echo $this->Html->image('contactMeButton.jpg');?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('role_id');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('email');
		echo $this->Form->submit();
	?>
</fieldset>
<?php echo $this->Form->end();?>
