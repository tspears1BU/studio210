<?php
/*
Template Name: Cast Show
*/
?>

<?php get_header(); ?>

<div id="container">

	<div class="production-content">	

		<div class="production-postarea">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php $parentLink = get_permalink($post->post_parent); ?>
			
<?php
		$posts = get_field('casting_show');
 
if( $posts ): ?>
	
	<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
		<?php setup_postdata($post); ?>
	    <div id="cast_production">
			<h3><a href="<?php echo $parentLink ?>"><?php echo get_the_title($post->post_parent); ?></a> | Cast List</h3>
<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<small>Published: <?php the_time(__("M j, Y", 'organicthemes')) ?>&nbsp;<?php _e("by", 'organicthemes'); ?> <?php the_author_posts_link(); ?><span id="pa_print"> &nbsp; &middot; &nbsp; Views: <?php echo get_post_meta(get_the_ID(), 'views', true); ?></span></small>
<hr />	    	

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

  <?php endforeach; ?>
	
	<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php else: ?>
 
	<h1><?php the_title(); ?></h1>

 <?php endif; ?>         

            
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
           
	</div><!--end of cast_production ID--->    
            	
			<div style="clear:both;"></div>
			<?php trackback_rdf(); ?>
			

			

		<?php endwhile; else: ?>
		<p><?php _e("Sorry, no posts matched your criteria.", 'organicthemes'); ?></p>
		<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>