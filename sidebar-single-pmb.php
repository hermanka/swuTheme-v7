<?php 
	$slug = 'PMB';
	$catTitle = 'PENERIMAAN MAHASISWA BARU';
	$order = 'asc';
	$category = get_category_by_slug('pmb');
?>

<div class="large-12 columns" id="title-block-grey-left">
	<i class="fa fa-file-text-o"></i><?php echo $catTitle; ?>
</div>
<div class="large-12 columns" style="padding-left:5px">
	<ul class="fa-ul">
		<?php
			if (query_posts('cat='.$category->cat_ID.'&showposts=-1&order='.$order)) : while (have_posts()) : the_post(); 
		?>
		<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?><?php echo nu_post('$post->ID'); ?></a></li>
		<?php endwhile; wp_reset_query();?>
		<?php endif; ?>
	</ul>
</div>