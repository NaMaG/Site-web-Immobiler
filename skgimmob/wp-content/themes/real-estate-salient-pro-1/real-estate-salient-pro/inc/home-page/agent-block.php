<?php
/**
* agent block
*/
if ( ! function_exists( 'real_estate_salient_pro_home_agent' ) ) {
	function real_estate_salient_pro_home_agent() {
	$agent_status = get_theme_mod( 'agent_enable', 'enable' );
	$agent_layout = get_theme_mod( 'agent_layout', 'one' );
	$agent_type = get_theme_mod( 'agent_type', 'recent' );
	$agent_count = get_theme_mod( 'agent_count', 3 );
	// Layout one
	if ( $agent_status === 'enable' && class_exists( 'Essential_Real_Estate' ) ) : ?>
	<div class="container-fluid home-two-agents">
		<div class="row">
			<div class="container">
				<div class="recent-post-title-two">
					<h2 class="bold-second-word" data-aos="fade-up"><?php echo esc_html( get_theme_mod( 'agent_title', __( 'Best Agents', 'real-estate-salient-pro' ) ) ); ?></h2>
					<p data-aos="fade-up"><?php echo esc_html( get_theme_mod( 'agent_title_desc', __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'real-estate-salient-pro' ) ) ); ?></p>
					<?php if( get_theme_mod( 'agent_title_desc' ) ) : ?>
						<hr>
					<?php endif; ?>
				</div>				
				<div class="home-two-agents-content row">
				<?php if ( $agent_type === 'recent' ) : 
				$args = array(
				    'post_type' => 'agent',
				    'ignore_sticky_posts' => true,
				    'posts_per_page' => $agent_count,
				    'orderby' => 'date',
				    'order' => 'DESC',
				    'post_status' => 'publish',
				);
				$latestloop = new WP_Query($args);
				if ($latestloop->have_posts()) :  while ($latestloop->have_posts()) : $latestloop->the_post();
				$agent_id = get_the_ID();
				$agent_post_meta_data = get_post_custom($agent_id);
				$agent_position = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_position']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_position'][0] : '';
				$email = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_email']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_email'][0] : '';
				$agent_facebook_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_facebook_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_facebook_url'][0] : '';
				$agent_twitter_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_twitter_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_twitter_url'][0] : '';
				$agent_linkedin_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_linkedin_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_linkedin_url'][0] : '';
				$agent_mobile_number = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_mobile_number']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_mobile_number'][0] : '';
				$email = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_email']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_email'][0] : '';
				$ere_property = new ERE_Property();
				$agent_user_id = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_user_id']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_user_id'][0] : '';
				?>				
				<?php if ( $agent_layout === 'one' ) : ?>
					<div class="home-two-agents-single col-md-3 col-sm-6 clearfix" data-aos="zoom-in-down" data-aos-duration="1000">
						<div class="home-two-agents-single-content">
							<a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
							<div class="home-two-agents-single-meta">
								<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
								<p class="home-two-agents-type"><?php echo $agent_position; ?></p>
								<p><i class="far fa-envelope"></i><?php echo esc_html( $email );?></p>
								<p><i class="fas fa-phone-volume"></i><?php echo esc_html( $agent_mobile_number );?></p>
								<div class="home-two-agents-social">
									<span><a href="<?php echo esc_url( $agent_facebook_url ); ?>" title="Facebook"><i class="fab fa-facebook-f"></i></a></span>
									<span><a href="<?php echo esc_url( $agent_twitter_url ); ?>" title="Twitter"><i class="fab fa-twitter"></i></a></span>
									<span><a href="<?php echo esc_url( $agent_linkedin_url ); ?>" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a></span>								
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( $agent_layout === 'two' ) : ?>
					<div class="ere-agent clearfix agent-grid col-md-3 col-sm-6" data-aos="zoom-in-down" data-aos-duration="1000">
					    <div class="agent-item-inner">
					        <div class="agent-avatar">
					            <a title="<?php the_title();?>" href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
					        </div>
					        <div class="agent-content">
					            <div class="agent-info">
					                <h2 class="agent-name"><a title="<?php the_title();?>" href="<?php the_permalink();?>"><?php the_title();?></a></h2>
					                <span class="agent-total-properties"><?php
					                    $total_property = $ere_property->get_total_properties_by_user($agent_id, $agent_user_id);
					                    printf( _n( '%s property', '%s properties', $total_property, 'real-estate-salient-pro' ), ere_get_format_number($total_property ));
					                    ?></span>
					            </div>
					            <div class="agent-social">
					                <a title="Facebook" href="<?php echo esc_url( $agent_facebook_url ); ?>"><i class="fa fa-facebook"></i></a>
					                <a title="Twitter" href="<?php echo esc_url( $agent_twitter_url ); ?>"><i class="fa fa-twitter"></i></a>
					                <a title="Email" href="mailto:<?php echo sanitize_email( $email ); ?>"><i class="fa fa-envelope"></i></a>
					                <a title="Linkedin" href="<?php echo esc_url( $agent_linkedin_url ); ?>"><i class="fa fa-linkedin"></i></a>
					            </div>
					        </div>
					    </div>
					</div>
				<?php endif; ?>
				<?php 
				endwhile;
				wp_reset_postdata();
				endif;
				endif; 
				?>

				<?php if ( $agent_type === 'custom' ) : 
					$agent_singles = get_theme_mod( 'agent_custom' );
					foreach( $agent_singles as $agent_single ) : 
					$agent_id = $agent_single['custom_agent'];
					$agent_post_meta_data = get_post_custom($agent_id);
					$agent_position = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_position']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_position'][0] : '';
					$email = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_email']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_email'][0] : '';
					$agent_facebook_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_facebook_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_facebook_url'][0] : '';
					$agent_twitter_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_twitter_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_twitter_url'][0] : '';
					$agent_linkedin_url = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_linkedin_url']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_linkedin_url'][0] : '';
					$agent_mobile_number = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_mobile_number']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_mobile_number'][0] : '';
					$email = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_email']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_email'][0] : '';
					$ere_property = new ERE_Property();
					$agent_user_id = isset($agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_user_id']) ? $agent_post_meta_data[ERE_METABOX_PREFIX . 'agent_user_id'][0] : '';
				?>
					<?php
					// Custom layout 1
					if ( $agent_layout === 'one' ) :?>
					<div class="home-two-agents-single col-md-3 col-sm-6 clearfix" data-aos="zoom-in-down" data-aos-duration="1000">
						<div class="home-two-agents-single-content">
							<a href="<?php echo esc_url( get_the_permalink( $agent_id ) );?>"><?php echo get_the_post_thumbnail( $agent_id ); ?></a>
							<div class="home-two-agents-single-meta">
								<h4><a href="<?php echo esc_url( get_the_permalink( $agent_id ) );?>"><?php echo esc_html( get_the_title( $agent_id ) ); ?></a></h4>
								<p class="home-two-agents-type"><?php echo $agent_position; ?></p>
								<p><i class="far fa-envelope"></i><?php echo esc_html( $email );?></p>
								<p><i class="fas fa-phone-volume"></i><?php echo esc_html( $agent_mobile_number );?></p>
								<div class="home-two-agents-social">
									<span><a href="<?php echo esc_url( $agent_facebook_url ); ?>" title="Facebook"><i class="fab fa-facebook-f"></i></a></span>
									<span><a href="<?php echo esc_url( $agent_twitter_url ); ?>" title="Twitter"><i class="fab fa-twitter"></i></a></span>
									<span><a href="<?php echo esc_url( $agent_linkedin_url ); ?>" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a></span>								
								</div>
							</div>
						</div>
					</div>
					<?php endif;

					// CUstom Layout two
					if ( $agent_layout === 'two' ) :?>
					<div class="ere-agent clearfix agent-grid col-md-3 col-sm-6" data-aos="zoom-in-down" data-aos-duration="1000">
					    <div class="agent-item-inner">
					        <div class="agent-avatar">
					            <a title="<?php echo esc_html( get_the_title( $agent_id ) ); ?>" href="<?php echo esc_url( get_the_permalink( $agent_id ) );?>"><?php echo get_the_post_thumbnail( $agent_id ); ?></a>
					        </div>
					        <div class="agent-content">
					            <div class="agent-info">
					                <h2 class="agent-name"><a title="<?php echo esc_html( get_the_title( $agent_id ) ); ?>" href="<?php echo esc_url( get_the_permalink( $agent_id ) );?>"><?php echo esc_html( get_the_title( $agent_id ) ); ?></a></h2>
					                <span class="agent-total-properties"><?php
					                    $total_property = $ere_property->get_total_properties_by_user($agent_id, $agent_user_id);
					                    printf( _n( '%s property', '%s properties', $total_property, 'real-estate-salient-pro' ), ere_get_format_number($total_property ));
					                    ?></span>
					            </div>
					            <div class="agent-social">
					                <a title="Facebook" href="<?php echo esc_url( $agent_facebook_url ); ?>"><i class="fa fa-facebook"></i></a>
					                <a title="Twitter" href="<?php echo esc_url( $agent_twitter_url ); ?>"><i class="fa fa-twitter"></i></a>
					                <a title="Email" href="mailto:<?php echo sanitize_email( $email ); ?>"><i class="fa fa-envelope"></i></a>
					                <a title="Linkedin" href="<?php echo esc_url( $agent_linkedin_url ); ?>"><i class="fa fa-linkedin"></i></a>
					            </div>
					        </div>
					    </div>
					</div>
					<?php endif; ?>
				<?php 
					endforeach;					
					endif; 
				?>
				</div>
			</div>
		</div>
	</div>
	<?php 
	endif; //End of Layout one
	}
}
add_action( 'real_estate_salient_pro_homepage_agent', 'real_estate_salient_pro_home_agent', 0 );