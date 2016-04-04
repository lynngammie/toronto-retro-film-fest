<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Toronto_Retro_Film_Fest
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			// the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		<!-- create a custom loop to grab the movie posters -->
	  	<?php $posterQuery = new WP_Query(array(
	  	    'post_type' => 'movie-post',
	  	    'order' => 'ASC'
	  	)); ?>

	  	<div class="gallery-container grid_16 prefix_2 suffix_2">
	  		<p class="arrows grid_1" id="prev"><<</p>
	  		<ul class="gallery">

			  	<?php if ($posterQuery-> have_posts()): ?>
			  	  <?php while($posterQuery-> have_posts()): ?>
			  	    <?php $posterQuery->the_post(); ?>
			  	    <!-- what we want to show goes here -->
			  	    <li class="gallery-item grid_2">
							<a href="<?php echo get_post_permalink(); ?>">
			  	    	<img src="<?php the_field('movie_poster') ?>" alt="">
			  	    </a>
			  	    </li>
			  	  	<?php endwhile; ?>
			  	  <?php wp_reset_postdata(); ?>
			  	<?php endif; ?>
				
				</ul>
				<p class="arrows grid_1" id="next">>></p>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
