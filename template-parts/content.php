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
		<?php
		endif; ?>

		<nav>
			<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<?php $thumbnail_id = get_post_thumbnail_id( $post->ID );
	    	    		 $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
			<?php endif; ?>
			<a class="media-center" href="<?php echo get_home_url(); ?>
">
				<img src="<?php echo $image[0]; ?>" alt="<?php echo $alt; ?>">
			</a>
			<div class="nav-text-container">
				<p class="nav-text">July 17th-July 23rd</p>
				<p class="nav-text">The Docks Drive-In Theatre</p>
				<p class="nav-text">176 Cherry Street, Toronto</p>
			</div>
			<div class="tix">
				<hr class="retro">
				<p class="tix-text">Tickets!</p>
				<hr class="retro">
			</div>
		</nav>
	</header><!-- .entry-header -->
	
	<div class="entry-content sixteen columns offset-by-one">
		<div class="movie-poster six columns">
			<img src="<?php the_field('movie_poster')?>" alt="">
		</div>
		<div class="movie-info eight columns offset-by-one">
			<h4><?php the_title(); ?></h4>
			<p class="movie-date">
				<?php the_field('date')?>
			</p>
			<p class="movie-time">
				<?php the_field('time')?>
			</p>
			<div class="movie-flex">
				<div class="movie-blurb four columns">
					<?php the_content(); ?>
				</div>
				<div class="movie-deets three columns">
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
