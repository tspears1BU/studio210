<?php
/*
Template Name: Season
*/
?>

<?php get_header(); ?>

<div id="container">
	
		
	<div class="production-content">
   	
   		<div class="row sixteen">
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
        	<div id="responsiveTabs" class="organic-tabs ui-tabs"> 
  			<ul id="tabs" class="ui-tabs-nav ui-helper-reset ui-helper-clearfix" role="tablist">
    <?php $parent = get_the_ID(); ?>
	<?php
	$args = array(
	'post_type' => 'production',
	'posts_per_page' =>-1,
	'post_parent' => $parent,
	'orderby' => 'menu_order', 
	'order' => 'ASC'
	);
	$wp_query = new WP_Query( $args ); ?>
	<?php $tab_count = 1; ?>
	<?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
	<?php $tab_tit = get_the_title (); ?>
	<?php  if($tab_count == 1)
		{
		echo '<li class="ui-state-default ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tab-1" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true""><a href="#tab-' . $tab_count ++ . '" class="ui-tabs-anchor" role="presentation"><i class="fa fa-plus"></i> ' . $tab_tit . '</a></li>';
		}
		else
		{
		echo '<li><a href="#tab-' . $tab_count ++ . '"><i class="fa fa-plus"></i> ' . $tab_tit . '</a></li>';
		} 
	?>	
	<?php endwhile; endif; ?>
			</ul>
			<?php $tab_tent = 1 ?>
           
			<?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
				<?php
				if($tab_tent == 1)
				{
				echo'<div class="ui-tabs-hide ui-tabs-panel" id="tab-' . $tab_tent ++ . '">';  			
				}
            	else
				{
                echo'<div class="ui-tabs-hide ui-tabs-panel" id="tab-' . $tab_tent ++ . '">';
				} ?>
                <?php $uncle = get_the_ID(); 
                $args2 = array(
                'post_type' => 'production',
                'posts_per_page' =>-1,
                'post_parent' => $uncle,
                'orderby' => 'menu_order', 
                'order' => 'ASC'
                );
                $wp_query2 = new WP_Query( $args2 ); ?>
				<?php if($wp_query2->have_posts()) : while($wp_query2->have_posts()) : $wp_query2->the_post(); ?>
         			<div class="well">
            		<h4><a href="<?php the_permalink() ?>" rel="bookmark"> <?php the_title(); ?></a></h4>
	            	
	        		<?php
					$dir_id = 1; 
					if(get_field('director'))
					{
					echo '<p><strong>Director: </strong>';
					while(the_repeater_field('director')): 
						if(get_sub_field('dir_role') == "Director")
						{
						if($dir_id <= 1)
						{
						echo ' ' . get_sub_field('dir_name') .' ';
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
						echo '<p><strong>Playwright: </strong>';
						while(the_repeater_field('playwright')): 
						if(get_sub_field('writer_role') == "Playwright")
						{
						if($wri_id <= 1)
						{
						echo ' ' . get_sub_field('writer_name') .' ';
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
	            	
                    </div><!--end well-->
                    
				<?php endwhile; endif; ?>
			        
			</div><!----End Individual Tab------>
               
            <?php endwhile; endif; ?>    
			</div>
            </div><!--end organic tabs--->    
			</div><!--end production-postarea -->
		</div><!--end row-->
		
	</div><!--end production-content-->
	
</div> <!--end container-->

<?php get_footer(); ?>