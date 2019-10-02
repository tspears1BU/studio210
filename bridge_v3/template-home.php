<?php
/**
Template Name: Home Page
*
* This template is used to display a home page with a featured slideshow and posts.
*
* @package Portfolio
* @since Portfolio 5.0
*
*/
get_header(); ?>

<!-- BEGIN .row -->
	<div class="row">
	
		<!-- BEGIN .small-12 columns -->
		<div class="sixteen">
	   		
	   		<?php get_template_part( 'content/slider', 'home' ); ?>
	    
	    <!-- END .columns -->
	    </div>
	
	<!-- END .row -->      
	</div>
	
	<div class="row">
	
		<!-- BEGIN .small-12 columns -->
		<div class="sixteen">
	   		
	   		<?php get_template_part( 'content/boxes', 'home' ); ?>
	    
	    <!-- END .columns -->
	    </div>
	
	<!-- END .row -->      
	</div>
	
	<div class="row">
		<div class="half">
			<div class="homeCalendar">
				<h3><?php the_field('calendar_left_title'); ?></h3>
				<?php the_field('calendar_left'); ?>
			</div>
		</div>
		<div class="half last">
			<div class="homeCalendar">
				<h3><?php the_field('calendar_right_title'); ?></h3>
				<?php the_field('calendar_right'); ?>	
			</div>
		</div>
	</div> <!-- End .row -->
	
	<hr/>
	
	
	<div class="row">
		<div class="sixteen instagram_feed">
			<h3><a href="<? the_field('instagram_link'); ?>" target="_blank"><?php the_field('instagram_icon'); ?> <?php the_field('instagram_heading'); ?></a></h3>
			<div>
				<?php the_field('instagram_shortcode'); ?>
				
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>
