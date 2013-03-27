<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
			<div class="main">

				<div id="content">

					<div id="meat">

			<div id="post-0" class="post error404 not-found">
				<h1 class="entry-title"><?php _e( 'Not Found', 'twentyten' ); ?></h1>
				<div class="entry-content">
					<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'twentyten' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</div><!-- #post-0 -->
			
					</div><!-- #meat -->
<?php get_sidebar(); ?>
				</div><!-- #content -->
			</div><!-- #main -->
		<div style="clear:both;"></div>
		</div><!-- #wrapper -->
<?php get_footer(); ?>