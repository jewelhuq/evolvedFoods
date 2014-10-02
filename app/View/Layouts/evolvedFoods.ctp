<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Evolved Foods, LLC
	</title>
	<?php echo $this->Html->meta('icon')?>	
	<?php echo $this->Html->script('jquery-1.11.1.min');?>
	<?php 
		echo $this->Html->css('main');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id='container'>
		<?php echo $this->element('topBar');?>
		
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
</body>
</html>