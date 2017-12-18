<?php get_header(); ?>
<?php get_template_part('slider','index'); ?>
	  
<div class="row">
  <div class="large-12 columns">
  <!-- Start: Wrapper --> 
  <div class="wrapper">
  
  <!-- Start: Top Ribbon -->
  <div class="row ribbon" data-equalizer>
	<div class="large-12 columns">	
		<?php get_template_part('ribbon','index'); ?>		
	</div>
  </div>	
  <!-- End: Top Ribbon -->	
	
  <!-- Start: Ribbon grey-->	
  <div class="row ribbon-grey" data-equalizer>
	<div class="large-12 columns">	
		<div class="small-12 medium-8 large-8 columns ribbon-grey-block-left home" data-equalizer-watch>		  
			<?php get_template_part('loop','left'); ?>
		</div>
		<div class="small-12 medium-4 large-4 columns ribbon-grey-block-right home" data-equalizer-watch>
			<?php get_template_part('loop','right'); ?>  
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

