<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header alignwide">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php twenty_twenty_one_post_thumbnail(); ?>
		<h3>Testing</h3>
	</header>

	<div class="entry-content">
	<div class="feature-grants">
			<div>
			<h4><a href="<?php the_permalink(); ?>"><?php the_field ('name_of_organization'); ?></a></h4>
			<p class="grant--title"><strong><?php the_title(); ?></strong></p>
			<ul class="grant--info mt1">
				<li>
					<strong>City/State:</strong>
					<br />
					<?php the_field ('city_state_country'); ?>
				</li>
				<li>
					<strong>Amount:</strong>
					<br />
					$ <?php the_field ('grant_amount'); ?> 
				</li>
				<li>
					<strong>Year:</strong>
					<br />
					<?php the_field ('year_grant_made'); ?> 
				</li>
			</ul>
			<?php the_excerpt(); ?>
			<?php 
				if ( has_post_thumbnail() ) {
					echo '<p>';
					the_post_thumbnail("small");
					echo '</p>';
				}
			?>
			<figure class="wp-block-image size-large grant--logo">
				<img src="<?php the_field ('organization_logo'); ?>" width="300" height="62">
			</figure>
			
			</div>
		</div>
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
