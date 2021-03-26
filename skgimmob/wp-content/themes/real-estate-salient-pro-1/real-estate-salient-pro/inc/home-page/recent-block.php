<?php
/**
* Home recent block
*/

/* -- Home reent properties */
if ( ! function_exists( 'real_estate_salient_pro_home_properties' ) ) {
	function real_estate_salient_pro_home_properties() {
		$recent_properties_status = get_theme_mod( 'recent_properties_enable', 'enable' );
		$recent_properties_layout = get_theme_mod( 'recent_properties_layout', 'one' );
		$recent_properties_type = get_theme_mod( 'recent_properties_type', 'recent' );
		$recent_properties_count = get_theme_mod( 'recent_properties_count', 6 );
		if ( $recent_properties_status === 'enable' && class_exists( 'Essential_Real_Estate' ) ) : ?>
		<div class="container-fluid recent-post-two">
			<div class="row">
				<div class="container">
					<div class="recent-post-title-two">
						<h2 class="bold-second-word"><?php echo esc_html( get_theme_mod( 'recent_properties_title', __( 'Recent Properties', 'real-estate-salient-pro' ) ) ); ?></h2>						
						<p><?php echo esc_html( get_theme_mod( 'recent_properties_title_desc', __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'real-estate-salient-pro' ) ) ); ?></p>
						<?php if( get_theme_mod( 'recent_properties_title_desc' ) ) : ?>
							<hr>
						<?php endif; ?>
					</div>
					<div class="recent-two-content row">
						<?php if( $recent_properties_type === 'recent' && $recent_properties_layout === 'one' ) : ?>
						<?php 
						$args = array(
						    'post_type' => 'property',
						    'ignore_sticky_posts' => true,
						    'posts_per_page' => $recent_properties_count,
						    'orderby' => 'date',
						    'order' => 'DESC',
						    'post_status' => 'publish',
						);

						if( get_theme_mod( 'recent_properties_type' ) === 'featured' ) {
							$args['meta_query'][] = array(
							    'key' => ERE_METABOX_PREFIX . 'property_featured',
							    'value' => true,
							    'compare' => '=',
							);
						}
						$latestloop = new WP_Query($args);
						if ($latestloop->have_posts()) :  while ($latestloop->have_posts()) : $latestloop->the_post();
						$property_id = get_the_ID();
						$property_meta_data = get_post_custom($property_id);
						$price = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price', true);
						$beds = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_bedrooms', true);
						$bath = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_bathrooms', true);
						$garage = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_garage', true);
						$size = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_land', true);
						$property_address = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_address', true);
						$price_prefix = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_prefix', true);
						$price_unit = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_unit', true);
						$price_short = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_short', true);
						$price_postfix = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_postfix', true);
						$property_featured = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_featured']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_featured'][0] : '0';
						$property_item_label = get_the_terms($property_id, 'property-label');
						$property_item_status = get_the_terms($property_id, 'property-status');
						// Get Agent name
						$agent_display_option = isset($property_meta_data[ERE_METABOX_PREFIX . 'agent_display_option']) ? $property_meta_data[ERE_METABOX_PREFIX . 'agent_display_option'][0] : '';
						$property_agent = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_agent']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_agent'][0] : '';
						$agent_name = $agent_link = '';
						if ($agent_display_option == 'author_info') {
						    global $post;
						    $user_id = $post->post_author;
						    $user_info = get_userdata($user_id);

						    if(empty($user_info->first_name) && empty($user_info->last_name))
						    {
						        $agent_name=$user_info->user_login;
						    }
						    else
						    {
						        $agent_name     = $user_info->first_name . ' ' . $user_info->last_name;
						    }

						    $author_agent_id = get_the_author_meta(ERE_METABOX_PREFIX . 'author_agent_id', $user_id);
							$agent_status = get_post_status($author_agent_id);
							if ($agent_status == 'publish') {
								$agent_link = get_the_permalink($author_agent_id);
							} else {
								$agent_link = get_author_posts_url($user_id);
							}

						} elseif ($agent_display_option == 'other_info') {
						    $agent_name = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_other_contact_name']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_other_contact_name'][0] : '';
						} elseif ($agent_display_option == 'agent_info' && !empty($property_agent)) {
						    $agent_name = get_the_title($property_agent);
						    $agent_link = get_the_permalink($property_agent);
						}
						?>
						<div class="home-two-recent-single col-md-4 col-sm-6 clearfix" data-aos="zoom-in-down" data-aos-duration="1000">
							<div class="home-two-recent-content">
								<div class="home-two-recent-image">
									<a href="<?php the_permalink();?>"><?php the_post_thumbnail('real-estate-salient-pro-index'); ?></a>
									<?php if ($property_item_label || $property_featured): ?>
										<?php if ($property_featured): ?>
											<div class="home-two-featured"><?php echo __('Featured','real-estate-salient-pro'); ?></div>
										<?php endif; ?>
										<?php if ($property_item_status): ?>
											<?php foreach ($property_item_status as $status): ?>
							                    <?php $status_color = get_term_meta($status->term_id, 'property_status_color', true); ?>
							                    <div class="home-two-sale"><?php echo esc_html($status->name) ?></div>
							                <?php endforeach; ?>											
										<?php endif; ?>
									<?php endif; ?>
								</div>
								<div class="home-two-recent-data">
									<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
						    		<div class="home-two-meta-property">		    			
						    			<p><i class="fas fa-map-marker-alt"></i><?php echo esc_html( $property_address ); ?></p>
						    			<div class="home-two-icon-meta">
						    				<p><i class="fas fa-bed"></i><?php echo esc_html($beds); ?> <?php echo esc_html__('Bedroom', 'real-estate-salient'); ?> </p>
						    				<p><i class="fas fa-bath"></i><?php echo esc_html($bath); ?> <?php echo esc_html__('Bathroom', 'real-estate-salient'); ?></p>
						    				<p><i class="fas fa-car"></i><?php echo esc_html($garage); ?> <?php echo esc_html__('Garage', 'real-estate-salient'); ?></p>
						    				<p><i class="far fa-building"></i><?php echo esc_html($size); ?> <?php echo esc_html(ere_get_measurement_units_land_area()); ?> <?php echo esc_html__('land area', 'real-estate-salient'); ?></p>
						    			</div>
						    			<p class="home-meta-price"><i class="fas fa-tag"></i><?php echo esc_html($price_prefix).' '.esc_html(ere_get_format_money($price_short, $price_unit)).' '.esc_html($price_postfix); ?></p>
						    			<hr>
						    			<div class="home-two-recent-agent">
						    				<?php if (!empty($agent_name)): ?>
						    					<p><?php echo !empty($agent_link) ? ('<a href="' . esc_url($agent_link) . '" title="' . esc_attr($agent_name) . '">') : ''; ?>
						                        <i class="fa fa-user"></i><?php echo esc_html($agent_name) ?>
						                        <?php echo !empty($agent_link) ? ('</a>') : ''; ?></p>
						    				<?php endif; ?>
						    				<p class="align-right"><i class="fas fa-calendar-alt"></i>
						    				<?php
							                    $get_the_time=get_the_time('U');
							                    $current_time=current_time('timestamp');
							                    $human_time_diff=human_time_diff($get_the_time, $current_time);
							                    printf(_x(' %s ago', '%s = human-readable time difference', 'real-estate-salient-pro'), $human_time_diff); ?></p>				    				
						    			</div>
						    		</div>
								</div>						
							</div>
						</div>
						<?php
					    endwhile;
					    wp_reset_postdata();
					    endif;
					    endif;
					    ?>
					
					<?php 
					// Custom recent properties	
					if( get_theme_mod( 'recent_properties_type' ) === 'custom' && get_theme_mod( 'recent_properties_layout' ) === 'one' ) : ?>
						<?php 
						$custom_properties = get_theme_mod( 'recent_property_custom', '' );
						foreach( $custom_properties as $custom_property ) : 
						
						$property_id = $custom_property['recent_custom_property'];
						$property_meta_data = get_post_custom($property_id);
						$price = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price', true);
						$beds = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_bedrooms', true);
						$bath = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_bathrooms', true);
						$garage = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_garage', true);
						$size = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_land', true);
						$property_address = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_address', true);
						$price_prefix = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_prefix', true);
						$price_unit = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_unit', true);
						$price_short = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_short', true);
						$price_postfix = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_postfix', true);
						$property_featured = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_featured']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_featured'][0] : '0';
						$property_item_label = get_the_terms($property_id, 'property-label');
						$property_item_status = get_the_terms($property_id, 'property-status');
						// Get Agent name
						$agent_display_option = isset($property_meta_data[ERE_METABOX_PREFIX . 'agent_display_option']) ? $property_meta_data[ERE_METABOX_PREFIX . 'agent_display_option'][0] : '';
						$property_agent = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_agent']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_agent'][0] : '';
						$agent_name = $agent_link = '';
						if ($agent_display_option == 'author_info') {
						    global $post;
						    $user_id = $post->post_author;
						    $user_info = get_userdata($user_id);

						    if(empty($user_info->first_name) && empty($user_info->last_name))
						    {
						        $agent_name=$user_info->user_login;
						    }
						    else
						    {
						        $agent_name     = $user_info->first_name . ' ' . $user_info->last_name;
						    }

						    $author_agent_id = get_the_author_meta(ERE_METABOX_PREFIX . 'author_agent_id', $user_id);
							$agent_status = get_post_status($author_agent_id);
							if ($agent_status == 'publish') {
								$agent_link = get_the_permalink($author_agent_id);
							} else {
								$agent_link = get_author_posts_url($user_id);
							}

						} elseif ($agent_display_option == 'other_info') {
						    $agent_name = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_other_contact_name']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_other_contact_name'][0] : '';
						} elseif ($agent_display_option == 'agent_info' && !empty($property_agent)) {
						    $agent_name = get_the_title($property_agent);
						    $agent_link = get_the_permalink($property_agent);
						}
						?>
						<div class="home-two-recent-single col-md-4 col-sm-6 clearfix" data-aos="zoom-in-down" data-aos-duration="1000">
							<div class="home-two-recent-content">
								<div class="home-two-recent-image">
									<a href="<?php echo esc_url( get_the_permalink( $property_id ) ); ?>"><?php echo get_the_post_thumbnail( $property_id, 'real-estate-salient-pro-index' ); ?></a>
									<?php if ($property_item_label || $property_featured): ?>
										<?php if ($property_featured): ?>
											<div class="home-two-featured"><?php echo __('Featured','real-estate-salient-pro'); ?></div>
										<?php endif; ?>
										<?php if ($property_item_status): ?>
											<?php foreach ($property_item_status as $status): ?>
							                    <?php $status_color = get_term_meta($status->term_id, 'property_status_color', true); ?>
							                    <div class="home-two-sale"><?php echo esc_html($status->name) ?></div>
							                <?php endforeach; ?>											
										<?php endif; ?>
									<?php endif; ?>
								</div>
								<div class="home-two-recent-data">
									<h3><a href="<?php echo esc_url( get_the_permalink( $property_id ) ); ?>"><?php echo esc_html( get_the_title( $property_id ) ); ?></a></h3>
						    		<div class="home-two-meta-property">		    			
						    			<p><i class="fas fa-map-marker-alt"></i><?php echo esc_html( $property_address ); ?></p>
						    			<div class="home-two-icon-meta">
						    				<p><i class="fas fa-bed"></i><?php echo esc_html($beds); ?> <?php echo esc_html__('Bedroom', 'real-estate-salient'); ?> </p>
						    				<p><i class="fas fa-bath"></i><?php echo esc_html($bath); ?> <?php echo esc_html__('Bathroom', 'real-estate-salient'); ?></p>
						    				<p><i class="fas fa-car"></i><?php echo esc_html($garage); ?> <?php echo esc_html__('Garage', 'real-estate-salient'); ?></p>
						    				<p><i class="far fa-building"></i><?php echo esc_html($size); ?> <?php echo esc_html(ere_get_measurement_units_land_area()); ?> <?php echo esc_html__('land area', 'real-estate-salient'); ?></p>
						    			</div>
						    			<p class="home-meta-price"><i class="fas fa-tag"></i><?php echo esc_html($price_prefix).' '.esc_html(ere_get_format_money($price_short, $price_unit)).' '.esc_html($price_postfix); ?></p>
						    			<hr>
						    			<div class="home-two-recent-agent">
						    				<?php if (!empty($agent_name)): ?>
						    					<p><?php echo !empty($agent_link) ? ('<a href="' . esc_url($agent_link) . '" title="' . esc_attr($agent_name) . '">') : ''; ?>
						                        <i class="fa fa-user"></i><?php echo esc_html($agent_name) ?>
						                        <?php echo !empty($agent_link) ? ('</a>') : ''; ?></p>
						    				<?php endif; ?>
						    				<p class="align-right"><i class="fas fa-calendar-alt"></i>
						    				<?php
							                    $get_the_time=get_the_time('U');
							                    $current_time=current_time('timestamp');
							                    $human_time_diff=human_time_diff($get_the_time, $current_time);
							                    printf(_x(' %s ago', '%s = human-readable time difference', 'real-estate-salient-pro'), $human_time_diff); ?></p>				    				
						    			</div>
						    		</div>
								</div>						
							</div>
						</div>
						<?php 
						endforeach; 
						endif;
						?>

						<?php if( get_theme_mod( 'recent_properties_type' ) !== 'custom' && get_theme_mod( 'recent_properties_layout' ) === 'two' ) : ?>
						<?php
						// Property item class define
						$custom_property_layout_style = ere_get_option('archive_property_layout_style', 'property-grid');
						$custom_property_items_amount = ere_get_option('archive_property_items_amount', '6');
						$custom_property_image_size = ere_get_option( 'archive_property_image_size', '330x180' );
						$custom_property_columns = ere_get_option('archive_property_columns', '3');
						$custom_property_columns_gap = ere_get_option('archive_property_columns_gap', 'col-gap-30');
						$custom_property_items_md = ere_get_option('archive_property_items_md', '3');
						$custom_property_items_sm = ere_get_option('archive_property_items_sm', '2');
						$custom_property_items_xs = ere_get_option('archive_property_items_xs', '1');
						$custom_property_items_mb = ere_get_option('archive_property_items_mb', '1');

						$property_item_class = array();
						if (isset($_SESSION["property_view_as"]) && !empty($_SESSION["property_view_as"]) && in_array($_SESSION["property_view_as"], array('property-list', 'property-grid'))) {
						    $custom_property_layout_style = $_SESSION["property_view_as"];
						}

						$wrapper_classes = array(
						    'ere-property clearfix',
						    $custom_property_layout_style,
						    $custom_property_columns_gap
						);

						if ($custom_property_layout_style == 'property-list') {
						    $wrapper_classes[] = 'list-1-column';
						}

						if ($custom_property_columns_gap == 'col-gap-30') {
						    $property_item_class[] = 'mg-bottom-30';
						} elseif ($custom_property_columns_gap == 'col-gap-20') {
						    $property_item_class[] = 'mg-bottom-20';
						} elseif ($custom_property_columns_gap == 'col-gap-10') {
						    $property_item_class[] = 'mg-bottom-10';
						} 
						$args = array(
						    'post_type' => 'property',
						    'ignore_sticky_posts' => true,
						    'posts_per_page' => $recent_properties_count,
						    'orderby' => 'date',
						    'order' => 'DESC',
						    'post_status' => 'publish',
						);

						if( get_theme_mod( 'recent_properties_type' ) === 'featured' ) {
							$args['meta_query'][] = array(
							    'key' => ERE_METABOX_PREFIX . 'property_featured',
							    'value' => true,
							    'compare' => '=',
							);
						}
						$latestloop = new WP_Query($args);
						if ($latestloop->have_posts()) :  while ($latestloop->have_posts()) : $latestloop->the_post(); ?>
						<div class="ere-property clearfix property-grid col-md-4 col-sm-6 clearfix" data-aos="zoom-in-down" data-aos-duration="1000">						
							<div class="mg-bottom-30 ere-item-wrap ere-property-featured">
							<?php ere_get_template('content-property.php', array(
	                            'property_item_class' => $property_item_class,
	                            'custom_property_image_size' => $custom_property_image_size
	                        )); ?>
	                        </div>
                        </div>
						<?php
					    endwhile;
					    wp_reset_postdata();
					    endif;
					    endif;
					    ?>

					    <?php
					    // Custom properties - layout two
						if( get_theme_mod( 'recent_properties_type' ) === 'custom' && get_theme_mod( 'recent_properties_layout' ) === 'two' ) : ?>
						<?php 
						$custom_properties = get_theme_mod( 'recent_property_custom', '' );
						foreach( $custom_properties as $custom_property ) : 
						

						$property_id = $custom_property['recent_custom_property'];
						$custom_property_layout_style = ere_get_option('archive_property_layout_style', 'property-grid');
						$custom_property_items_amount = ere_get_option('archive_property_items_amount', '6');
						$custom_property_image_size = ere_get_option( 'archive_property_image_size', '330x180' );
						$custom_property_columns = ere_get_option('archive_property_columns', '3');
						$custom_property_columns_gap = ere_get_option('archive_property_columns_gap', 'col-gap-30');
						$custom_property_items_md = ere_get_option('archive_property_items_md', '3');
						$custom_property_items_sm = ere_get_option('archive_property_items_sm', '2');
						$custom_property_items_xs = ere_get_option('archive_property_items_xs', '1');
						$custom_property_items_mb = ere_get_option('archive_property_items_mb', '1');
						$attach_id = get_post_thumbnail_id($property_id);
						$no_image_src= ERE_PLUGIN_URL . 'public/assets/images/no-image.jpg';
						$default_image=ere_get_option('default_property_image','');
						$width = 330; $height = 180;
						if (preg_match('/\d+x\d+/', $custom_property_image_size)) {
						    $image_sizes = explode('x', $custom_property_image_size);
						    $width=$image_sizes[0];$height= $image_sizes[1];
						    $image_src = ere_image_resize_id($attach_id, $width, $height, true);
						    if($default_image!='')
						    {
						        if(is_array($default_image)&& $default_image['url']!='')
						        {
						            $resize = ere_image_resize_url($default_image['url'], $width, $height, true);
						            if ($resize != null && is_array($resize)) {
						                $no_image_src = $resize['url'];
						            }
						        }
						    }
						} else {
						    if (!in_array($custom_property_image_size, array('full', 'thumbnail'))) {
						        $custom_property_image_size = 'full';
						    }
						    $image_src = wp_get_attachment_image_src($attach_id, $custom_property_image_size);
						    if ($image_src && !empty($image_src[0])) {
						        $image_src = $image_src[0];
						    }
						    if (!empty($image_src)) {
						        list($width, $height) = getimagesize($image_src);
						    }
						    if($default_image!='')
						    {
						        if(is_array($default_image)&& $default_image['url']!='')
						        {
						            $no_image_src = $default_image['url'];
						        }
						    }
						}
						$property_meta_data = get_post_custom($property_id);
						$excerpt = get_the_excerpt($property_id);
						$price = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_price']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_price'][0] : '';
						$price_short = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_price_short']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_price_short'][0] : '';
						$price_unit = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_price_unit']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_price_unit'][0] : '';
						$price_prefix = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_price_prefix']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_price_prefix'][0] : '';
						$price_postfix = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_price_postfix']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_price_postfix'][0] : '';
						$property_address = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_address']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_address'][0] : '';
						$property_size = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_size']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_size'][0] : '';
						$property_bedrooms = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_bedrooms']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_bedrooms'][0] : '0';
						$property_bathrooms = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_bathrooms']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_bathrooms'][0] : '0';
						$property_featured = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_featured']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_featured'][0] : '0';

						// Get Agent name
						$agent_display_option = isset($property_meta_data[ERE_METABOX_PREFIX . 'agent_display_option']) ? $property_meta_data[ERE_METABOX_PREFIX . 'agent_display_option'][0] : '';
						$property_agent = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_agent']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_agent'][0] : '';
						$agent_name = $agent_link = '';
						if ($agent_display_option == 'author_info') {
						    global $post;
						    $user_id = $post->post_author;
						    $user_info = get_userdata($user_id);

						    if(empty($user_info->first_name) && empty($user_info->last_name))
						    {
						        $agent_name=$user_info->user_login;
						    }
						    else
						    {
						        $agent_name     = $user_info->first_name . ' ' . $user_info->last_name;
						    }

						    $author_agent_id = get_the_author_meta(ERE_METABOX_PREFIX . 'author_agent_id', $user_id);
							$agent_status = get_post_status($author_agent_id);
							if ($agent_status == 'publish') {
								$agent_link = get_the_permalink($author_agent_id);
							} else {
								$agent_link = get_author_posts_url($user_id);
							}

						} elseif ($agent_display_option == 'other_info') {
						    $agent_name = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_other_contact_name']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_other_contact_name'][0] : '';
						} elseif ($agent_display_option == 'agent_info' && !empty($property_agent)) {
						    $agent_name = get_the_title($property_agent);
						    $agent_link = get_the_permalink($property_agent);
						}

						$property_item_type = get_the_terms($property_id, 'property-type');
						$property_item_label = get_the_terms($property_id, 'property-label');
						$property_item_status = get_the_terms($property_id, 'property-status');

						$property_link = get_the_permalink( $property_id  );
						$property_item_class = array();
						if (isset($_SESSION["property_view_as"]) && !empty($_SESSION["property_view_as"]) && in_array($_SESSION["property_view_as"], array('property-list', 'property-grid'))) {
						    $custom_property_layout_style = $_SESSION["property_view_as"];
						}

						$wrapper_classes = array(
						    'ere-property clearfix',
						    $custom_property_layout_style,
						    $custom_property_columns_gap
						);

						if ($custom_property_layout_style == 'property-list') {
						    $wrapper_classes[] = 'list-1-column';
						}

						if ($custom_property_columns_gap == 'col-gap-30') {
						    $property_item_class[] = 'mg-bottom-30';
						} elseif ($custom_property_columns_gap == 'col-gap-20') {
						    $property_item_class[] = 'mg-bottom-20';
						} elseif ($custom_property_columns_gap == 'col-gap-10') {
						    $property_item_class[] = 'mg-bottom-10';
						} 

						if($property_featured)
						{
						    $property_item_class[] = 'ere-property-featured';
						}
						?>
						<div class="ere-property clearfix property-grid col-md-4 col-sm-6 clearfix" data-aos="zoom-in-down" data-aos-duration="1000">						
							<div class="mg-bottom-30 ere-item-wrap ere-property-featured">
							<div class="<?php echo join(' ', $property_item_class); ?>">
							    <div class="property-inner">
							        <div class="property-image">
							                <img width="<?php echo esc_attr($width) ?>"
							                     height="<?php echo esc_attr($height) ?>"
							                     src="<?php echo esc_url($image_src) ?>" onerror="this.src = '<?php echo esc_url($no_image_src) ?>';" alt="<?php echo esc_html( get_the_title( $property_id ) ); ?>"
							                     title="<?php echo esc_html( get_the_title($property_id) ); ?>">
							                <div class="property-action block-center">
							                    <div class="block-center-inner">
							                        <?php
							                        /**
							                         * ere_property_action hook.
							                         *
							                         * @hooked property_social_share - 5
							                         * @hooked property_favorite - 10
							                         * @hooked property_compare - 15
							                         */
							                        //do_action('ere_property_action'); ?>
							                    </div>
							                    <a class="property-link" href="<?php echo esc_url($property_link); ?>"
							                       title="<?php echo esc_html( get_the_title( $property_id ) ); ?>"></a>
							                </div>
							                <?php if ($property_item_label || $property_featured): ?>
							                    <div class="property-label property-featured">
							                        <?php if ($property_featured): ?>
							                            <p class="label-item">
							                                <span
							                                    class="property-label-bg"><?php esc_html_e('Featured', 'essential-real-estate'); ?>
							                                    <span class="property-arrow"></span></span>
							                            </p>
							                        <?php endif; ?>
							                        <?php if ($property_item_label): ?>
							                            <?php foreach ($property_item_label as $label_item): ?>
							                                <?php $label_color = get_term_meta($label_item->term_id, 'property_label_color', true); ?>
							                                <p class="label-item">
																					<span class="property-label-bg"
							                                                              style="background-color: <?php echo esc_attr($label_color) ?>"><?php echo esc_html($label_item->name) ?>
							                                                            <span class="property-arrow"
							                                                                  style="border-left-color: <?php echo esc_attr($label_color) ?>; border-right-color: <?php echo esc_attr($label_color) ?>"></span>
																					</span>
							                                </p>
							                            <?php endforeach; ?>
							                        <?php endif; ?>
							                    </div>
							                <?php endif; ?>
							                <?php if ($property_item_status): ?>
							                    <div class="property-status">
							                        <?php foreach ($property_item_status as $status): ?>
							                            <?php $status_color = get_term_meta($status->term_id, 'property_status_color', true); ?>
							                            <p class="status-item">
																		<span class="property-status-bg"
							                                                  style="background-color: <?php echo esc_attr($status_color) ?>"><?php echo esc_html($status->name) ?>
							                                                <span class="property-arrow"
							                                                      style="border-left-color: <?php echo esc_attr($status_color) ?>; border-right-color: <?php echo esc_attr($status_color) ?>"></span>
																		</span>
							                            </p>
							                        <?php endforeach; ?>
							                    </div>
							                <?php endif; ?>

							        </div>
							        <div class="property-item-content">
							            <div class="property-heading">
							                <h2 class="property-title"><a href="<?php echo esc_url($property_link); ?>"
							                                                    title="<?php echo esc_html( get_the_title( $property_id ) ); ?>"><?php echo esc_html( get_the_title( $property_id ) ); ?></a>
							                </h2>
							                <?php if (!empty($price)): ?>
							                    <div class="property-price">
							                        <span>
							                            <?php if (!empty($price_prefix)) {
							                                echo '<span class="property-price-prefix">' . $price_prefix . ' </span>';
							                            } ?>
							                            <?php echo ere_get_format_money($price_short,$price_unit) ?>
							                            <?php if (!empty($price_postfix)) {
							                                echo '<span class="property-price-postfix"> / ' . $price_postfix . '</span>';
							                            } ?>
							                        </span>
							                    </div>
							                <?php elseif (ere_get_option('empty_price_text', '') != ''): ?>
							                    <div class="property-price">
							                        <span><?php echo ere_get_option('empty_price_text', '') ?></span>
							                    </div>
							                <?php endif; ?>
							            </div>
							            <?php if (!empty($property_address)):
							                $property_location = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_location', true);
							                if($property_location)
							                {
							                    $google_map_address_url = "http://maps.google.com/?q=" . $property_location['address'];
							                }
							                else
							                {
							                    $google_map_address_url = "http://maps.google.com/?q=" . $property_address;
							                }
							                ?>
							                <div class="property-location" title="<?php echo esc_attr($property_address) ?>">
							                    <i class="fa fa-map-marker"></i>
							                    <a target="_blank"
							                       href="<?php echo esc_url($google_map_address_url); ?>"><span><?php echo esc_attr($property_address) ?></span></a>
							                </div>
							            <?php endif; ?>
							            <div class="property-element-inline">
							                <?php if ($property_item_type): ?>
							                    <div class="property-type-list">
							                        <i class="fa fa-tag"></i>
							                        <?php foreach ($property_item_type as $type): ?>
							                            <a href="<?php echo esc_url(get_term_link($type->slug, 'property-type')); ?>"
							                               title="<?php echo esc_attr($type->name); ?>"><span><?php echo esc_html($type->name); ?> </span></a>
							                        <?php endforeach; ?>
							                    </div>
							                <?php endif; ?>
							                <?php if (!empty($agent_name)): ?>
							                    <div class="property-agent">
							                        <?php echo !empty($agent_link) ? ('<a href="' . esc_url($agent_link) . '" title="' . esc_attr($agent_name) . '">') : ''; ?>
							                        <i class="fa fa-user"></i>
							                        <span><?php echo esc_html($agent_name) ?></span>
							                        <?php echo !empty($agent_link) ? ('</a>') : ''; ?>
							                    </div>
							                <?php endif; ?>
							                <div
							                    class="property-date">
							                    <i class="fa fa-calendar"></i>
							                    <?php
							                    $get_the_time=get_the_time('U', $property_id);
							                    $current_time=current_time('timestamp');
							                    $human_time_diff=human_time_diff($get_the_time, $current_time);
							                    printf(_x(' %s ago', '%s = human-readable time difference', 'essential-real-estate'), $human_time_diff); ?></div>
							            </div>
							            <?php if (isset($excerpt) && !empty($excerpt)): ?>
							                <div class="property-excerpt">
							                    <p><?php echo esc_html($excerpt) ?></p>
							                </div>
							            <?php endif; ?>
							            <div class="property-info">
							                <div class="property-info-inner">
							                    <?php if (!empty($property_size)): ?>
							                        <div class="property-area">
							                            <div class="property-area-inner property-info-item-tooltip" data-toggle="tooltip"
							                                 title="<?php esc_attr_e('Size', 'essential-real-estate'); ?>">
							                                <span class="fa fa-arrows"></span>
								                            <span class="property-info-value"><?php
							                                    $measurement_units = ere_get_measurement_units();
							                                    echo wp_kses_post(sprintf( '%s %s',ere_get_format_number($property_size), $measurement_units)); ?>
									                                            </span>
							                            </div>
							                        </div>
							                    <?php endif; ?>
							                    <?php if (!empty($property_bedrooms)): ?>
							                        <div class="property-bedrooms">
							                            <div class="property-bedrooms-inner property-info-item-tooltip" data-toggle="tooltip"
							                                 title="<?php printf( _n( '%s Bedroom', '%s Bedrooms', $property_bedrooms, 'essential-real-estate' ), $property_bedrooms ); ?>">
							                                <span class="fa fa-hotel"></span>
							                                <span class="property-info-value"><?php echo esc_html($property_bedrooms) ?></span>
							                            </div>
							                        </div>
							                    <?php endif; ?>
							                    <?php if (!empty($property_bathrooms)): ?>
							                        <div class="property-bathrooms">
							                            <div class="property-bathrooms-inner property-info-item-tooltip" data-toggle="tooltip"
							                                 title="<?php printf( _n( '%s Bathroom', '%s Bathrooms', $property_bathrooms, 'essential-real-estate' ), $property_bathrooms ); ?>">
							                                <span class="fa fa-bath"></span>
							                                <span class="property-info-value"><?php echo esc_html($property_bathrooms) ?></span>
							                            </div>
							                        </div>
							                    <?php endif; ?>
							                </div>
							            </div>
							        </div>
							    </div>
							</div>
	                        </div>
                        </div>
						<?php 
						endforeach; 
						endif;
						?>

					    </div>
				</div>
			</div>
		</div>		
	<?php endif; 
	}
}
add_action( 'real_estate_salient_pro_recent_properties', 'real_estate_salient_pro_home_properties', 0 );