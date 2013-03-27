<?php

// The Loop
while ( have_posts() ) : the_post();?>
<h2 class="entry-title">

	<a href="<?php the_permalink(); ?>">
	<?php the_title();?>
	</a>
</h2>
	<div class="entry-content">
				<?php echo apply_filters('the_content',get_the_content("Read More ...")) ?>
				
	</div><!-- .entry-content -->
<?php
endwhile;

// Reset Query
wp_reset_query();

?>