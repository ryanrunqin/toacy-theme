<?php

/*--- init css and scripts ---*/
function toacy_script_enqueue(){
	wp_enqueue_style('toacystyle-bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(), '1.0', 'all');
	wp_enqueue_style('toacystyle-theme-plugins', get_template_directory_uri().'/css/theme-plugins.css', array(), '1.0', 'all');
	wp_enqueue_style('toacystyle', get_template_directory_uri().'/style.css', array(), '1.0', 'all');
	wp_enqueue_style('toacystyle-responsive', get_template_directory_uri().'/css/responsive.css', array(), '1.0', 'all');
	wp_enqueue_style('toacystyle-skin', get_template_directory_uri().'/css/skin/skin1.css', array(), '1.0', 'all');
	wp_enqueue_script('toacy-jquery', get_template_directory_uri().'/js/jquery.min.js', array(), '1.0', true);
	wp_enqueue_script('toacy-bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), '1.0', true);
	wp_enqueue_script('toacy-modernizr', get_template_directory_uri().'/js/modernizr.min.js', array(), '1.0', true);
	wp_enqueue_script('toacy-theme-plugins', get_template_directory_uri().'/js/theme-plugins.js', array(), '1.0', true);
	//wp_enqueue_script('toacy-googlemapapi', get_template_directory_uri().'/js/googlemapapi.js', array(), '1.0', true);
	wp_enqueue_script('toacyjs', get_template_directory_uri().'/js/main.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'toacy_script_enqueue');

/*--- replace default menu class name ---*/
function change_submenu_class($menu) {  
  $menu = preg_replace('/ class="sub-menu"/','/ class="drop-down" /',$menu);  
  return $menu;  
}  
add_filter('wp_nav_menu','change_submenu_class');  

/*--- init widgets ---*/
function toacy_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'toacy' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your header.', 'toacy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Header Widget 1', 'toacy' ),
		'id'            => 'header-widget-1',
		'description'   => __( 'Add widgets here to appear in your header.', 'toacy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Header Widget 2', 'toacy' ),
		'id'            => 'header-widget-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'toacy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Header Widget 3', 'toacy' ),
		'id'            => 'header-widget-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'toacy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'toacy' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'toacy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'toacy' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'toacy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	

	register_sidebar( array(
		'name'          => __( 'Services Section', 'toacy' ),
		'id'            => 'services-section',
		'description'   => __( 'Add widgets here to appear in home page services section.', 'toacy' ),
		'before_widget' => '<div class="section-section-inner">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="section-title"><h1>',
		'after_title'   => '</h1></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Process Section', 'toacy' ),
		'id'            => 'process-section',
		'description'   => __( 'Add widgets here to appear in home page process section.', 'toacy' ),
		'before_widget' => '<div class="process-section-inner">',
		'after_widget'  => '</div>',
	) );


	register_sidebar( array(
		'name'          => __( 'Counter Section', 'toacy' ),
		'id'            => 'counter-section',
		'description'   => __( 'Add widgets here to appear in home page counter section.', 'toacy' ),
		'before_widget' => '<div class="counter-section-inner">',
		'after_widget'  => '</div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Contact Section', 'toacy' ),
		'id'            => 'footer-contact-section',
		'description'   => __( 'Add widgets here to appear in footer contact section.', 'toacy' ),
		'before_widget' => '<div class="footer-contact-inner">',
		'after_widget'  => '</div>',
	) );
}
add_action( 'widgets_init', 'toacy_widgets_init' );


add_theme_support( 'post-thumbnails' );


/**
 * Generate breadcrumbs
 */
function get_breadcrumb($hasFeaturedImage) {
	if($hasFeaturedImage)
	{
		echo '<ul class="bread-list">';
		echo '<li><a href="'.home_url().'">Home <i class="fa fa-angle-right"> </i></a></li> ';
	    if (is_category() || is_single()) {
	    	if(is_single())
	    	{
	    		echo '<li class="active"><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
	    	}
	    }
	    elseif (is_page()) {
	    	echo '<li class="active"><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
	    }
	    elseif (is_search()) {
	    	echo the_search_query();
		}

		echo '</ul>';
	}
	else
	{
		echo '<a href="'.home_url().'">Home </a> <i class="fa fa-angle-right"></i> <a href="'.get_permalink().'">'.get_the_title().'</a>';
	}
}