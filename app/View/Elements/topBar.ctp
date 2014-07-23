<div id='header'>
	<?php $page_name = substr($this->here, 1); ?>
	<?php echo $this->Html->image($page_name.'_header.jpg');?>
	<?php //echo $this->Html->image('green_line_horizontal.jpg'); ?>
	<hr>
	<ul>
		<li><?php echo $this->Html->image('buttons/regular/home_button.png')?></li>
		<li><?php echo $this->Html->image('buttons/regular/about_button.png')?></li>
		<li><?php echo $this->Html->image('buttons/regular/blog_button.png')?></li>
		<li><?php echo $this->Html->image('buttons/regular/order_button.png')?></li>
		<li><?php echo $this->Html->image('buttons/regular/contact_button.png')?></li>
	</ul>
</div>