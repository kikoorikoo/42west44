<?php
/**
 * The static front page template
 *
 * @package 42west44
 */

if ( 'posts' == get_option( 'show_on_front' ) ) :

	get_template_part( 'index' );

else :

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="hometext animate-reveal animate-first">
					<?php the_content(); ?>
					<p class="animate-reveal animate-third"><a href="<?php echo site_url('/contact'); ?>" class="btn">Request a Tour</a></p>
				</div>
			<?php endwhile; ?>
		</main>
	</div>
<?php get_footer(); ?>

<?php endif; ?>
