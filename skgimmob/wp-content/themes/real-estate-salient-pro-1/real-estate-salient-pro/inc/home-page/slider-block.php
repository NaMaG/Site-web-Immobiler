<?php 

// Slide Recent properties
if ( ! function_exists( 'real_estate_salient_pro_slider_content' ) ) {
	function real_estate_salient_pro_slider_content() {

$slider_status = get_theme_mod( 'slider_enable', 'enable' );
$slider_type = get_theme_mod( 'slider_type', 'slider' );
$slider_option = get_theme_mod( 'slider_type_option', 'cycle' );
$slider_content_option = get_theme_mod( 'slider_content_option', 'properties' );
$slider_transit = 'data-cycle-fx="'.get_theme_mod( 'slider_transit', 'tileSlide' ).'"';
$slider_period = 'data-cycle-timeout="'.get_theme_mod( 'slider_translit_delay', 3000 ).'"';
$property_select = get_theme_mod( 'slider_property_select', 'recent' );
$slide_count = absint(get_theme_mod('slider_property_count', 3));
$post_select = get_theme_mod( 'slider_post_select', 'recent' );
$slide_post_count = absint(get_theme_mod('slider_post_count', 3));

// Cycle  - recent properties
if ( $slider_status === 'enable' && $slider_type === 'slider' && $slider_option === 'cycle' && class_exists('Essential_Real_Estate') && $slider_content_option === 'properties' && $property_select === 'recent' ) : ?>	
<div class="container-fluid slider-two">
	<div class="cycle-slideshow row" 
		data-cycle-slides="> div"
		data-cycle-swipe=true
    	data-cycle-swipe-fx=scrollHorz
    	<?php echo $slider_transit; ?>
    	<?php echo $slider_period; ?>
    	data-cycle-tile-count=15
    	data-cycle-speed="300"
    	data-cycle-prev=".prevControl"
    	data-cycle-next=".nextControl"
		>
		
		<?php
		$args = array(
		'post_type' => 'property',
		'ignore_sticky_posts' => true,
		'posts_per_page' => $slide_count,
		'orderby' => 'date',
		'order' => 'DESC',
		'post_status' => 'publish',
		);

		$latestloop = new WP_Query($args);
		if ($latestloop->have_posts()) :  while ($latestloop->have_posts()) : $latestloop->the_post();
		$property_id = get_the_ID();
		$price = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price', true);
		$beds = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_bedrooms', true);
		$baths = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_bathrooms', true);
		$garage = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_garage', true);
		$size = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_land', true);
		$property_address = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_address', true);
		$price_prefix = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_prefix', true);
		$price_unit = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_unit', true);
		$price_short = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_short', true);
		$price_postfix = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_postfix', true);
		?>
		<div class="slide-two-content">		
	    	<?php the_post_thumbnail(); ?>
	    	<div class="container">
		    	<div class="slide-two-meta">
		    		<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
		    		<div class="slide-two-meta-property">		    			
		    			<p><i class="fas fa-map-marker-alt"></i><?php echo esc_html( $property_address ); ?></p>
		    			<div class="slider-two-icon-meta">
		    				<p><i class="fas fa-bed"></i><?php echo esc_html($beds); ?> <?php echo esc_html__('Bedroom', 'real-estate-salient'); ?> </p>
		    				<p><i class="fas fa-bath"></i><?php echo esc_html($baths); ?> <?php echo esc_html__('Bathroom', 'real-estate-salient'); ?></p>
		    				<p><i class="fas fa-car"></i><?php echo esc_html($garage); ?> <?php echo esc_html__('Garage', 'real-estate-salient'); ?></p>
		    				<p><i class="far fa-building"></i><?php echo esc_html($size); ?> <?php echo esc_html(ere_get_measurement_units_land_area()); ?> <?php echo esc_html__('land area', 'real-estate-salient'); ?></p>
		    			</div>
		    			<p class="slider-meta-price"><i class="fas fa-tag"></i><?php echo esc_html($price_prefix).' '.esc_html(ere_get_format_money($price_short, $price_unit)).' '.esc_html($price_postfix); ?></p>
		    		</div>
		    		<div class=slide-two-nav>
					    <span class="prevControl"><i class="fas fa-angle-left"></i></span>
					    <span class="nextControl"><i class="fas fa-angle-right"></i></span>
					</div>
		    	</div>
	    	</div>	    	
	    </div>
	    <?php
			endwhile;
    		wp_reset_postdata();
    		endif; 
    	?>	    
	</div>
</div>
<?php	
endif; // End of Recent property slider

// Begin of Custom property slider
if ( $slider_status === 'enable' && $slider_type === 'slider' && $slider_option === 'cycle' && class_exists('Essential_Real_Estate') && $slider_content_option === 'properties' && $property_select === 'custom' ) : ?>	
<div class="container-fluid slider-two">
	<div class="cycle-slideshow row" 
		data-cycle-slides="> div"
		data-cycle-swipe=true
    	data-cycle-swipe-fx=scrollHorz
    	<?php echo $slider_transit; ?>
    	<?php echo $slider_period; ?>
    	data-cycle-tile-count=15
    	data-cycle-speed="300"
    	data-cycle-prev=".prevControl"
    	data-cycle-next=".nextControl"
		>
		
		<?php 
		$slider_properties = get_theme_mod( 'slider_property_custom', '' );		
		foreach( $slider_properties as $slider_property ) : ?>
			<?php
			$property_id = $slider_property['slider_property'];
			$price = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price', true);
			$beds = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_bedrooms', true);
			$baths = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_bathrooms', true);
			$garage = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_garage', true);
			$size = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_land', true);
			$property_address = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_address', true);
			$price_prefix = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_prefix', true);
			$price_unit = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_unit', true);
			$price_short = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_short', true);
			$price_postfix = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_postfix', true);
			?>
	
		<div class="slide-two-content">		
	    	<?php echo get_the_post_thumbnail($slider_property['slider_property']); ?>
	    	<div class="container">
		    	<div class="slide-two-meta">
		    		<h2><a href="<?php echo esc_url(get_the_permalink($property_id));?>"><?php echo esc_html(get_the_title($property_id)); ?></a></h2>
		    		<div class="slide-two-meta-property">		    			
		    			<p><i class="fas fa-map-marker-alt"></i><?php echo esc_html( $property_address ); ?></p>
		    			<div class="slider-two-icon-meta">
		    				<p><i class="fas fa-bed"></i><?php echo esc_html($beds); ?> <?php echo esc_html__('Bedroom', 'real-estate-salient'); ?> </p>
		    				<p><i class="fas fa-bath"></i><?php echo esc_html($baths); ?> <?php echo esc_html__('Bathroom', 'real-estate-salient'); ?></p>
		    				<p><i class="fas fa-car"></i><?php echo esc_html($garage); ?> <?php echo esc_html__('Garage', 'real-estate-salient'); ?></p>
		    				<p><i class="far fa-building"></i><?php echo esc_html($size); ?> <?php echo esc_html(ere_get_measurement_units_land_area()); ?> <?php echo esc_html__('land area', 'real-estate-salient'); ?></p>
		    			</div>
		    			<p class="slider-meta-price"><i class="fas fa-tag"></i><?php echo esc_html($price_prefix).' '.esc_html(ere_get_format_money($price_short, $price_unit)).' '.esc_html($price_postfix); ?></p></p>
		    		</div>
		    		<div class=slide-two-nav>
					    <span class="prevControl"><i class="fas fa-angle-left"></i></span>
					    <span class="nextControl"><i class="fas fa-angle-right"></i></span>
					</div>
		    	</div>
	    	</div>	    	
	    </div>
	    <?php endforeach; ?>
	</div>
</div>
<?php	
    endif;

// Cycle slider - Posts recent

if ( $slider_status === 'enable' && $slider_type === 'slider' && $slider_option === 'cycle' && $slider_content_option === 'post' && $post_select === 'recent' ) : ?>	
<div class="container-fluid slider-two">
	<div class="cycle-slideshow row" 
		data-cycle-slides="> div"
		data-cycle-swipe=true
    	data-cycle-swipe-fx=scrollHorz
    	<?php echo $slider_transit; ?>
    	<?php echo $slider_period; ?>
    	data-cycle-tile-count=15
    	data-cycle-speed="300"
    	data-cycle-prev=".prevControl"
    	data-cycle-next=".nextControl"
		>
		
		<?php
		$args = array(
		'posts_per_page' => $slide_post_count,
		'orderby' => 'date',
		'order' => 'DESC',
		'post_status' => 'publish',
		);

		$latestloop = new WP_Query($args);
		if ($latestloop->have_posts()) :  while ($latestloop->have_posts()) : $latestloop->the_post();
		?>
		<div class="slide-two-content">		
	    	<?php the_post_thumbnail(); ?>
	    	<div class="container">
		    	<div class="slide-two-meta">
		    		<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
		    		<div class="slide-two-meta-property">		    			
		    			<?php the_excerpt(); ?>
		    		</div>
		    		<div class=slide-two-nav>
					    <span class="prevControl"><i class="fas fa-angle-left"></i></span>
					    <span class="nextControl"><i class="fas fa-angle-right"></i></span>
					</div>
		    	</div>
	    	</div>	    	
	    </div>
	    <?php
			endwhile;
    		wp_reset_postdata();
    		endif; 
    	?>	    
	</div>
</div>
<?php	
endif; // End of Recent property slider    

// Cycle - Post custom
if ( $slider_status === 'enable' && $slider_type === 'slider' && $slider_option === 'cycle' && $slider_content_option === 'post' && $post_select === 'custom' ) : ?>	
<div class="container-fluid slider-two">
	<div class="cycle-slideshow row" 
		data-cycle-slides="> div"
		data-cycle-swipe=true
    	data-cycle-swipe-fx=scrollHorz
    	<?php echo $slider_transit; ?>
    	<?php echo $slider_period; ?>
    	data-cycle-tile-count=15
    	data-cycle-speed="300"
    	data-cycle-prev=".prevControl"
    	data-cycle-next=".nextControl"
		>
		
		<?php 
		$slider_posts = get_theme_mod( 'slider_post_custom', '' );		
		foreach( $slider_posts as $slider_post ) : ?>
			<?php
				$post_id = $slider_post['slider_post'];
			?>
		<div class="slide-two-content">		
	    	<?php echo get_the_post_thumbnail($slider_post['slider_post']); ?>
	    	<div class="container">
		    	<div class="slide-two-meta">
		    		<h2><a href="<?php echo esc_url(get_the_permalink($post_id));?>"><?php echo esc_html(get_the_title($post_id)); ?></a></h2>
		    		<div class="slide-two-meta-property">		    			
		    			<?php echo esc_html(get_the_excerpt($post_id)); ?>
		    		</div>
		    		<div class=slide-two-nav>
					    <span class="prevControl"><i class="fas fa-angle-left"></i></span>
					    <span class="nextControl"><i class="fas fa-angle-right"></i></span>
					</div>
		    	</div>
	    	</div>	    	
	    </div>
	   <?php endforeach; ?>
	</div>
</div>
<?php	
endif; // End of cycle- post custom


// Flex - Recent properties
if ( $slider_status === 'enable' && $slider_type === 'slider' && $slider_option === 'flex' ) : ?>	
<?php if ( $post_select === 'recent' || $property_select === 'recent') : ?>	
<div class="home-slider container-fluid">
	<section class="slider row">
        <div class="flexslider" style="width : 100%; max-height: 600px;">
        	<ul class="slides">
			<?php 
				$slide_content = 'post';
				if ($slider_content_option === 'properties') { $slide_content = 'property';	}
				$args = array(
			    'post_type' => $slide_content,
			    'ignore_sticky_posts' => true,
			    'posts_per_page' => $slide_count,
			    'orderby' => 'date',
			    'order' => 'DESC',
			    'post_status' => 'publish',
			);

				$latestloop = new WP_Query($args);
				if ($latestloop->have_posts()) :  while ($latestloop->have_posts()) : $latestloop->the_post();

				if ($slider_content_option === 'properties' and class_exists('Essential_Real_Estate')) :
				$property_id = get_the_ID();
				$price = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price', true);
				$beds = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_bedrooms', true);
				$baths = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_bathrooms', true);
				$size = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_land', true);
				$property_address = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_address', true);
				$price_prefix = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_prefix', true);
				$price_unit = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_unit', true);
				$price_short = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_short', true);
				$price_postfix = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_postfix', true);
			?>          
            <li>
              <?php if ( has_post_thumbnail() ) the_post_thumbnail();?>
              <div class="slider-content">
				<div class="container">
					<div class="slider-text">
						<div class="slider-text-inner">
							<h3><?php echo the_title();?></h3>
							<div class="slider-hr"></div>
							<p class="slider-address"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;<?php echo esc_html($property_address);?></p>
							<p class="slider-price"><i class="fas fa-tag"></i>&nbsp;&nbsp;<?php echo esc_html($price_prefix).' '.esc_html(ere_get_format_money($price_short, $price_unit)).' '.esc_html($price_postfix); ?></p>
						</div>
						<div class="slider-text-meta clearfix">
							<div class="slider-meta-content">
								<div class="slider-meta-count clearfix">
									<i class="fas fa-bed"></i>
									<p>&nbsp;<?php echo esc_html($beds); ?></p>
									
								</div>
								<p><?php echo esc_html__('Bedroom', 'real-estate-salient'); ?> </p>
							</div>
							<div class="slider-meta-content">
								<div class="slider-meta-count clearfix">
									<i class="fas fa-bath"></i>
									<p>&nbsp;<?php echo esc_html($baths); ?></p>
								</div>
								<p><?php echo esc_html__('Bathroom', 'real-estate-salient'); ?> </p>
							</div>
							<div class="slider-meta-content">
								<div class="slider-meta-count clearfix">
									<i class="far fa-building"></i>
									<p>&nbsp;<?php echo esc_html($size); ?> <?php echo esc_html(ere_get_measurement_units_land_area()); ?></p>
								</div>
								<p><?php echo esc_html__('Land Area', 'real-estate-salient'); ?></p>
							</div>
						</div>
						<div class="slider-buy-button">
							<a href="<?php the_permalink(); ?>"><?php echo esc_html__('View Details', 'real-estate-salient'); ?></a>
						</div>
					</div>
				</div>
			</div>
            </li>
        	<?php endif; ?>

        	<?php if ($slider_content_option === 'post') : ?>
        		<li>
	        		<?php if ( has_post_thumbnail() ) the_post_thumbnail('real-estate-salient-slider');?>
					<div class="slider-content post-slider">
						<div class="container">
							<div class="slider-text">
								<div class="slider-text-inner">
									<h3><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></h3>
									<div class="index-title-content">
										<aside class="index-meta clearfix">										
											<div class="index-date-meta clearfix">
												<span><i class="fa fa-calendar"></i><p><?php the_time( get_option( 'date_format' ) ); ?></p></span>
											</div>
										</aside>
									</div>


								</div>
							</div>
						</div>
					</div>
				</li>
        	<?php endif; ?>
        	<?php
			    endwhile;
			    wp_reset_postdata();
			    endif;
			?>
			</ul>
        </div>
        <div class="custom-navigation" style="display: none;">
          <a href="#" class="flex-prev"><?php esc_html_e('Prev', 'real-estate-salient');?></a>
          <div class="custom-controls-container"></div>
          <a href="#" class="flex-next"><?php esc_html_e('Next', 'real-estate-salient');?></a>
        </div>
	</section>
</div>	

<?php	
endif; 
endif; // End of flex - recent posts and properties

// Flex - custom properties / posts
if ( $slider_status === 'enable' && $slider_type === 'slider' && $slider_option === 'flex' ) : ?>	
<?php if ( $post_select === 'custom' || $property_select === 'custom') : ?>	
<div class="home-slider container-fluid">
	<section class="slider row">
        <div class="flexslider" style="width : 100%; max-height: 600px;">
        	<ul class="slides">
			<?php 
			if ($slider_content_option === 'properties' and class_exists('Essential_Real_Estate')) :
			$slider_properties = get_theme_mod( 'slider_property_custom', '' );		
			foreach( $slider_properties as $slider_property ) : ?>
			<?php				
				$property_id = $slider_property['slider_property'];
				$price = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price', true);
				$beds = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_bedrooms', true);
				$baths = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_bathrooms', true);
				$garage = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_garage', true);
				$size = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_land', true);
				$property_address = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_address', true);
				$price_prefix = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_prefix', true);
				$price_unit = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_unit', true);
				$price_short = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_short', true);
				$price_postfix = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_postfix', true);
			?>          
            <li>
              <?php echo get_the_post_thumbnail($property_id); ?>
              <div class="slider-content">
				<div class="container">
					<div class="slider-text">
						<div class="slider-text-inner">
							<h3><?php echo esc_html(get_the_title($property_id)); ?></h3>
							<div class="slider-hr"></div>
							<p class="slider-address"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;<?php echo esc_html($property_address);?></p>
							<p class="slider-price"><i class="fas fa-tag"></i>&nbsp;&nbsp;<?php echo esc_html($price_prefix).' '.esc_html(ere_get_format_money($price_short, $price_unit)).' '.esc_html($price_postfix); ?></p>
						</div>
						<div class="slider-text-meta clearfix">
							<div class="slider-meta-content">
								<div class="slider-meta-count clearfix">
									<i class="fas fa-bed"></i>
									<p>&nbsp;<?php echo esc_html($beds); ?></p>
									
								</div>
								<p><?php echo esc_html__('Bedroom', 'real-estate-salient'); ?> </p>
							</div>
							<div class="slider-meta-content">
								<div class="slider-meta-count clearfix">
									<i class="fas fa-bath"></i>
									<p>&nbsp;<?php echo esc_html($baths); ?></p>
								</div>
								<p><?php echo esc_html__('Bathroom', 'real-estate-salient'); ?> </p>
							</div>
							<div class="slider-meta-content">
								<div class="slider-meta-count clearfix">
									<i class="far fa-building"></i>
									<p>&nbsp;<?php echo esc_html($size); ?> <?php echo esc_html(ere_get_measurement_units_land_area()); ?></p>
								</div>
								<p><?php echo esc_html__('Land Area', 'real-estate-salient'); ?></p>
							</div>
						</div>
						<div class="slider-buy-button">
							<a href="<?php echo esc_url(get_the_permalink($property_id));?>"><?php echo esc_html__('View Details', 'real-estate-salient'); ?></a>
						</div>
					</div>
				</div>
			</div>
            </li>
            <?php endforeach; ?>
        	<?php endif; ?>

        	<?php if ($slider_content_option === 'post') : ?>
        		<?php 
        		$slider_posts = get_theme_mod( 'slider_post_custom', '' );		
				foreach( $slider_posts as $slider_post ) : ?>
        		<li>
	        		<?php echo get_the_post_thumbnail($slider_post['slider_post']); ?>
					<div class="slider-content post-slider">
						<div class="container">
							<div class="slider-text">
								<div class="slider-text-inner">
									<h3><a href="<?php echo esc_url(get_the_permalink($slider_post['slider_post']));?>"><?php echo esc_html( get_the_title( $slider_post['slider_post'] ) ); ?></a></h3>
									<div class="index-title-content">
										<aside class="index-meta clearfix">										
											<div class="index-date-meta clearfix">
												<span><i class="fa fa-calendar"></i><p><?php echo esc_html( get_the_time( get_option( 'date_format' ), $slider_post['slider_post'] ) ); ?></p></span>
											</div>
										</aside>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
        	<?php endforeach; ?>
        	<?php endif; ?>
			</ul>
        </div>
        <div class="custom-navigation" style="display: none;">
          <a href="#" class="flex-prev"><?php esc_html_e('Prev', 'real-estate-salient');?></a>
          <div class="custom-controls-container"></div>
          <a href="#" class="flex-next"><?php esc_html_e('Next', 'real-estate-salient');?></a>
        </div>
	</section>
</div>	

<?php	
endif; 
endif; // End of flex - custom posts and properties

//Map
if ( $slider_status === 'enable' && $slider_type === 'map' ) : ?>	
<div class="container-fluid slider-two">
	<div class="slide-two-content">
	<div class="slider-map row" >
	<?php echo do_shortcode('[ere_property_search status_enable="true" type_enable="true" title_enable="true" address_enable="true" country_enable="false" state_enable="false" city_enable="false" neighborhood_enable="false" bedrooms_enable="false" bathrooms_enable="false" price_enable="true" price_is_slider="false" area_enable="false" land_area_enable="false" label_enable="false" garage_enable="false" property_identity_enable="false" other_features_enable="false" map_search_enable="true" search_styles="style-mini-line" color_scheme="color-dark" el_class=""]');?>
	</div>
	</div>
</div>	
<?php
endif; // End of flex - custom posts and properties
	}
}

// image - search box banner
if ( ! function_exists( 'real_estate_salient_pro_sliderbanner_content' ) ) {
	function real_estate_salient_pro_sliderbanner_content() {
		?>
		<?php if( get_theme_mod( 'slider_enable', 'enable' ) === 'enable' && get_theme_mod('slider_type') === 'image' ) : ?>
		<?php if ( !empty( get_theme_mod( 'slider_image_upload' ) ) ) : ?>
		<div class="slider-area" style=" background: #fff url('<?php echo esc_url( get_theme_mod( 'slider_image_upload' ) ); ?>') no-repeat fixed 100%; background-size: cover; ">
			<div class="static-slider-content container">
				<div class="slide-head">
					<?php //if (get_theme_mod('real_estate_salient_pro_slide_text')) : ?>
					<h2><?php //echo esc_html(get_theme_mod('real_estate_salient_pro_slide_text')); ?></h2>
					<?php //endif; ?>
				</div>
				<div class="slider-search">
					<div class="slider-none" style="padding-right: 15px; padding-left: 15px;">
						<?php echo do_shortcode('[ere_property_mini_search status_enable="true" el_class=""]');?>

					</div>
				</div>
			</div>			
		</div>	
		<?php endif; ?>
		<?php endif; ?>
		<?php
	}
}

add_action( 'real_estate_salient_pro_slider', 'real_estate_salient_pro_slider_content', 0 );
add_action( 'real_estate_salient_pro_slider', 'real_estate_salient_pro_sliderbanner_content', 10 );