<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.png" />	  
	<title><?php is_home() ? wp_title(' ') : wp_title(' ') ?> | <?php bloginfo('title');?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/app.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animate-custom.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" type="text/css" />
	<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/foundation.min.js" type="text/javascript"></script>
	  <script language="javascript">
		  <!--
		  if (navigator.appName == "Microsoft Internet Explorer") {
			  document.location = "<?php echo home_url(); ?>/ie"; 
		  } 
		  // -->
	  </script>
<?php wp_head(); ?>
</head>
	<body>
		<?php show_slider(); ?>
	<!-- start : vtop-header -->
	<div id="vtop-header">
		<div class="row">
			<div class="large-12 columns">
				<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" />
				
			</div>
		</div>
	</div> <!-- end : vtop-header -->
	<!-- start : top-header -->
	<div id="top-header">
		<div class="row">
			<div class="large-12 columns">
				<!-- Start: Header -->
				<header id="header">					
					<div class="row">
						<div class="large-12 columns">							
							<nav class="top-bar" data-topbar>
								<ul class="title-area">
									<!-- Title Area -->
									<li class="name">
										<h1><a href="<?php echo home_url(); ?>" rel="nofollow"><i class="fa fa-home"></i></a></h1>
									</li>
									<li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
								</ul>								
								<section class="top-bar-section bg-blue">									
									<?php main_nav(); ?>
									<ul class="right">
										<li class="has-form">
											<div class="row collapse">
												<div class="small-8 large-7 columns">
													<input type="text" placeholder="Search">
												</div>
												<div class="small-3 large-3 end columns">
													<a href="#" class="primary button expand">Go</a>
												</div>
											</div>
										</li>
									</ul>
								</section>
							</nav>
							
						</div>
					</div>
				</header>
				<!-- End: Header -->
			</div>
		</div> <!-- End: Row header-->	  
	</div>
	
	
