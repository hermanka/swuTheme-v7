<!-- start : ribbon -->						  

<!-- Sidebar widgets -->
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Kiri Besar') ) : else : ?>
<?php endif; ?>
	<!-- <div class="large-3 medium-4 columns"><img src="<?php echo get_template_directory_uri(); ?>/img/team_1.jpg"/></div>
	<div class="large-9 medium-8 columns"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque nostrum! Unde, voluptates suscipit repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque nostrum! Unde, voluptates suscipit repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque nostrum! Unde, voluptates suscipit repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque nostrum! Unde, voluptates suscipit repudiandae!</p>
	</div> -->

<div class="small-12 medium-4 large-4 columns ribbon-block-right" data-equalizer-watch>
  <h4 ><i class="fa fa-mortar-board"></i><?php echo ag_get_theme_menu_name('ribbon-nav'); ?></h4>
<?php ribbon_nav(); ?>
</div>
<!-- end : ribbon -->	