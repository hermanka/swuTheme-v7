<?php 

/*********************
	PAGE NAVI
*********************/

// Numeric Page Navi (built into the theme by default)
function foundation_page_navi($before = '', $after = '') {
	global $wpdb, $wp_query;
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	if ( $numposts <= $posts_per_page ) { return; }
	if(empty($paged) || $paged == 0) {
		$paged = 1;
	}
	$pages_to_show = 7;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if($start_page <= 0) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if(($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if($start_page <= 0) {
		$start_page = 1;
	}
	echo $before.'<nav class="page-navigation"><ul class="pagination"><li>Page : </li>'."";
	if ($start_page >= 2 && $pages_to_show < $max_page) {
		$first_page_text = __( "First", 'swuv7' );
		echo '<li class="bpn-first-page-link"><a href="'.get_pagenum_link().'" title="'.$first_page_text.'">'.$first_page_text.'</a></li>';
	}
	echo '<li class="bpn-prev-link">';
	previous_posts_link('<<');
	echo '</li>';
	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			echo '<li class="current"><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		} else {
			echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		}
	}
	echo '<li class="bpn-next-link">';
	next_posts_link('>>');
	echo '</li>';
	if ($end_page < $max_page) {
		$last_page_text = __( "Last", 'swutheme' );
		echo '<li class="bpn-last-page-link"><a href="'.get_pagenum_link($max_page).'" title="'.$last_page_text.'">'.$last_page_text.'</a></li>';
	}
	echo '</ul></nav>'.$after."";
} /* end page navi */


/*********************
	ADD FOUNDATION MENU TO WORDPRESS
*********************/
// Add "has-dropdown" CSS class to navigation menu items that have children in a submenu.
function nav_menu_item_parent_classing( $classes, $item )
{
    global $wpdb;
    
	$has_children = $wpdb -> get_var( "SELECT COUNT(meta_id) FROM {$wpdb->prefix}postmeta WHERE meta_key='_menu_item_menu_item_parent' AND meta_value='" . $item->ID . "'" );
    
    if ( $has_children > 0 )
    {
        array_push( $classes, "has-dropdown" );
    }
    
    return $classes;
}

add_filter( "nav_menu_css_class", "nav_menu_item_parent_classing", 10, 2 );

//Deletes empty classes and changes the sub menu class name
function change_submenu_class($menu) {
	$menu = preg_replace('/ class="sub-menu"/',' class="dropdown"',$menu);
	return $menu;
}
add_filter ('wp_nav_menu','change_submenu_class');


//Use the active class of the ZURB Foundation for the current menu item. (From: https://github.com/milohuang/reverie/blob/master/functions.php)
function required_active_nav_class( $classes, $item ) {
    if ( $item->current == 1 || $item->current_item_ancestor == true ) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'required_active_nav_class', 10, 2 );


// registering wp3+ menus
register_nav_menus(
array(
'main-nav' => __( 'Main Menu' ),
'ribbon-nav' => __( 'Ribbon Blue Menu' )
)
);

// the ribbon blue menu
function ribbon_nav() {
	// display the wp3 menu if available
    wp_nav_menu(array(
	'container' => false,                           // remove nav container
	'container_class' => '',           // class of container (should you choose to use it)
	'menu' => __( 'Ribbon Blue Menu', 'swuv7' ),  // nav name
	'menu_class' => '',         // adding custom nav class
	'theme_location' => 'ribbon-nav',                 // where it's located in the theme
	'before' => '',                                 // before the menu
	'after' => '',                                  // after the menu
	'link_before' => '',                            // before each link
	'link_after' => '',                             // after each link
	'fallback_cb' => 'ribbon_nav_fallback'      // fallback function
	));
} /* end joints main nav */

function ribbon_nav_fallback(){ ?>
	<ul><li></li></ul>
<?php }	


// the main menu
function main_nav() {
	// display the wp3 menu if available
    wp_nav_menu(array(
	'container' => false,                           // remove nav container
	'container_class' => '',           // class of container (should you choose to use it)
	'menu' => __( 'The Main Menu', 'swuv7' ),  // nav name
	'menu_class' => '',         // adding custom nav class
	'theme_location' => 'main-nav',                 // where it's located in the theme
	'before' => '',                                 // before the menu
	'after' => '',                                  // after the menu
	'link_before' => '',                            // before each link
	'link_after' => '',                             // after each link
	'fallback_cb' => 'main_nav_fallback'      // fallback function
	));
} /* end joints main nav */

// this is the fallback for header menu
function main_nav_fallback() {
	wp_page_menu( array(
	'show_home' => true,
	'menu_class' => 'top-bar top-bar-section',      // adding custom nav class
	'include'     => '',
	'exclude'     => '',
	'echo'        => true,
	'link_before' => '',                            // before each link
	'link_after' => ''                             // after each link
	) );
}

/* GET Menu Name */

function ag_get_theme_menu( $theme_location ) {
	if( ! $theme_location ) return false;
	
	$theme_locations = get_nav_menu_locations();
	if( ! isset( $theme_locations[$theme_location] ) ) return false;
	
	$menu_obj = get_term( $theme_locations[$theme_location], 'nav_menu' );
	if( ! $menu_obj ) $menu_obj = false;
	
	return $menu_obj;
}

function ag_get_theme_menu_name( $theme_location ) {
	if( ! $theme_location ) return false;
	
	$menu_obj = ag_get_theme_menu( $theme_location );
	if( ! $menu_obj ) return false;
	
	if( ! isset( $menu_obj->name ) ) return false;
	
	return $menu_obj->name;
}


/**
 * Template for Some Category
 */
define(SINGLE_PATH, TEMPLATEPATH . '/single');
add_filter('single_template', 'my_single_template');
function my_single_template($single) {
	global $wp_query, $post;
	foreach((array)get_the_category() as $cat) :	
	if(file_exists(SINGLE_PATH . '/' . $cat->slug . '.php'))
	return SINGLE_PATH . '/' . $cat->slug . '.php';	
	else
	return TEMPLATEPATH . '/single.php';
	endforeach;
}

/**
 * New Post Icon
 */

function nu_post($post) {
//add .new-post-today to post_class() if newer than 24hrs

    if( date('U') - get_the_time('U', $post) < 3*24*60*60 )
    return '&nbsp;<img src="'. get_template_directory_uri().'/img/new.gif" />';
}


/**
 * Custom Login Page
 */

function my_custom_login_logo() {
    echo '<style type="text/css">
	body { background: #a3a8ad url('.get_bloginfo('template_url').'/img/pattern-3.png) 0 0 repeat !important; }
        h1 a { background-image:url('.get_bloginfo('template_url').'/img/login.png) !important; }
    </style>';
}
add_action('login_head', 'my_custom_login_logo');
function my_custom_login_url() {
  return site_url();
}
add_filter( 'login_headerurl', 'my_custom_login_url', 10, 4 );


/**
 * Preview post in Homepage
 */

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

// BREADCUMB

function the_breadcrumb() {
    global $post;
    echo '<ul id="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo '</a></li><li class="separator"> / </li>';
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li class="separator"> / </li><li> ');
            if (is_single()) {
                echo '</li><li class="separator"> / </li><li> <a href="#">';
                the_title();
                echo '</a></li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator">/</li>';
                }
                echo $output;
                echo ' <a href="#">'.$title.'</a>';
            } else {
                echo '<li><a href="#"> '.get_the_title().'</a></li>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul>';
}

// WIDGET OPTIONS
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name'=>'Sidebar Kiri Besar',
		'before_widget' => '<div class="small-12 medium-8 large-8 columns ribbon-block-left" data-equalizer-watch>', // Removes <li>
		'after_widget' 	=> '</div></div>', 
		'before_title' 	=> '<h4><i class="fa fa-bookmark"></i> ',
		'after_title' 	=> '</h4><div class="row">',
	));
	register_sidebar(array(
		'name'=>'Sidebar Kanan Home',
		'before_widget' => '<div class="large-12 columns" id="title-block-grey-right" style="border-top: 1px dashed #a0a0a0">', // Removes <li>
		'after_widget' 	=> '</ul></div>', // Removes </li>
		'before_title' 	=> '<i class="fa fa-certificate"></i> ', // Replaces <h2>
		'after_title' 	=> '</div><div class="large-12 columns" style="padding-left:5px"><ul class="fa-ul">', // Replaces </h2>
	));
    register_sidebar(array(
		'name'=>'Sidebar Footer Kanan',
		'before_widget' => '', // Removes </ulli>
		'after_widget' 	=> '', // Removes </li>
		'before_title' 	=> '<h4>', // Replaces <h2>
		'after_title' 	=> '</h4>', // Replaces </h2>
	));
	register_sidebar(array(
		'name'=>'Sidebar Footer Tengah',
		'before_widget' => '', // Removes </ulli>
		'after_widget' => '', // Removes </li>
		'before_title' => '<h4>', // Replaces <h2>
		'after_title' => '</h4>', // Replaces </h2>
	));
	
	register_sidebar(array(
		'name'=>'Sidebar Kiri Single',
		'before_widget' => '<div class="large-12 columns" id="title-block-grey-left" style="border-top: 1px dashed #a0a0a0">', // Removes <li>
		'after_widget' 	=> '</ul></div>', // Removes </li>
		'before_title' 	=> '<i class="fa fa-certificate"></i> ', // Replaces <h2>
		'after_title' 	=> '</div><div class="large-12 columns" style="padding-left:5px"><ul class="fa-ul">', // Replaces </h2>
	));
	
	register_sidebar(array(
		'name'=>'Sidebar Single',
		'before_widget' => '<li>', // Removes <li>
		'after_widget' => '</li>', // Removes </li>
		'before_title' => '<h2>', // Replaces <h2>
		'after_title' => '</h2>', // Replaces </h2>
	));
	}


/**
 * Admin Menu
 */

function swu_admin_menu() {
    add_menu_page('Theme settings', 'SWU Option', 'manage_options', 
        'swu_settings', 'theme_front_page_settings');
    	
    add_submenu_page('tut_theme_settings', 
        'Front Page Elements', 'Halaman Depan', 'manage_options', 
        'swu_settings', 'theme_front_page_settings'); 
	
	//this is a submenu
	add_submenu_page(null, //parent slug
	'Add New Slider', //page title
	'Add New', //menu title
	'manage_options', //capability
	'slider_create', //menu slug
	'slider_create'); //function
	
	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
		'Update slider', //page title
		'Update', //menu title
		'manage_options', //capability
		'slider_update', //menu slug
		'slider_update'
	); //function
}

/* START SLIDER ADMIN SETTING*/


function slider_list () {
?>
<div class="wrap">
	<a style="background-color:#1885ae;padding:5px;color:#fff;margin:8px 0" href="<?php echo admin_url('admin.php?page=slider_create'); ?>">Add New</a>
	<?php
		global $wpdb;
		$rows = $wpdb->get_results("SELECT * from swu_slider");
		echo "<table >";
		echo "<tr><th>ID</th><th>Image</th><th>Detail</th><th>Animation</th><th>action</th></tr>";
		foreach ($rows as $row ){
			echo "<tr>";
			echo "<td>$row->id</td>";
			echo "<td><img src='".$row->image_url."' /></td>";	
			echo "<td><b>$row->detail_title</b><br>$row->detail_content<br>[ $row->more_text ]<hr>Link : $row->hyperlink</td>";		
			echo "<td>$row->animation</td>";		
			echo "<td><a href='".admin_url('admin.php?page=slider_update&id='.$row->id)."'>Update</a></td>";
		echo "</tr>";}
		echo "</table>";
	?>
</div>
<?php
}

function slider_create () {
	$id = $_POST["id"];
	$image_url = $_POST["image_url"];
	$detail_title = $_POST["detail_title"];
	$detail_content = stripslashes($_POST["detail_content"]);
	$more_text = $_POST["more_text"];
	$animation = $_POST["animation"];
	$hyperlink = $_POST["hyperlink"];
	//insert
	if(isset($_POST['insert'])){
		global $wpdb;
		$wpdb->insert(
		'swu_slider', //table
		array('id' => $id,'image_url' => $image_url,'detail_title' => $detail_title,'detail_content' => $detail_content,'more_text' => $more_text,'animation' => $animation,'hyperlink' => $hyperlink), //data
		array('%s','%s','%s','%s','%s','%s','%s') //data format			
		);
		$message.="Slider inserted";
	}
?>
<div class="wrap">
		<h2>Add New slider</h2>
		<?php if (isset($message)): ?><div class="updated"><p><?php echo $message;?></p></div><?php endif;?>
		<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
			<p>Three capital letters for the ID</p>
			<table class='wp-list-table widefat fixed'>
				<tr><th>ID</th>
					<td><input type="text" name="id" value="<?php echo $id;?>"/></td></tr>
				<tr><th>IMAGE URL</th>
					<td><input type="text" name="image_url" value="<?php echo $image_url;?>"/></td></tr>
				<tr><th>TITLE DETAIL</th>
					<td><input type="text" name="detail_title" value="<?php echo $detail_title;?>"/></td></tr>
				<tr><th>CONTENT DETAIL</th>
					<td><textarea name="detail_content"><?php echo $detail_content;?></textarea></td></tr>
				<tr><th>MORE TEXT</th>
					<td><input type="text" name="more_text" value="<?php echo $more_text;?>"/></td></tr>
				<tr><th>ANIMATION</th>
					<td>
						<select name="animation">
							<option value="shake" <?php echo ($animation == 'shake' ? 'Selected' : null) ?>>shake</option>
							<option value="flipInX" <?php echo ($animation == 'flipInX' ? 'Selected' : null) ?>>flipInX</option>
							<option value="fadeInUp" <?php echo ($animation == 'fadeInUp' ? 'Selected' : null) ?>>fadeInUp</option>
							<option value="fadeInDown" <?php echo ($animation == 'fadeInDown' ? 'Selected' : null) ?>>fadeInDown</option>
							<option value="fadeInLeft" <?php echo ($animation == 'fadeInLeft' ? 'Selected' : null) ?>>fadeInLeft</option>
							<option value="fadeInRight" <?php echo ($animation == 'fadeInRight' ? 'Selected' : null) ?>>fadeInRight</option>
							<option value="fadeInUpBig" <?php echo ($animation == 'fadeInUpBig' ? 'Selected' : null) ?>>fadeInUpBig</option>
							<option value="fadeInDownBig" <?php echo ($animation == 'fadeInDownBig' ? 'Selected' : null) ?>>fadeInDownBig</option>
							<option value="fadeInLeftBig" <?php echo ($animation == 'fadeInLeftBig' ? 'Selected' : null) ?>>fadeInLeftBig</option>
							<option value="fadeInRightBig" <?php echo ($animation == 'fadeInRightBig' ? 'Selected' : null) ?>>fadeInRightBig</option>
							<option value="rotateInDownLeft" <?php echo ($animation == 'rotateInDownLeft' ? 'Selected' : null) ?>>rotateInDownLeft</option>
							<option value="rotateInUpRight" <?php echo ($animation == 'rotateInUpRight' ? 'Selected' : null) ?>>rotateInUpRight</option>
						</select>
					</td>
				</tr>
				<tr><th>HYPERLINK</th>
				<td><input type="text" name="hyperlink" value="<?php echo $hyperlink;?>"/></td></tr>
				
			</table>
			<input type='submit' name="insert" value='Save' class='button'>
		</form>
	<a href="<?php echo admin_url('admin.php?page=swu_settings')?>">&laquo; Back to sliders list</a>
	
	</div>
<?php
}

function slider_update () {
	global $wpdb;
	$id = $_GET["id"];
	$image_url = $_POST["image_url"];
	$detail_title = $_POST["detail_title"];
	$detail_content = stripslashes($_POST["detail_content"]);
	$more_text = $_POST["more_text"];
	$animation = $_POST["animation"];
	$hyperlink = $_POST["hyperlink"];
	//update
	if(isset($_POST['update'])){	
		$wpdb->update(
		'swu_slider', //table
		array('image_url' => $image_url,'detail_title' => $detail_title,'detail_content' => $detail_content,'more_text' => $more_text,'animation' => $animation,'hyperlink' => $hyperlink), //data
		array( 'ID' => $id ), //where
		array('%s','%s','%s','%s','%s','%s'), //data format
		array('%s') //where format
		);	
	}
	//delete
	else if(isset($_POST['delete'])){	
		$wpdb->query($wpdb->prepare("DELETE FROM swu_slider WHERE id = %s",$id));
	}
	else{//selecting value to update	
		$sliders = $wpdb->get_results($wpdb->prepare("SELECT * from swu_slider where id=%s",$id));
		foreach ($sliders as $s ){
			$image_url=$s->image_url;
			$detail_title=$s->detail_title;
			$detail_content=$s->detail_content;
			$more_text=$s->more_text;
			$animation=$s->animation;
			$hyperlink=$s->hyperlink;
		}
	}
?>
<div class="wrap">
	<h2>sliders</h2>
	
	<?php if($_POST['delete']){?>
		<div class="updated"><p>slider deleted</p></div>
		<a href="<?php echo admin_url('admin.php?page=swu_settings')?>">&laquo; Back to sliders list</a>
		
		<?php } else if($_POST['update']) {?>
		<div class="updated"><p>slider updated</p></div>
		<a href="<?php echo admin_url('admin.php?page=swu_settings')?>">&laquo; Back to sliders list</a>
		
		<?php } else {?>
		<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
			<table class='wp-list-table widefat fixed'>
				<tr><th>IMAGE URL</th>
				<td><input type="text" name="image_url" value="<?php echo $image_url;?>"/></td></tr>
				<tr><th>TITLE DETAIL</th>
				<td><input type="text" name="detail_title" value="<?php echo $detail_title;?>"/></td></tr>
				<tr><th>CONTENT DETAIL</th>
				<td><textarea name="detail_content"><?php echo $detail_content;?></textarea></td></tr>
				<tr><th>MORE TEXT</th>
				<td><input type="text" name="more_text" value="<?php echo $more_text;?>"/></td></tr>
				<tr><th>ANIMATION</th>
					<td>
						<select name="animation">
							<option value="shake" <?php echo ($animation == 'shake' ? 'Selected' : null) ?>>shake</option>
							<option value="flipInX" <?php echo ($animation == 'flipInX' ? 'Selected' : null) ?>>flipInX</option>
							<option value="fadeInUp" <?php echo ($animation == 'fadeInUp' ? 'Selected' : null) ?>>fadeInUp</option>
							<option value="fadeInDown" <?php echo ($animation == 'fadeInDown' ? 'Selected' : null) ?>>fadeInDown</option>
							<option value="fadeInLeft" <?php echo ($animation == 'fadeInLeft' ? 'Selected' : null) ?>>fadeInLeft</option>
							<option value="fadeInRight" <?php echo ($animation == 'fadeInRight' ? 'Selected' : null) ?>>fadeInRight</option>
							<option value="fadeInUpBig" <?php echo ($animation == 'fadeInUpBig' ? 'Selected' : null) ?>>fadeInUpBig</option>
							<option value="fadeInDownBig" <?php echo ($animation == 'fadeInDownBig' ? 'Selected' : null) ?>>fadeInDownBig</option>
							<option value="fadeInLeftBig" <?php echo ($animation == 'fadeInLeftBig' ? 'Selected' : null) ?>>fadeInLeftBig</option>
							<option value="fadeInRightBig" <?php echo ($animation == 'fadeInRightBig' ? 'Selected' : null) ?>>fadeInRightBig</option>
							<option value="rotateInDownLeft" <?php echo ($animation == 'rotateInDownLeft' ? 'Selected' : null) ?>>rotateInDownLeft</option>
							<option value="rotateInUpRight" <?php echo ($animation == 'rotateInUpRight' ? 'Selected' : null) ?>>rotateInUpRight</option>
						</select>
					</td>
				</tr>
				<tr><th>HYPERLINK</th>
				<td><input type="text" name="hyperlink" value="<?php echo $hyperlink;?>"/></td></tr>
			</table>
			<input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
			<input type='submit' name="delete" value='Delete' class='button' onclick="return confirm('&iquest;Est&aacute;s seguro de borrar este elemento?')">
		</form>
	<?php }?>
	
</div>
<?php
}

function show_slider () {
	global $wpdb;
	return $wpdb->get_results("SELECT * from swu_slider");	 
}

/* END SLIDER  ADMIN SETTING */

function theme_front_page_settings() {
$options = get_option('swuTheme');
if (isset($_POST['data'])&&isset($_POST['title'])&&isset($_POST['show'])&&isset($_POST['order'])) {
$options['cat'] = $_POST['data'];
$options['catTitle'] = $_POST['title'];
$options['catTitle_etc'] = $_POST['title_etc'];
$options['show'] = $_POST['show'];
$options['order'] = $_POST['order'];
$options['cat2'] = $_POST['data2'];
$options['catTitle2'] = $_POST['title2'];
$options['show2'] = $_POST['show2'];
$options['order2'] = $_POST['order2'];
$options['slug_single1'] = $_POST['slug_single1'];
$options['slug_single2'] = $_POST['slug_single2'];
update_option('swuTheme', $options);
}
if ( !current_user_can( 'manage_options' ) )  {wp_die( __( 'You do not have sufficient permissions to access this page.' ) );}
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/app.css" type="text/css" />
<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation.min.js" type="text/javascript"></script>

<div class="wrap">
    <?php screen_icon('themes'); ?> <h2>SWU Options</h2>
<br>
		
<div id="tabs">
	<ul class="tabs" data-tab role="tablist">
		<li class="tab-title active" role="presentational" ><a href="#panel-1" role="tab" tabindex="0" aria-selected="true" controls="panel-1">GREY BOX</a></li>
		<li class="tab-title" role="presentational" ><a href="#panel-2" role="tab" tabindex="0"aria-selected="false" controls="panel-2">Slider</a></li>
	</ul>
	<div class="tabs-content">
		<section role="tabpanel" aria-hidden="false" class="content active" id="panel-1">
			<form method="POST" action="">
				<div class="row left">
			<div class="small-12 medium-6 large-6 columns">
			<h4>Grey Box Left</h4>
							<label for="title">Title</label>
							<input type="text" name="title" value="<?php echo $options['catTitle'];?>" size="25" />
							
							<label for="title">Title lainnya</label>
							<input type="text" name="title_etc" value="<?php echo $options['catTitle_etc'];?>" size="25" />
				
							<label for="slug">Category Slug</label> 
							<input type="text" name="data" value="<?php echo $options['cat'];?>" size="25" />
						
							<label for="show">Showposts</label> 
							<input type="text" name="show" value="<?php echo $options['show'];?>" size="25" />
						
							<label for="order">Order (ASC/DESC)</label> 
							<input type="text" name="order" value="<?php echo $options['order'];?>" size="25" />
			</div>
			<div class="small-12 medium-6 large-6 columns">
			<h4>Grey Box Right</h4>
				<label for="title2">Title</label> 
				<input type="text" name="title2" value="<?php echo $options['catTitle2'];?>" size="25" />
				
				<label for="slug2">Category Slug</label> 
				<input type="text" name="data2" value="<?php echo $options['cat2'];?>" size="25" />
				
				<label for="show2">Showposts</label> 
				<input type="text" name="show2" value="<?php echo $options['show2'];?>" size="25" />
				
				<label for="order2">Order (ASC/DESC)</label> 
				<input type="text" name="order2" value="<?php echo $options['order2'];?>" size="25" />
						
			</div>
					
			</div><br><?php submit_button('simpan'); ?>		
        </form>
		</section>
		<section role="tabpanel" aria-hidden="true" class="content" id="panel-2">
		<?php slider_list (); ?>
		</section>
	</div>

</div>
        

    </div>
<script>
	$(document).foundation();
</script>
<?php
}

// This tells WordPress to call the function named "swu_admin_menu"
// when it's time to create the menu pages.
add_action("admin_menu", "swu_admin_menu");
