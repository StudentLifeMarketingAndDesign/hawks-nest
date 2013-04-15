<h1>News</h1>
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts(array('post__not_in' => get_option('sticky_posts'),'category_name' => 'birdfeeder', 'posts_per_page' => 3,'paged' => $paged ));
while ( have_posts() ) : the_post();
?>
<div class="post">
<h2 class="entry-title">

	<a href="<?php the_permalink(); ?>">
	<?php the_title();?>
	</a>
</h2>
	<div class="the_date">
	<?php the_date();?>
	</div>
	<div class="entry-content">
				<?php the_content("Read More ..."); ?>
				
	</div><!-- .entry-content -->
	</div><!-- .post -->
<?php
endwhile;

?>

<div class="navigation"><p><?php posts_nav_link(); ?></p></div>