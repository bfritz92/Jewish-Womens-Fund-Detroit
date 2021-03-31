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
		      			<input type="text" name="term" id="term" placeholder="Enter search term">
						  <label for="cars">Choose a Year:</label>
						<select id="year" name="year">
							<option value="IN">Any</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
						</select> 
		      			<button type="sumbit" class="submit">Search</button>
	      			</form>
	   			</div>
			
	</header>

	<div class="entry-content">

		<?php
        $term = sanitize_text_field($_GET['term']);
		$year = sanitize_text_field($_GET['year']);
        if(empty($term)){
           $term = 'grants';
        }
		if(empty($year)){
			$year = 'IN';
		 }
		echo do_shortcode('[ajax_load_more archive="true" post_type="post" category="grants" posts_per_page="10"  search="'. $term .'" year="'. $year .'"]');
        ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer alignwide">
		<?php twenty_twenty_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php get_footer(); ?>