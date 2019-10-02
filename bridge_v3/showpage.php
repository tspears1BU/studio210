<?php
/*
Template Name: Production
*/
?>

<?php get_header(); ?>

<div id="container">

	
	<div class="production-content">
    
        
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
    	
        <div class="row sixteen">
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
    			<?php if(function_exists('bcn_display'))
    				{
        				bcn_display();
    			}?>
			</div> 
		</div>   
	    
        <div class="row sixteen">
            <h1 class="titlebanner">
				<?php the_title(); ?>
       		</h1>
        	<?php $postid = get_the_ID(); ?>
	
<?php
	$args2 = array(
	'post_type' => 'script',
	'posts_per_page' => -1,
	'orderby' => 'title', 
	'order' => 'ASC',
	'meta_query' => array(
		array(
		'key' => 'script_library_production',
		'value' => '"' . $postid . '"',
		'compare' => 'LIKE' 
			)
		)
	); ?> 
	
<?php $wp_query2 = new WP_Query( $args2 ); ?>


<?php $args3 = array(
	'post_type' => 'daily_call',
	'posts_per_page' => 10,
	'meta_query' => array(
		array(
		'key' => 'dc_production',
		'value' => '"' . $postid . '"',
		'compare' => 'LIKE' 
			)
		)
	); ?>
	
<?php $wp_query3 = new WP_Query( $args3 ); ?>
		
<?php $args4 = array(
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
		
<?php	$designTab = get_field('designers');
	$techTab = get_field('technical_team');
	$crewTab = get_field('crew');
	$stagecraftTab = get_field('stagecraft');
?>

          <div class="production-postarea">  

<div id="responsiveTabs" class="organic-tabs ui-tabs"> 
  <ul id="tabs" class="ui-tabs-nav ui-helper-reset ui-helper-clearfix" role="tablist">
    <li class="ui-state-default ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tab-1" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true"><a href="#tab-1" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1"><i class="fa fa-plus"></i> Production Info</a></li>
    <?php if($wp_query4->have_posts()){
    echo '<li class="ui-state-default" role="tab" tabindex="-1" aria-controls="tab-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a href="#tab-2" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2"><i class="fa fa-plus"></i> Cast</a></li>';
}else{
} ?>
	<?php if ($designTab || $techTab) {
    echo '<li class="ui-state-default" role="tab" tabindex="-1" aria-controls="tab-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab-3" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-3"><i class="fa fa-plus"></i> Design &amp; Technical Team</a></li>';
}else{
} ?>
	<?php if ($crewTab || $stagecraftTab) {
    echo '<li class="ui-state-default" role="tab" tabindex="-1" aria-controls="tab-4" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false"><a href="#tab-4" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-4"><i class="fa fa-plus"></i> Crew &amp; Stagecraft</a></li>';
}else{
} ?>
	<?php if(get_field('google_calendar')){
    echo '<li class="ui-state-default" role="tab" tabindex="-1" aria-controls="tab-5" aria-labelledby="ui-id-5" aria-selected="false" aria-expanded="false"><a href="#tab-5" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-5"><i class="fa fa-plus"></i> Calendar</a></li>';
}else{
} ?>
<?php if($wp_query3->have_posts()){
    echo '<li class="ui-state-default" role="tab" tabindex="-1" aria-controls="tab-6" aria-labelledby="ui-id-6" aria-selected="false" aria-expanded="false"><a href="#tab-6" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-6"><i class="fa fa-plus"></i> Daily Call</a></li>';
}else{
} ?>
<?php if($wp_query2->have_posts()){
    echo '<li class="ui-state-default" role="tab" tabindex="-1" aria-controls="tab-7" aria-labelledby="ui-id-7" aria-selected="false" aria-expanded="false"><a href="#tab-7" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-7"><i class="fa fa-plus"></i> Scripts</a></li>';
}else{
} ?>
  </ul>
  <!------ End Tabs ---------->
   <!--------- Start Tab Panels----------->
   
  	<!------ State SHOW INFO -------------------->
    <div class="ui-tabs-hide ui-tabs-panel" id="tab-1" aria-labelledby="ui-id-1" role="tabpanel" aria-hidden="false" style="display: block;">
      <div class="showinfo">
<h5>Production Info</h5>
<?php $rows = get_field('director'); if($rows) {
	echo'<table class="table table-striped table-bordered"><tbody>'; 
	foreach($rows as $row)
	{
		echo '<tr><td style="width:33%;><div class="dc_text"><strong>' . $row['dir_role'] . '</strong></div></td>
							<td><div class="dc_text">' . $row['dir_name'] .'</div></td><td><div class="dc_text">' . $row['dir_email'] . '</div></td></tr> ';
	}
	
}
else {
echo'<table class="table table-striped table-bordered"><tbody>';
} ?>
<?php $rows = get_field('playwright'); if($rows) {
	foreach($rows as $row)
	{
		echo '<tr><td style="width:45%";><div class="dc_text"><strong>' . $row['writer_role'] . '</strong></div></td>
							<td><div class="dc_text">' . $row['writer_name'] .'</div></td><td><div class="dc_text">' . $row['writer_email'] . '</div></td></tr> ';
	}
	echo'</tbody></table>';
}
else {
echo'</tbody></table>';
} ?>


<?php $rows = get_field('management_team'); if($rows) {
	echo'<table class="table table-striped table-bordered"><tbody>';
	foreach($rows as $row)
	{
		echo '<tr><td style="width:45%";><div class="dc_text"><strong>' . $row['manage_role'] . '</strong></div></td>
							<td><div class="dc_text">' . $row['manage_name'] .'</div></td><td><div class="dc_text">' . $row['manage_email'] . '</div></td></tr> ';
	}
	echo'</tbody></table>';
} ?>

<table class="table table-striped table-bordered">
	<tbody>
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
			<td style="width:45%";>
				<div class="dc_text">
					<strong>Performance Venue</strong>
				</div>
			</td>
			<td>
				<div class="dc_text">
					<?php the_field('performance_venue'); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td style="width:45%";>
				<div class="dc_text">
					<strong>1st Rehearsal</strong>
				</div>
			</td>
			<td>
				<div class="dc_text">
					<?php the_field('first_rehearsal_date'); ?>
				</div>
			</td>
		</tr>
	</tbody>
</table>

<?php $synopsis = get_field('synopsis');
if ($synopsis) { ?>
<h6>Synopsis</h6><?php echo $synopsis; ?>
<?php } else { ?>
<?php } ?>
<div class="spacer1"></div>
<?php $ticket_info = get_field('tickets');
if ($ticket_info) { ?>
<h6>Ticket Info</h6><?php echo $ticket_info; ?>
<?php } else { ?>
<?php } ?>

</div>

    </div>
<div class="ui-tabs-hide ui-tabs-panel" id="tab-2" aria-labelledby="ui-id-2" role="tabpanel" aria-hidden="true" style="display: none;">
      			
<!--Start new casting-->
<div>	

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
							<td style="width:33%;><div class="dc_text"><strong>' . $casting['casting_cast_role'] . '</strong></div></td>
							<td><div class="dc_text">' . $casting['casting_cast_person'] . '</div></td><td><div class="dc_text">' . $casting['casting_cast_email'] . '</div></td>
							
							</tr>
							';
						}
					echo'</tbody></table>';
					}
				?>
                    
<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>
				</div>

<!--end new casting-->


</div>

<div class="ui-tabs-hide ui-tabs-panel" id="tab-3" aria-labelledby="ui-id-3" role="tabpanel" aria-hidden="true" style="display: none;">
      <div class="showinfo">
<?php $rows = get_field('designers');
if($rows)
{
	echo '<h5>Design Team</h5>
	<table class="table table-striped table-bordered"><tbody>';
	foreach($rows as $row)
	{
		
		echo '<td style="width:33%;><div class="dc_text"><strong>' . $row['des_role'] . '</strong></div></td>
							<td><div class="dc_text">' . $row['des_name'] .'</div></td><td><div class="dc_text">' . $row['des_email'] . '</div></td></tr>';
	}
		echo '</tbody></table>';
} ?>
     <?php $rows = get_field('technical_team');
if($rows)
{
	echo '<h5>Technical Team</h5>
	<table class="table table-striped table-bordered"><tbody>';
	foreach($rows as $row)
	{
		echo '<td style="width:33%;><div class="dc_text"><strong>' . $row['tech_role'] . '</strong></div></td>
							<td><div class="dc_text">' . $row['tech_name'] .'</div></td><td><div class="dc_text">' . $row['tech_email'] . '</div></td></tr> ';
	}
	echo '</tbody></table>';
} ?>
    </div>
</div>

<div class="ui-tabs-hide ui-tabs-panel" id="tab-4" aria-labelledby="ui-id-4" role="tabpanel" aria-hidden="true" style="display: none;">
      <div class="showinfo">
<?php $rows = get_field('crew');
if($rows)
{
		echo '<h5>Crew</h5>
		<table class="table table-striped table-bordered"><tbody>';
	foreach($rows as $row)
	{
		echo '<td style="width:33%;><div class="dc_text"><strong>' . $row['crew_role'] . '</strong></div></td>
							<td><div class="dc_text">' . $row['crew_name'] .'</div></td><td><div class="dc_text">' . $row['crew_email'] . '</div></td></tr>';
	}
		echo '</tbody></table>';
} ?>
     
	<?php $rows = get_field('stagecraft');
if($rows)
{
		echo '<h5>Stagecraft</h5>
		<table class="table table-striped table-bordered"><tbody>';
	foreach($rows as $row)
	{
		echo '<td style="width:33%;><div class="dc_text"><strong>' . $row['stagecraft_role'] . '</strong></div></td>
							<td><div class="dc_text">' . $row['stagecraft_name'] .'</div></td><td><div class="dc_text">' . $row['stagecraft_email'] . '</div></td></tr> ';
	}
	echo '</tbody></table>';
} ?>     
	</div>
</div>

	<div class="ui-tabs-hide ui-tabs-panel" id="tab-5" aria-labelledby="ui-id-5" role="tabpanel" aria-hidden="true" style="display: none;">
		<h5>Calendar</h5>
      			<div class="production-calendar">
		  			<?php the_field('google_calendar'); ?>
				</div>
	</div>
<!-- Daily Call Tab ------------------------>
             
<div class="ui-tabs-hide ui-tabs-panel" id="tab-6" aria-labelledby="ui-id-6" role="tabpanel" aria-hidden="true" style="display: none;">
	<h5>Daily Call</h5>
      			<div>	

<?php if($wp_query3->have_posts()) : while($wp_query3->have_posts()) : $wp_query3->the_post(); ?>


			<div class="row fifteen">
				<div class="well pro-well">
					<div class="two-thirds">
						<h5><?php the_title(); ?> - <?php the_field('call_type'); ?></h5>
						<p>Last Updated: <?php the_modified_time('F j, Y'); ?> at <?php the_modified_time('g:i a'); ?></p>
					</div>
					<div class="one-third last"><a class="button" href="<?php the_permalink(); ?>">View Report</a></div>
				</div>
			</div>
                    
<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>
				</div>
			  </div>              
<!-- End of Daily Call Tab ----------->
<div class="ui-tabs-hide ui-tabs-panel" id="tab-7" aria-labelledby="ui-id-7" role="tabpanel" aria-hidden="true" style="display: none;">
	<h5>Scripts</h5>
      			<div>	

<?php if($wp_query2->have_posts()) : while($wp_query2->have_posts()) : $wp_query2->the_post(); ?>

	<div class="row fifteen">
		<div class="well pro-well">
					<div class="two-thirds">
						<h5><?php the_title() ?></h5>
						<p><?php the_field('script_library_type'); ?></p>
					</div>
					
					<div class="one-third last">
						<a class="button" href="<?php the_field('script_library_location'); ?>" target="_blank">Download</a>
					</div>
		</div>
	</div>
                    
<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>
				</div>
			  </div>
   
  </div> <!-- End Tabbable -->
</div> <!-- End Post Area -->
                                
            <div style="clear:both;"></div>
            
            <?php endwhile; else: ?>
			<p><?php _e("Sorry, page not found.", 'organicthemes'); ?></p>
			<?php endif; ?>
            
        </div><!-- End Sixteen --->
        
	</div><!-- End Production-Content -->
        
	</div>

</div>

<?php get_footer(); ?>