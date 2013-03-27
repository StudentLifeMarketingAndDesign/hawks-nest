<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
			<div class="main">

				<div id="content">

					<div id="meat">
					<div id="slider">
				
        <div class="camera_wrap" id="camera_wrap_1">
				<?php
				$args = array( 'post_type' => 'slider', 'posts_per_page' => 99, 'order' => 'ASC' );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
   					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
					echo '<div data-src="'.$image[0].'">';
					echo '<div class="camera_caption_';
					echo get_post_meta($post->ID, 'alignment', true);
					echo ' fadeFromBottom"><div class="slide_title">';
					the_title();
					echo '</div>';
					echo '<div class="slide_descr">';
					echo '</div></div></div>';
				endwhile;
				?>
        </div><!-- #camera_wrap_1 -->
        
            </div>
            <br />
            <div class="clear"></div>
					<!--<div id="home_pic">
					 <img id="headerimg" src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="Iowa Hawksnest" />
					</div>-->
           			<div id="birdfeeder_logo"></div>

			<?php
			/* Run the loop to output the posts.
			 * If you want to overload this in a child theme then include a file
			 * called loop-index.php and that will be used instead.
			 */
			 get_template_part( 'loop', 'index' );
			?>
					</div><!-- #meat -->
<?php get_sidebar(); ?>
				</div><!-- #content -->
			</div><!-- #main -->
		<div style="clear:both;"></div>
		</div><!-- #wrapper -->
<?php get_footer(); ?>