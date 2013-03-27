<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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

// The Loop
while ( have_posts() ) : the_post();?>


					<div id="We_Are"></div>
					<div id="about_content">
<?php
					the_content('Read more...');
?>
				
	</div><!-- .entry-content -->
	<div id="about_pics">
	<?php
	
	// The Query
query_posts('showposts=-1&category_name=board&meta_key=order&orderby=meta_value&order=ASC');?>

<?php // The Loop
while ( have_posts() ) : the_post();
	$title = get_post_custom_values('title');?>

<div class="about_group">
<?php
	if ( has_post_thumbnail() ) { ?>
	<div class="thumb"><?php the_post_thumbnail(); ?></div>
<?php
} else {
	// the current post lacks a thumbnail
}
?>	
	<div class="board_name"><?php the_title(); ?></div>
	<div class="board_title"><?php echo $title[0]; ?></div>
	
	
</div><!-- .about_group -->

<?php	
endwhile;

// Reset Query
wp_reset_query();

?>
	
	</div><!-- #about_pics -->
<?php
endwhile;

// Reset Query
wp_reset_query();

?>
					</div><!-- #meat -->
<?php get_sidebar(); ?>
				</div><!-- #content -->
			</div><!-- #main -->
		<div style="clear:both;"></div>
		</div><!-- #wrapper -->
<?php get_footer(); ?>
