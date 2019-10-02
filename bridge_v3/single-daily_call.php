<?php
/*
Template Name: Daily Call
*/
?>

<?php get_header(); ?>

<div id="container">

	<div class="production-content">
    
        <div class="production-postarea">
    
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            	<?php $prods = get_field('dc_production');
					if($prods): foreach($prods as $p):
				?>
			<h3><a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a> | <?php the_field('call_type'); ?></h3>
				<?php endforeach; endif; ?>
				
				<h2><?php the_title(); ?></h2>
		          
				<small><strong>Published on:</strong> <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?> by <?php the_author_posts_link(); ?> &middot; Views: <?php if(function_exists('the_views')) { the_views(); } ?></small>
         
         		<hr />
          
			<div class="padded">
          		<?php $dcfile = get_field('dc_file');
					if($dcfile) : ?>
				<a class="button" target="_blank" style="margin-bottom: 15px;" href="<?php the_field('dc_file'); ?>">Download</a>
          		<?php endif; ?>
           		<?php the_content(__("Read More", 'organicthemes'));?>
           </div>
            
            	<div style="clear:both;"></div>
            
            <?php endwhile; else: ?>
			<p><?php _e("Sorry, page not found.", 'organicthemes'); ?></p>
			<?php endif; ?>
            
        </div>

	</div>

</div>

<?php get_footer(); ?>