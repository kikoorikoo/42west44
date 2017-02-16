<?php
/**
 * The template used for displaying hero content.
 *
 * @package 42west44
 */
?>

<?php if ( has_post_thumbnail() ) : ?>
	<div class="fortytwowestfortyfour-hero">
		<?php the_post_thumbnail( 'fortytwowestfortyfour-hero' ); ?>
	</div>
<?php endif; ?>
