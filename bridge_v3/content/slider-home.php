<!-- BEGIN .slideshow -->
<div class="home slideshow <?php $header_image = get_header_image(); if ( ! empty( $header_image ) ) { ?>header-active<?php } ?>">
    
    <!-- BEGIN .flexslider -->
   	<div id="home" class="flexslider loading" data-speed="<?php echo get_theme_mod( 'organic_origin_transition_interval', '12000' ); ?>" data-transition="<?php echo get_theme_mod( 'organic_origin_transition_style', 'fade' ); ?>">
   	
   		<div class="preloader"></div>
        
        <?php if( have_rows('home_slides') ): ?> 
        
        <!-- BEGIN .slides -->
       	<ul class="slides">
       	
       		<?php while (have_rows('home_slides')) : the_row(); ?>
 		
          	<?php $slides = get_sub_field('slide_post');
			      if( $slides) : $post = $slides;
			      setup_postdata( $post ); ?>
         	<?php $thumb = ( '' != get_the_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'origin-featured-large' ) : false; ?>
          	
           	<li>
                <div class="feature-img banner-img" style="background-image: url(<?php echo esc_url( $thumb[0] ); ?>);">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'organicthemes' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( 'origin-featured-large' ); ?></a>
					<div class="slide-info-home">
	               		<div class="slide-title">
							<h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'organicthemes' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h3>
						</div>
                   		<div class="slide-text">
							<p><?php the_author(); ?> &#8226; <?php echo get_the_date(); ?></p> 
				   		</div>
	           		</div>
				</div>
           		<div class="mobile-info">
           			<h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'organicthemes' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h3>
				</div>    
            </li>
            	<?php wp_reset_postdata(); endif; endwhile; ?>
		
		<!-- END .slides -->
        </ul>
        
        <?php endif; ?>
   
    
    <!-- END .flexslider -->      
    </div>

<!-- END .slideshow -->
</div>