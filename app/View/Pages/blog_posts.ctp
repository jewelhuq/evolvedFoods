<?php $this->layout = 'evolvedFoods'?>

<div id='sidebar' class='floatLeft'>
	<?php echo $this->Html->image('blogPic.jpg', array('class'=>'floatLeft'))?>
</div>
<div id='rightContent' class='floatRight'>
	<h1>Latest Evolved Musings</h1>
	<?php require(ROOT.'/blog/wp-blog-header.php'); ?>					
	<?php $posts = get_posts('numberposts=10&order=ASC&orderby=post_title');?>
	<?php foreach ($posts as $post) : start_wp(); ?>
		<a href="/blog/index.php?p=<?php the_ID(); ?>"><?php the_title()?></a> - <?php the_date()?><br/>
		<?php echo get_the_excerpt()?>
	<?php endforeach;?>
</div>
<div class='clear'></div>