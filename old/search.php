<?php get_header(); ?>
<div class="grid_16"><?php get_template_part('slider','index'); ?></div>
<div class="grid_16"><?php get_template_part('ribbon','index'); ?></div>
<div class="grid_16" id="konten">
<div class="grid_5 alpha"><div id="sidebar-kiri"><?php get_sidebar('single'); ?></div></div>
<div class="grid_11 omega"><div id="konten_kanan"><?php get_template_part('loop-search','index'); ?></div></div>
</div>
<?php get_footer(); ?>