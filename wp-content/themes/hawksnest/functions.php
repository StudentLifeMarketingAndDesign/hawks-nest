<?php

$content_width = "500px";

add_theme_support( 'menus' );
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'top-menu' => 'Header Navigation'
		)
	);
}

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 80, 80 ); // 50 pixels wide by 50 pixels tall, box resize mode

//Custom Post Types

//add_action( 'init', 'create_post_type' );
//function create_post_type() {
//	register_post_type( 'event',
//		array(
//			'labels' => array(
//				'name' => __( 'Events' ),
//				'singular_name' => __( 'Event' )
//			),
//		'public' => true,
//		'has_archive' => true,
//		)
//	);
//	register_post_type( 'board',
//		array(
//			'labels' => array(
//				'name' => __( 'Board Members' ),
//				'singular_name' => __( 'Board Member' )
//			),
//		'public' => true,
//		'has_archive' => true,		)
//	);
//	register_post_type( 'b1g_featured',
//		array(
//			'labels' => array(
//				'name' => __( 'B1G Featured Posts' ),
//				'singular_name' => __( 'B1G Featured Post' )
//			),
//		'public' => true,
//		'has_archive' => true,
//		)
//	);
//}

// Post Types

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'slider',
		array(
			'labels' => array(
				'name' => __( 'Slider Content' ),
				'singular_name' => __( 'Slider Content' )
			),
		'public' => true,
		'has_archive' => true,
		'exclude_from_search' => true,
		'supports' => array( 'title', 'editor', 'thumbnail' )
		)
	);
}

// Add Read More link to manual excerpts.
//add_action('the_excerpt', 'child_add_manual_read_more', 20);
//function child_add_manual_read_more($excerpt) {
 
//    if ( has_excerpt() ) {
 
        // Trim the newline.
//        $excerpt = rtrim($excerpt);
 
        // Check for the <p> tags
//        if ( '<p>' == substr($excerpt, 0, 3) && '</p>' == substr($excerpt, -4) )
//            $excerpt = sprintf( '<p>%s <a href="%s" rel="nofollow" class="morelink">Read More ...</a></p>', substr($excerpt, 3, -4), get_permalink() );
//    }
//    return $excerpt;
//}

// Include all the Shortcodes

foreach (glob("wp-content/themes/hawksnest/shortcodes/*.php") as $filename)
{
    include $filename;
}

// Exclude stuff from stuff

add_filter( 'getarchives_where', 'customarchives_where' );
add_filter( 'getarchives_join', 'customarchives_join' );

function customarchives_join( $x ) {

	global $wpdb;

	return $x . " INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) INNER JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)";

}

function customarchives_where( $x ) {

	global $wpdb;

	$exclude = '2,3,5,6,7,8'; // category id to exclude

	return $x . " AND $wpdb->term_taxonomy.taxonomy = 'category' AND $wpdb->term_taxonomy.term_id NOT IN ($exclude)";

}




?>

<?php
//Check see if the customisetheme_setup exists
if ( !function_exists('customisetheme_setup') ):
    //Any theme customisations contained in this function
    function customisetheme_setup() {
        //Define default header image
        define( 'HEADER_IMAGE', '%s/images/home.jpg' );
        //Define the width and height of our header image
        define( 'HEADER_IMAGE_WIDTH', apply_filters( 'customisetheme_header_image_width', 520 ) );
        define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'customisetheme_header_image_height', 347 ) );
        //Turn off text inside the header image
        define( 'NO_HEADER_TEXT', true );
        //Don't forget this, it adds the functionality to the admin menu
        add_custom_image_header( '', 'customisetheme_admin_header_style' );
        //Set some custom header images, add as many as you like
        //%s is a placeholder for your theme directory
       // $customHeaders = array (
                //Image 1
        //        'perfectbeach' => array (
        //        'url' => '%s/header/default.jpg',
        //        'thumbnail_url' => '%s/header/thumbnails/pb-thumbnail.jpg',
        //        'description' => __( 'Perfect Beach', 'customisetheme' )
        //    ),
                //Image 2
        //        'tiger' => array (
        //        'url' => '%s/header/tiger.jpg',
        //        'thumbnail_url' => '%s/header/thumbnails/tiger-thumbnail.jpg',
        //        'description' => __( 'Tiger', 'customisetheme' )
        //    ),
                //Image 3
        //        'lunar' => array (
        //        'url' => '%s/header/lunar.jpg',
        //        'thumbnail_url' => '%s/header/thumbnails/lunar-thumbnail.jpg',
        //        'description' => __( 'Lunar', 'customisetheme' )
        //    )
        //);
        //Register the images with WordPress
        register_default_headers($customHeaders);
    }
endif;
if ( ! function_exists( 'customisetheme_admin_header_style' ) ) :
    //Function fired and inline styles added to the admin panel
    //Customise as required
    function customisetheme_admin_header_style() {
    ?>
        <style type="text/css">
            #wpbody-content #headimg {
                height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
                width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
                border: 0px;
            }
        </style>
    <?php
    }
endif;
//Execute our custom theme functionality
add_action( 'after_setup_theme', 'customisetheme_setup' );
?>