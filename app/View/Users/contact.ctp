<?php $this->layout = 'evolvedFoods'?>

<?php echo $this->Form->create('User', array(
	'inputDefaults' => array(
		'div' => 'centeredInput'
	)
)); ?>
<fieldset>
	<legend><?php echo $this->Html->image('contactMeButton.jpg');?></legend>
	<?php 
		if ($sent){
			echo "Your contact request has been sent.  Someone from Evolved Foods will get back to you soon!";
		}
		else{
			echo $this->Form->input('first_name', array('value'=>'Jasmun'));
			echo $this->Form->input('last_name', array('value'=>'Hendrick'));
			echo $this->Form->input('email', array('value'=>'jasmun@gmail.com'));
			echo $this->Form->input('message', array('type'=>'textarea', 'placeholder'=>'Tell us a bit about your food preferences', 'id'=>'messageTextArea'));
			echo $this->Form->submit();
		}
	?>
</fieldset>
<?php echo $this->Form->end();?>
