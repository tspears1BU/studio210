<?php
/*
Template Name: Quarter
*/
?>

<?php get_header(); ?>

<div id="container">

		

	<div class="production-content">
		 
        <div class="row">
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
    			<?php if(function_exists('bcn_display'))
    				{
        				bcn_display();
    			}?>
			</div> 
		</div>  
		
		<div class="row">
		<h1 class="titlebanner"><?php the_title(); ?></h1>
		
		<div class="production-postarea">	
	<?php $daddy = get_the_ID(); ?>

	<?php
	$args = array(
	'post_type' => 'production',
	'posts_per_page' => -1,
	'post_parent' => $daddy,
	'orderby' => 'menu_order', 
	'order' => 'ASC'
	);
	$wp_query2 = new WP_Query( $args ); ?>
			
<?php if($wp_query2->have_posts()) : while($wp_query2->have_posts()) : $wp_query2->the_post(); ?>
            <?php global $more; $more = 0; ?>
            
            <div class="well">
            
				<h4><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>
	            
	            
	        <?php
		$dir_id = 1; 
		if(get_field('director'))
		{
			while(the_repeater_field('director')): 
				if(get_sub_field('dir_role') == "Director")
				{
					if($dir_id <= 1)
					{				
					echo '<p><strong>Director: </strong>' . get_sub_field('dir_name') .' ';
					}
					else
					{
					echo '/ ' . get_sub_field('dir_name') .' ';
					}
				$dir_id ++;
				}
			endwhile;
			echo '</p>';
		} ?>

		<?php 
		$wri_id = 1;
		if(get_field('playwright'))
		{
			
			while(the_repeater_field('playwright')): 
				if(get_sub_field('writer_role') == "Playwright")
				{
					if($wri_id <= 1)
					{
					echo '<p><strong>Playwright: </strong>' . get_sub_field('writer_name') .' ';
					}
					else
					{
					echo '/ ' . get_sub_field('writer_name') .' ';
					}
				$wri_id ++;
				}
			endwhile;
			echo '</p>';
		} ?>
		
		<p><strong>Performance Venue:</strong> <?php the_field('performance_venue'); ?></p>
	            
		          
	            	                                   
            </div>

			<?php endwhile; ?>
			
			<div class="pagination">
				<?php if (function_exists("number_paginate")) { number_paginate(); } ?>
			</div>
            
            <?php else : // do not delete ?>

            <h3><?php _e("Page Not Found", 'organicthemes'); ?></h3>
            <p><?php _e("We're sorry, but the page you're looking for isn't here.", 'organicthemes'); ?></p>
            <p><?php _e("Try searching for the page you are looking for or using the navigation in the header or sidebar", 'organicthemes'); ?></p>

			<?php endif; // do not delete ?>
		
		</div><!-- End Production Postarea---->
		
	</div><!---End Row ------>	
	</div><!-- End Production-Content ------>
</div>

<?php get_footer(); ?>