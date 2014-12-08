<div class="fakeshadow"></div>
<div id="header">
	<?php $page_name = $this->request->params['action']; ?>
	<?php echo $this->Html->image($page_name.'_header.jpg');?>
</div>
<div id="nav">
	<ul>
		<li><?php echo $this->Html->image('buttons/regular/home_button.png', array('alt'=>'Home', 'url'=>array('action'=>'home', 'controller'=>'pages')))?></li>
		<li><?php echo $this->Html->image('buttons/regular/about_button.png', array('alt'=>'About Me', 'url'=>array('action'=>'about', 'controller'=>'pages')))?></li>
		<li><?php echo $this->Html->image('buttons/regular/blog_button.png', array('alt'=>'Blog', 'url'=>array('action'=>'blogPosts', 'controller'=>'pages')))?></li>
		<li><?php echo $this->Html->image('buttons/regular/order_button.png', array('alt'=>'Order', 'url'=>array('action'=>'order', 'controller'=>'pages')))?></li>
		<li><?php echo $this->Html->image('buttons/regular/contact_button.png', array('alt'=>'Contact', 'url'=>array('action'=>'contact', 'controller'=>'users')))?></li>
	</ul>
	<div class="fakeshadow">
		
	</div>
</div>