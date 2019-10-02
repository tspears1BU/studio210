<?php
/*
Template Name: Cast List
*/
?>

<?php get_header(); ?>

<div id="container">

	<div class="production-content">
	<h1><?php the_title(); ?> - Cast List</h1>

		<div class="production-postarea">	
	
<?php $daddy = get_the_ID(); ?>
	<?php
	$args = array(
	'post_type' => 'cast',
	'posts_per_page' => -1,
	'post_parent' => $daddy,
	'orderby' => 'menu_order', 
	'order' => 'ASC'
);
$wp_query2 = new WP_Query( $args ); ?>
			
<?php if($wp_query2->have_posts()) : while($wp_query2->have_posts()) : $wp_query2->the_post(); ?>

<div id="cast_production" class="well">
 <?php
		$posts = get_field('casting_show');
 
if($posts): ?>
	
	<?php foreach($posts as $post):  ?>
	
<?php $postid = get_the_ID(); ?>
<?php
	$args4 = array(
	'post_type' => 'cast',
	'posts_per_page' => 10,
	'orderby' => 'date', 
	'order' => 'DESC',
	'meta_query' => array(
		array(
		'key' => 'casting_show',
		'value' => '"' . $postid . '"',
		'compare' => 'LIKE' 
		)
	)
); ?>
<?php $wp_query4 = new WP_Query( $args4 ); ?>	    
<small><?php echo get_the_title($daddy); ?></small>
<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>	    	

<div class="padded">
<h5>Production Info</h5>
<table class="table table-striped table-bordered"><tbody>
<?php $dirs = get_field('director'); if($dirs) {
	foreach($dirs as $dir)
	{
		echo '<tr><td style="width:45%;><div class="dc_text"><strong>' . $dir['dir_role'] . '</strong></div></td><td><div class="dc_text">' . $dir['dir_name'] .'</div></td></tr> ';
	}
} ?>

<?php $wris = get_field('playwright'); if($wris) {
	foreach($wris as $wri)
	{
		echo '<tr><td style="width:45%;><div class="dc_text"><strong>' . $wri['writer_role'] . '</strong></div></td><td><div class="dc_text">' . $wri['writer_name'] .'</div></td></tr> ';
	}
} ?>

</tbody></table>
<table class="table table-striped table-bordered"><tbody>
<?php $halls = get_field('rehearsal_hall'); if($halls) {
		foreach($halls as $hall) {
			echo '<tr>
			<td style="width:45%";>
				<div class="dc_text"><strong>Rehearsal Hall</strong></div>
			</td>
			<td>
				<div class="dc_text">' . $hall['rehearsal_hall_name'] . '</div>
			</td>
		</tr>';
		}
} ?>
<tr>
<td style="width:45%;"><div class="dc_text"><strong>Performance Venue</strong></div></td>
<td><div class="dc_text"><?php the_field('performance_venue'); ?></div></td>
</tr>
<tr>
<td style="width:45%;"><div class="dc_text"><strong>1st Rehearsal</strong></div></td>
<td><div class="dc_text"><?php the_field('first_rehearsal_date'); ?></div></td>
</tr>

</tbody></table>
     

 <?php if($wp_query4->have_posts()) : while($wp_query4->have_posts()) : $wp_query4->the_post(); ?>   

            
                <?php 
					$castings = get_field('casting_cast');
					if($castings) 
					{
					echo'<h5>Cast</h5>
					     <table class="table table-striped table-bordered"><tbody>'; 
					foreach($castings as $casting)
						{ echo'
							<tr>
							<td style="width:45%;><div class="dc_text"><strong>' . $casting['casting_cast_role'] . '</strong></div></td>
							<td><div class="dc_text">' . $casting['casting_cast_person'] . '</div></td>
							
							</tr>
							';
						}
					echo'</tbody></table>';
					}
				?>
							
		   	</div>
		   	<?php endwhile; endif; ?>

<?php endforeach; ?>
<?php endif; ?>  
         
                <small>Last Modified: <?php the_modified_date('F j, Y'); ?> at <?php the_modified_date('g:i a'); ?>&nbsp;<?php _e("by", 'organicthemes'); ?> <?php the_author_posts_link(); ?></small>

	</div><!--end of cast_production ID--->    
	
			<div style="clear:both;"></div>
			<?php trackback_rdf(); ?>

			<?php endwhile; ?>

            <?php else : // do not delete ?>

            <h3><?php _e("Page Not Found", 'organicthemes'); ?></h3>
            <p><?php _e("We're sorry, but the page you're looking for isn't here.", 'organicthemes'); ?></p>
            <p><?php _e("Try searching for the page you are looking for or using the navigation in the header or sidebar", 'organicthemes'); ?></p>

			<?php endif; // do not delete ?>
		
		</div>
		
	</div>
		
</div>

<?php get_footer(); ?>