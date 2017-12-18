<div class="large-12 columns" id="title-block-grey-right"><?php the_breadcrumb(); ?></div>
<div class="large-12 columns">	
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post clearfix" id="post-<?php the_ID(); ?>">
					
					<div class="large-12 medium-12 columns" style="margin-top:25px">
						<h4 style="font-weight:bold"><i class="fa fa-file-text-o fa-2x"></i> <?php the_title(); ?></h4>
						<p style="border-bottom:1px dashed #a0a0a0;text-align:right"><?php 
							$category = get_the_category();
							if (($category[0]->slug=='berita')||($category[0]->slug=='pengumuman'))
							{
							?>							
							<i class="fa fa-calendar"></i><?php the_time('j F Y') ?>
							<?php } ?></p>
						</div>
					<div class="large-12 medium-12 columns">
						<?php the_content('Read the rest of this entry &raquo;'); ?>
						<div class="clear"></div>
					</div>
					
				</div>
				
				<?php comments_template(); ?>
				
				<?php endwhile; else: ?>
				
				<h1 class="title">Not Found</h1>
				<p>I'm Sorry,  you are looking for something that is not here. Try a different search.</p>
				
				<?php endif; ?>
</div>