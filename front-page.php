<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Toronto_Retro_Film_Fest
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php if (has_post_thumbnail( $post->ID ) ): ?>
			  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			  <?php $thumbnail_id = get_post_thumbnail_id( $post->ID );
	    	    		 $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
			  <?php endif; ?>
			  <div class="grid_10">
			  	<h1>Toronto Retro Film Festival</h1>
			  	<p class="title-text">Toronto</p>
			  	<p class="retro-text">Retro</p>
			  	<p class="title-text">Film Festival</p>
			  	<p class="title-subtext">July 17th - July 23rd</p>
					<img src="<?php echo $image[0]; ?>" alt="<?php echo $alt; ?>">
				</div>

			<?php // Start the loop ?>
	  		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	  			<p><?php the_content(); ?></p>
	  	<?php endwhile; // end the loop?>


			<!-- create a custom loop to grab the movie posters -->
	  	<?php $posterQuery = new WP_Query(array(
	  	    'post_type' => 'movie-post',
	  	    'order' => 'ASC'
	  	)); ?>

	  	<?php if ($posterQuery-> have_posts()): ?>
	  	  <?php while($posterQuery-> have_posts()): ?>
	  	    <?php $posterQuery->the_post(); ?>
	  	    <!-- what we want to show goes here -->
					<a href="<?php echo get_post_permalink(); ?>">
	  	    	<img src="<?php the_field('movie_poster') ?>" alt="">
	  	    </a>
	  	  	<?php endwhile; ?>
	  	  <?php wp_reset_postdata(); ?>
	  	<?php endif; ?>


			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_footer();
