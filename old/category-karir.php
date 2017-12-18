<?php get_header(); ?>
<div class="grid_16"><?php get_template_part('slider','index'); ?></div>
<div class="grid_16"><?php get_template_part('ribbon','index'); ?></div>
<div class="grid_16" id="konten">
<div class="grid_5 alpha"><div id="sidebar-kiri">
<div class="sidebar">
<!-- Sidebar widgets -->
<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Kiri') ) : else : ?>
	<?php endif; ?>
</ul>
<div class="konten_box">
<?php 
	
	$slug2 = 'karir';
	$category2 = get_category_by_slug($slug2);
	?><div class="hentry-left">Lowongan Kerja</div>
	<ul>
	<?php
	if (query_posts('cat='.$category2->cat_ID.'&showposts=15&orderby=title&order=ASC')) : while (have_posts()) : the_post(); 
	?>
	<a href="<?php the_permalink() ?>" rel="bookmark"><li class="list-box"><?php the_title(); ?></li></a>
	<?php endwhile; wp_reset_query();?>
	</ul>
<?php endif; ?>
<div class="clear"></div>
</div>
</div>

</div></div>
<div class="grid_11 omega"><div id="konten_kanan">
<div class="hentry-left"><?php printf( __( '%s', '' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></div>
	<?php if (have_posts()) : while (have_posts()) : the_post();
	$images =& get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
	$firstImageSrc = wp_get_attachment_image_src(array_pop(array_keys($images)));
	echo "<div class=\"hentry\" id=\"archive\">";
	if ( empty($images) ) {	null; } 
	else { 	
	echo "<div class=\"thumbnail featured\"><div class=\"thumbnail-in featured\" style=\"background:url($firstImageSrc[0]) center no-repeat\"></div></div>";
	} ?>
	<div class="sticky-header">
	<h2 class="entry-title">
	<a href="<?php the_permalink() ?>" rel="bookmark" title="Read more for <?php the_title(); ?>"><?php the_title(); ?></a>
	</h2></div><!-- .sticky-header -->
	<div class="entry-summary"><p><?php echo excerpt(45); ?></p></div>
	</div><!-- .hentry post-->
    <?php endwhile; else: ?>
	<?php _e('Sorry, no posts matched your criteria.'); ?>
<?php endif; ?>

<?php 
global $wp_query;

$total_pages = $wp_query->max_num_pages;

if ($total_pages > 1){
$big = 999999999; // need an unlikely integer
  $current_page = max(1, get_query_var('paged'));
  
  echo '<div class="pagination">Page : ';
  
  echo paginate_links(array(
      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format' => '/page/%#%',
      'current' => $current_page,
      'total' => $total_pages,
	  'prev_next'    => False,
      'prev_text' => 'Prev',
	  'end_size'     => 2,
      'next_text' => 'Next'
    ));

  echo '</div>';
  
} ?>

<div class="clear"></div>
</div></div>
</div>
<?php get_footer(); ?>