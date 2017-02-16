<?php
/**
 * The template for displaying single event spaces.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package 42west44
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

						$sqft = get_field('sqft');
						$capacity = get_field('capacity');
						$size = "full";
						$featured_photo = get_field('featured_photo');
						?>

						<h1 class="space-name"><?php echo the_title(); ?></h1>
						<article class="event-space">
							<aside class="event-space-sidebar">
								<?php if($capacity) { ?>
									<h3>Capacity: <?php echo $capacity; ?> people
										<?php if($sqft) { ?>
											| Size: <?php echo $sqft; ?> sqft
										<?php } ?>
									</h3>
								<?php } ?>
							</aside>
							<div class="event-space-content">
								<?php
									get_template_part( 'components/post/content', get_post_format() ); ?>
										<!-- my post format is <?php echo get_post_format(); ?> -->
								<?php if($featured_photo) { ?>
								<?php echo wp_get_attachment_image( $featured_photo, $size );?>
								<?php } else { ?>
								<!-- no photo -->
								<?php } ?>
							</div>
						</article>
		<?php
		endwhile; // End of the loop.
		?>

		</main>
	</div>
<?php
get_sidebar();
get_footer();
