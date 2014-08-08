<div class="fakeshadow"></div>
<div id="header">
	<?php $page_name = $this->request->url; ?>
	<?php echo $this->Html->image($page_name.'_header.jpg');?>
</div>
<div id="nav">
	<ul>
		<li><?php echo $this->Html->image('buttons/regular/home_button.png', array('alt'=>'Home', 'url'=>'www.google.com', 'style'=>'position:relative'))?></li>
		<li><?php echo $this->Html->image('buttons/regular/about_button.png')?></li>
		<li><?php echo $this->Html->image('buttons/regular/blog_button.png')?></li>
		<li><?php echo $this->Html->image('buttons/regular/order_button.png')?></li>
		<li><?php echo $this->Html->image('buttons/regular/contact_button.png')?></li>
	</ul>
	<div class="fakeshadow">
		
	</div>
</div>