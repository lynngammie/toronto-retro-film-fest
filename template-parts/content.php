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

		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'toronto-retro-film-fest' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'toronto-retro-film-fest' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->



	<footer class="entry-footer">
		<?php toronto_retro_film_fest_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
