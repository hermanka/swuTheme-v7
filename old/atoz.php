<?php

/*

Template name: Page: A to Z

*/

?><?php get_header(); ?>
<div class="grid_16"><?php get_template_part('slider','index'); ?></div>
<div class="grid_16"><?php get_template_part('ribbon','index'); ?></div>
<div class="grid_16" id="konten">
<div class="grid_5 alpha"><div id="sidebar-kiri"><?php get_sidebar('single'); ?></div></div>
<div class="grid_11 omega"><div id="konten_kanan"><?php if (function_exists('wp_snap')) { echo wp_snap(); } ?>


<div class="clear"></div>
</div></div>
</div>
<div class="clear"></div>
<?php get_footer(); ?>