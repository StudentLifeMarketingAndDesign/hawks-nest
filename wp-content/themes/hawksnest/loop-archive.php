<?php
# Exclude categories | archive.php
global $wpdb;
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    query_posts(
        array_merge(
            array
            (
                'category__in' => array(4),
                'category__not_in' => array(2,3,5,6,7,8),
                'paged' => $paged
            ), $wp_query->query
        )
    );
// The Loop
while ( have_posts() ) : the_post();?>
<h2 class="entry-title">

	<a href="<?php the_permalink(); ?>">
	<?php the_title();?>
	</a>
</h2>
	<div class="entry-content">
				<?php the_content("Read More ...") ?>
				
	</div><!-- .entry-content -->
<?php
endwhile;

?>

<div class="navigation"><p><?php posts_nav_link(); ?></p></div>