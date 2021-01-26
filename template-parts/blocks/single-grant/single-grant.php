<?php
/**
 * Single Grant Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'single-grant-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'single-grant';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assing defaults.
$fpip = get_field('block_single_grant');
?>
<!--Markup for Expand/Collapse-->
<?php
	// check if the flexible content field has rows of data
	if( have_rows('block_single_grant') ):		
		 // loop through the rows of data
?>	
	<section class="grant-container <?php echo $className ?>">		
		<?php
			$b = 0;
			while ( have_rows('block_single_grant') ) : the_row();
			$image = get_sub_field('image');
			$amount = get_sub_field('amount'); 
			$partner = get_sub_field('partner'); 
			$description = get_sub_field('description');
			$id = get_sub_field('id');
			$b++;
		?>
        <div id="<?php echo $id; ?>" class="grant single-grant">

            <!-- <img class="grant--image" src="<?php echo $image?>"> -->
            <?php echo wp_get_attachment_image( $image, 'large' );?>
            <p class="grant--amount"><?php the_sub_field('amount'); ?></p>
            <div class="grant--info">
                <h3 class="grant--partner"><?php the_sub_field('partner');?></h3>
                <p><?php the_sub_field('description');?></p>	
            </div>
		</div>
	
<?php endwhile; ?>
           
            </section>
<?php else : ?>
<!--	// no layouts found -->
<?php endif; ?>				
