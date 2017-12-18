<?php 
	$options=get_option('swuTheme');
	$slug = $options['cat'];
	$catTitle = $options['catTitle'];
	$catTitle_etc = $options['catTitle_etc'];
	$showposts = $options['show'];
	$order = $options['order'];
	$more_text = $options['more_text'];
	$category = get_category_by_slug($slug);
	?>
<div class="large-12 columns" id="title-block-grey-left">
	<i class="fa fa-file-text-o"></i><?php echo $catTitle; ?>
</div>
<?php
	$ids = array();
	if (query_posts('cat='.$category->cat_ID.'&showposts='.$showposts.'&order='.$order)) : while (have_posts()) : the_post(); 
	$images =& get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
	$firstImageSrc = wp_get_attachment_image_src(array_pop(array_keys($images)));
	
	$ids[] = get_the_ID();
	
	?>
<div class="large-12 columns">	
	<div class="row" style="padding:1rem 0;border-bottom:1px dashed #a0a0a0">	
		<div class="large-2 medium-3 columns show-for-medium-up">
			<?php
				if ( empty($images) ) {
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						echo "<a class='th' href='";
						the_permalink();
						echo "'>";
						the_post_thumbnail('thumbnail');
						echo "</a>";
					} else { 
						echo "<a class='th' href='";
						the_permalink();
						echo "'><img src=\"".get_template_directory_uri()."/img/no-image.jpg\"/></a>";
					} 
				} 
				else { 	
					echo "<a class='th' href='";
					the_permalink();
					echo "'><img src=\"$firstImageSrc[0]\"/></a>";
				}
			?>
			</div>
			<div class="large-10 medium-9 columns">
		<h5><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a><?php echo nu_post('$post->ID'); ?></h5>
		<p><?php echo excerpt(50); ?> <a href="<?php the_permalink() ?>">[ Selengkapnya ]</a></p>
	</div>	
	</div>
</div>
<?php endwhile; wp_reset_query();?>
<?php endif; ?>
<div class="large-12 columns" id="title-block-grey-left">
	<i class="fa fa-folder-open-o"></i><?php echo $catTitle_etc; ?>
	<span class="right">
	<a href="<?php echo get_category_link( $category->cat_ID ); ?>">[ Arsip ]</a></span>
</div>
	<div class="large-12 columns">
<div class="row" style="padding:1rem 0;border-bottom:1px dashed #a0a0a0">
		<div class="large-12 columns">
			<ul style="color: #074e68;">
		<?php
			query_posts(array('post__not_in' => $ids, 'cat' => $category->cat_ID, 'showposts' => 5));
			while (have_posts()) : the_post();
		?>
				<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><b><?php the_title(); ?></b></a></li>
		<?php
			endwhile;
			wp_reset_query();
		?>
</ul>
</div>	
</div>	
</div>	