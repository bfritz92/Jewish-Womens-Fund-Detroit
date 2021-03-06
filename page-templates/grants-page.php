<?php
/**
 * Template Name: Grants Page
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
		<div class="has-black-color has-text-color has-background" style="background-color:#48348d">
		<?php the_title( '<h1 class="alignwide has-white-color pb1">', '</h1>' ); ?>
        <div class="search-box">
	      			<form action="" method="get" _lpchecked="1">
		      			<label class="offscreen" for="term">Enter Search term</label>
		      			<input type="text" name="term" id="term" placeholder="Enter search term" value="Search for a Grant">
		      			<button type="sumbit" class="submit">Search</button>
	      			</form>
	   			</div>
		</div>
	</header>

	<div class="entry-content">

		<?php
        $term = sanitize_text_field($_GET['term']);
        
		echo do_shortcode('[ajax_load_more post_type="post" posts_per_page="10" category="grants" category__not_in="7,6" search="'. $term .'"]');
        ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer alignwide">
		<?php twenty_twenty_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php get_footer(); ?>