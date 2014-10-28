<?php $this->layout = 'evolvedFoods'?>

<fieldset id="orderFieldset">
	<legend><?php echo $this->Html->image('todayButton.jpg');?></legend>
	<?php echo __('To order from Evolved Foods, please fill out our ')?>
	<?php echo $this->Html->link('contact form', array('controller'=>'users', 'action'=>'contact'))?>
	<?php echo __(', or call us at 970-484-9975')?>
</fieldset>
