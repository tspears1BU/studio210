<?php
/*
Template Name: Script 
*/
?>

<?php get_header(); ?>

<div id="container">

	<div class="production-content">
        
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>    
	    
            <h1 class="titlebanner"><?php the_title(); ?></h1>
          	<div class="production-postarea"> 

				<a class="button" href="<?php the_field('script_library_location') ?>"target="_blank">Download</a>

				<p><?php _e("Filed under", 'organicthemes'); ?>: <strong><?php the_field('script_library_type'); ?></strong></p>

				<?php endwhile; else: ?>
				<p><?php _e("Sorry, page not found.", 'organicthemes'); ?></p>
				<?php endif; ?>
           
            </div> <!-- End Post Area -->
    </div>
        
        
</div>



<?php get_footer(); ?>