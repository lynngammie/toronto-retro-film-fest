<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Toronto_Retro_Film_Fest
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php toronto_retro_film_fest_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="movie-poster grid_7">
			<img src="<?php the_field('movie_poster')?>" alt="">
		</div>
		<div class="movie-info grid_8 prefix_1">
			<h4><?php the_title(); ?></h4>
			<p class="movie-date">
				<?php the_field('date')?>
			</p>
			<p class="movie-time">
				<?php the_field('time')?>
			</p>
			<div class="movie-flex">
				<div class="movie-blurb grid_4">
					<?php the_content(); ?>
				</div>
				<div class="movie-deets grid_3">
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
	</div><!-- .entry-content -->



	
</article><!-- #post-## -->
