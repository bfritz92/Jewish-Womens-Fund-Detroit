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
	
						<ul class="alm-filter-nav">
						<li><a href="#" data-repeater="template_8" data-post-type="portfolio" data-posts-per-page="3" data-scroll="false" data-button-label="More Work">Recent Work</a></li>
						<li><a href="#" data-repeater="default" data-post-type="post" data-posts-per-page="5" data-scroll="true" data-button-label="More Articles">Recent Articles</a></li>
						</ul>
	      			</form>
	   	</div>
		</div>
	</header>

	<div class="entry-content">

		<?php
        $term = sanitize_text_field($_GET['term']);
        if(empty($term)){
           $term = 'grant';
        }
		echo do_shortcode('[ajax_load_more post_type="post" posts_per_page="10" category="grants" category__not_in="7,6" search="'. $term .'"]');
        ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer alignwide">
		<?php twenty_twenty_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php get_footer(); ?>