<?php
/**
 * Template Name: Secondary Page
 * Template Post Type: post, page, event
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
get_header(); ?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header alignfull">
		
			<div class="wp-block-group alignfull page-splash has-black-color has-text-color has-background" style="background-color:#48348d">
			<div class="wp-block-group__inner-container">
		<?php the_post_thumbnail('post-thumbnail', ['class' => 'page-splash--img', 'title' => 'Feature image']); ?>
		<?php the_title( '<h1 class="entry-title alignwide page-splash--title has-white-color">', '</h1>' ); ?>
		</div></div>
	</header>

	<div class="entry-content">

		<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
				'after'    => '</nav>',
				/* translators: %: page number. */
				'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer alignwide">
		<?php twenty_twenty_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php if ( ! is_singular( 'attachment' ) ) : ?>
		<?php get_template_part( 'template-parts/post/author-bio' ); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
