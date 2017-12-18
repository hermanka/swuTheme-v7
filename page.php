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
			<?php get_template_part('post','konten'); ?>
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