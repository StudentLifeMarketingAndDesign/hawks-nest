<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
			<div class="main">

				<div id="content">

					<div id="meat">

			<?php
			/* Run the loop to output the post.
			 * If you want to overload this in a child theme then include a file
			 * called loop-single.php and that will be used instead.
			 */
			get_template_part( 'loop', 'single' );
			?>
					</div><!-- #meat -->
<?php get_sidebar(); ?>
				</div><!-- #content -->
			</div><!-- #main -->
		<div style="clear:both;"></div>
		</div><!-- #wrapper -->
<?php get_footer(); ?>
