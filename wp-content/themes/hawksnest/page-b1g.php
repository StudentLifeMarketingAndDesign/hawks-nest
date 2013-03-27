<?php

get_header(); ?>
			<div class="main">

				<div id="content">

					<div id="meat">
					
					<div id="b1glogo"></div>
<?php
	query_posts(array('category_name' => 'b1g-featured', 'posts_per_page' => -1 ));
?>
<div id="b1gpage_meat_long">
	<a href="2011/08/09/b1g/"><div id="see"></div></a>
	<a href="#"><div id="where"></div></a>
	<?php	
	wp_reset_query();
	
	// The Loop
	while ( have_posts() ) : the_post();
		the_content();
	endwhile;
	?>
</div>
<div id="b1gpage_new">
	<?php query_posts(array('category_name' => 'b1g-featured', 'posts_per_page' => -1 ));	
	// The Loop
	while ( have_posts() ) : the_post();
	?>
	<h2>What's New</h2>
	<h3>
	<?php
		the_title();
	?>
	</h3>
	<?php
		the_content();
	?>
	<div class="excerpt">
	<?php if($post->post_excerpt) the_excerpt(); ?>
	</div>
	<?php
	endwhile;
	?>

</div>
					</div><!-- #meat -->
<?php get_sidebar(); ?>
				</div><!-- #content -->
			</div><!-- #main -->
		<div style="clear:both;"></div>
		</div><!-- #wrapper -->
<?php get_footer(); ?>