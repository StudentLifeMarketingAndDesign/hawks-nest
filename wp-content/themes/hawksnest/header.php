<?php
/**
 * The Header for our theme!!!
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<link href='http://fonts.googleapis.com/css?family=Jockey+One' rel='stylesheet' type='text/css'>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

<!-- Camera -->
    
    <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/camera/scripts/jquery.min.js'></script>
    <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/camera/scripts/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/camera/scripts/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/camera/scripts/camera.js'></script> 
    <link rel='stylesheet' id='camera-css'  href='<?php echo get_template_directory_uri(); ?>/camera/css/camera.css' type='text/css' media='all'> 

    <script>
		jQuery(function(){
			
			jQuery('#camera_wrap_1').camera({
				height: '300px',
				pagination: false,
			});
		});
		
		function showFancy() {
			jQuery('#fancybox').fadeIn('slow');
		}
		
		function hideFancy() {
			jQuery('#fancybox').fadeOut('fast');
		}
	</script>
</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

		<a href="<?php echo home_url( '/' ); ?>">
		<div id="head">
        <a href="http://www.uiowa.edu/"><div id="dome"></div></a>
		<div id="nav">
		<div id="nav-wrapper">
           <div id="nav-left" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content' ); ?>"><?php _e( 'Skip to content' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				<?php wp_nav_menu( array('menu' => 'primary-left' )); ?>
		  </div>
           <div id="nav-right" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content' ); ?>"><?php _e( 'Skip to content' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				<?php wp_nav_menu( array('menu' => 'primary-right' )); ?>
		  </div>
		</div>
		</div>
		</a>
	</div>

		<div id="logo"></div>
		</div>
		  
		  

<div class="wrapper">
	<div class="main">
