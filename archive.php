<?php get_header(); ?>
<?php get_template_part('slider','index'); ?>
<div class="row">
  <div class="large-12 columns">
  <!-- Start: Wrapper --> 
  <div class="wrapper">

	  
  <!-- Start: Ribbon grey-->	
  <div class="row ribbon-grey" data-equalizer>
	<div class="large-12 columns">	
		<div class="small-12 medium-4 large-4 columns ribbon-grey-block-left-single show-for-medium-up" data-equalizer-watch>		  
		<?php get_sidebar('single'); ?>	
		</div>
		<div class="small-12 medium-8 large-8 columns ribbon-grey-block-right-single" data-equalizer-watch>
			<div class="large-12 columns" id="title-block-grey-right"><?php the_breadcrumb(); ?></div>
			<?php
				if (have_posts()) : while (have_posts()) : the_post();
				$images =& get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
				$firstImageSrc = wp_get_attachment_image_src(array_pop(array_keys($images)));
			?>
			
			<div class="large-12 columns">	
				<div class="row" style="padding:1rem 0;border-bottom:1px dashed #a0a0a0">	
					<div class="large-3 medium-4 columns">
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
					<div class="large-9 medium-8 columns">
						<h5><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a><?php echo nu_post('$post->ID'); ?></h5>
						<p><?php echo excerpt(25); ?> <a href="<?php the_permalink() ?>">[ Selengkapnya ]</a></p>
					</div>	
				</div>
			</div>
			<?php endwhile; wp_reset_query();?>
			<?php endif; ?>
			<div class="large-12 columns">	
			<div class="row" style="padding:.5rem 0 0 .5rem;">
				<?php foundation_page_navi();?>
			</div>
			</div>
						
		</div>
	  </div>
  </div>
  <!-- End: Ribbon grey-->	
		 
  <!-- Start: Footer-->
  <div class="row">
    <div class="large-12 columns">		
	    <?php get_footer(); ?>              
  </div>
  </div> 
  <!-- End: Footer-->	
  
  </div> <!-- End: wrapper-->
  </div> 	
</div> 
