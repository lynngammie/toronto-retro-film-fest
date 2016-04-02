<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Toronto_Retro_Film_Fest
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

    	<?php $movieQuery = new WP_Query(array(
    	    'post_type' => 'movie-post',
    	    // 'orderby' => 'title',
    	    // 'order' => 'ASC',
    	    'posts-per-page' => 1
    	)); ?>
    	
    	<?php if ($movieQuery-> have_posts()): ?>
    	  <?php while($movieQuery-> have_posts()): ?>
    	    <?php $movieQuery->the_post(); ?>
					<div class="movie-poster">
						<img src="<?php the_field('movie_poster')?>" alt="">
					</div>
					<div class="movie-info">
						<h4><?php the_title(); ?></h4>
						<p class="movie-date">
							<?php the_field('date')?>
						</p>
						<p class="movie-time">
							<?php the_field('time')?>
						</p>
						<div class="movie-flex">
							<p class="movie-blurb">
								<?php the_content(); ?>
							</p>
							<div class="movie-deets">
								<h5>Starring</h5>
								<p class="movie-text"><?php the_field('starring') ?></p>
								<h5>Run Time</h5>
								<p class="movie-text"><?php the_field('run_time') ?></p>
								<h5>Original Release</h5>
								<p class="movie-text"><?php the_field('original_release') ?></p>
							</div>
							<?php the_field('trailer') ?>
						</div> <!-- close movie-flex --> 
					</div>

    	  	<?php endwhile; ?>
    	  <?php wp_reset_postdata(); ?>
    	<?php endif; ?>
     
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
