<?php 
	$options=get_option('swuTheme');
	$slug = $options['cat'];
	$catTitle = $options['catTitle'];
	$showposts = $options['show'];
	$order = $options['order'];
	$category = get_category_by_slug($slug);
	$slug2 = $options['cat2'];
	$catTitle2 = $options['catTitle2'];
	$showposts2 = $options['show2'];
	$order2 = $options['order2'];
	$category2 = get_category_by_slug($slug2);
?>
<div class="large-12 columns" id="title-block-grey-left">
	<i class="fa fa-bullhorn"></i><?php echo $catTitle2; ?>
	<span class="right"><a href="<?php echo get_category_link( $category2->cat_ID ); ?>"><i class="fa fa-rss"></i></a></span>
</div>
<div class="large-12 columns" style="padding-left:5px">
	<ul class="fa-ul">
		<?php
			if (query_posts('cat='.$category2->cat_ID.'&showposts='.$showposts2.'&order='.$order2)) : while (have_posts()) : the_post(); 
		?>
		<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?><?php echo nu_post('$post->ID'); ?></a></li>
		<?php endwhile; wp_reset_query();?>
		<?php endif; ?>
	</ul>
</div>

<div class="large-12 columns" id="title-block-grey-left">
	<i class="fa fa-file-text-o"></i><?php echo $catTitle; ?>
	<span class="right"><a href="<?php echo get_category_link( $category->cat_ID ); ?>"><i class="fa fa-rss"></i></a></span>
</div>
<div class="large-12 columns" style="padding-left:5px">
	<ul class="fa-ul">
		<?php
			if (query_posts('cat='.$category->cat_ID.'&showposts='.$showposts.'&order='.$order)) : while (have_posts()) : the_post(); 
		?>
		<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?><?php echo nu_post('$post->ID'); ?></a></li>
		<?php endwhile; wp_reset_query();?>
		<?php endif; ?>
	</ul>
</div>

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Kiri Single') ) : else : ?>
<?php endif; ?>
			