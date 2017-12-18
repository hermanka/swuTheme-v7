<div class="row">
  <div class="large-12 columns">
			  <!-- Start: Banner -->
			  <section id="banner">
				  <div class="row">
					  <div class="small-12 columns">
						  <ul data-orbit data-options="timer_speed:8000; navigation_arrows: false;bullets:true;  pause_on_hover: true; resume_on_mouseout: true;" >
							 <?php
							 $rows = show_slider ();
							  foreach ($rows as $slider ){
								?>
									<li>
								  <div class="row slider-box" data-equalizer>
									  <div class="slider-details small-12 large-6 medium-6 columns" data-equalizer-watch>
										  <!-- <h2 class="custom-animated fadeInUpBig">Build with foundation 4</h2> -->
										  <h4 class="custom-animated <?php echo $slider->animation; ?>"><?php echo $slider->detail_title; ?></h4>
										  <p class="custom-animated <?php echo $slider->animation; ?>"><?php echo $slider->detail_content; ?>
											<br />
											<?php if (!empty($slider->hyperlink)) { ?>
											<a href="<?php echo $slider->hyperlink; ?>" class="button tiny"><?php echo $slider->more_text; ?></a>
											<?php
											} else { null; } ?>
										  </p>
									  </div>
									  <div class="slider-image small-12 large-6 medium-6 columns custom-animated <?php echo $slider->animation; ?>" data-equalizer-watch>
		<img class="show-for-medium-up" src="<?php echo $slider->image_url; ?>" />
									  </div>
								  </div>
							  </li>
							  <?php } ?>
						  </ul>
					  </div>
				  </div>
			  </section>
	  <!-- End: Banner -->
  </div>
</div>