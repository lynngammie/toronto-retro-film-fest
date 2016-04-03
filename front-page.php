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
			  <div class="grid_16 suffix_3 prefix_3 title-content">
					<img src="<?php echo $image[0]; ?>" alt="<?php echo $alt; ?>">
					<div class="title-content-text">
				  	<h1>Toronto Retro Film Festival</h1>
				  	<p class="title-text">Toronto</p>
				  	<p class="retro-text">Retro</p>
				  	<p class="title-text-right">Film Festival</p>
				  	<p class="title-subtext">July 17th - July 23rd</p>
			  	</div>
				</div>

			<?php // Start the loop ?>
	  		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	  			<div class="grid_16 suffix_3 prefix_3 blurb-content">
	  				<p><?php the_content(); ?></p>
	  			</div>
	  	<?php endwhile; // end the loop?>


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

			<div class="tix grid_16 prefix_4 suffix_4">
				<hr class="retro">
				<p class="tix-text">Click for Tix!</p>
				<hr class="retro">
			</div>
			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_footer();
