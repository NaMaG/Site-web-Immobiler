<?php
/**
* Home offer block
*/

/* -- Home offer Block */
if ( ! function_exists( 'real_estate_salient_pro_home_offer' ) ) {
	function real_estate_salient_pro_home_offer() {
		$offer_status = get_theme_mod( 'offer_enable', 'enable' );
		$offer_layout = get_theme_mod( 'offer_layout', 'one' );
		if ( $offer_status === 'enable' && $offer_layout !== 'two' ) : ?>
		<div class="container-fluid home-two-service" data-aos="fade-up">
			<div class="row">
				<div class="container" data-aos="fade-up">
					<div class="recent-post-title-two">
						<h2 class="bold-second-word"><?php echo esc_html( get_theme_mod( 'offer_title', __( 'Our services', 'real-estate-salient-pro' ) ) ); ?></h2>
						<p><?php echo esc_html( get_theme_mod( 'offer_title_desc', __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'real-estate-salient-pro' ) ) ); ?></p>
						<hr>
					</div>
					<div class="home-two-service-content row">
					<?php
						$default = [
					        [
					            'offer_social_icon' => 'chart-bar',
					            'feature_title'  => esc_html__( 'Business growth', 'real-estate-salient-pro' ),
					            'feature_desc'  => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry' ),
					        ],
					        [
					            'offer_social_icon' => 'compass',
					            'feature_title'  => esc_html__( 'Business growth', 'real-estate-salient-pro' ),
					            'feature_desc'  => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry' ),
					        ],
					        [
					            'offer_social_icon' => 'edit',
					            'feature_title'  => esc_html__( 'Business growth', 'real-estate-salient-pro' ),
					            'feature_desc'  => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry' ),
					        ],
					        [
					            'offer_social_icon' => 'thumbs-up',
					            'feature_title'  => esc_html__( 'Business growth', 'real-estate-salient-pro' ),
					            'feature_desc'  => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry' ),
					        ],
					        [
					            'offer_social_icon' => 'hand-peace',
					            'feature_title'  => esc_html__( 'Business growth', 'real-estate-salient-pro' ),
					            'feature_desc'  => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry' ),
					        ],
					        [
					            'offer_social_icon' => 'life-ring',
					            'feature_title'  => esc_html__( 'Business growth', 'real-estate-salient-pro' ),
					            'feature_desc'  => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry' ),
					        ],
					    ];

					    //Define for loop
					    $offer_singles = get_theme_mod( 'offer_one_single', $default );

					    //Foreach
					    foreach( $offer_singles as $offer_single ) : ?>
						<div class="home-two-service-single col-md-4 col-sm-6 clearfix" data-aos="fade-up">
							<div class="home-two-service-single-content">						
								<i class="far fa-<?php echo esc_attr__( $offer_single['offer_social_icon'] ); ?>"></i>
								<h3><?php echo esc_html__( $offer_single['feature_title'] ); ?></h3>
								<p><?php echo esc_html__( $offer_single['feature_desc'] ); ?></p>						
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>		
	<?php endif;

	// Layout two
	if ( $offer_status === 'enable' && $offer_layout === 'two' ) : ?>
		<div class="home-testimonial container-fluid" data-aos="fade-up">	
			<div class="container clearfix">
				<div class="row">
					<div class="home-testimonial-left col-md-6">
						<div class="testimonial-left-titles" data-aos="fade-up">
							<h3 class="bold-second-word" data-aos="fade-up"><?php echo esc_html( get_theme_mod( 'offer_title', __( 'Our services', 'real-estate-salient-pro' ) ) ); ?></h3>
							<p data-aos="fade-up"><?php echo esc_html( get_theme_mod( 'offer_title_desc', __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'real-estate-salient-pro' ) ) ); ?></p>
						</div>
						<?php
						$default = [
					        [
					            'offer_social_icon' => 'chart-bar',
					            'feature_title'  => esc_html__( 'Business growth', 'real-estate-salient-pro' ),
					            'feature_desc'  => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry' ),
					        ],
					        [
					            'offer_social_icon' => 'compass',
					            'feature_title'  => esc_html__( 'Business growth', 'real-estate-salient-pro' ),
					            'feature_desc'  => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry' ),
					        ],
					        [
					            'offer_social_icon' => 'edit',
					            'feature_title'  => esc_html__( 'Business growth', 'real-estate-salient-pro' ),
					            'feature_desc'  => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry' ),
					        ],
					    ];

					    //Define for loop
					    $offer_singles = get_theme_mod( 'offer_two_single', $default );

					    //Foreach
					    foreach( $offer_singles as $offer_single ) : ?>
							<div class="testimonial-lists clearfix" data-aos="fade-up">
								<i class="far fa-<?php echo esc_attr__( $offer_single['offer_social_icon'] ); ?>"></i>
								<div class="testimonial-list-content">
									<h3><?php echo esc_html__( $offer_single['feature_title'] ); ?></h3>
									<p><?php echo esc_html__( $offer_single['feature_desc'] ); ?></p>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="home-testimonial-right clearfix col-md-6">
						<img data-aos="fade-up" src="<?php echo esc_url( get_theme_mod( 'offer_image_upload', get_template_directory_uri(). '/img/offer.png' ) ); ?>">
					</div>
				</div>
			</div>
		</div>
	<?php endif;
	}
}
add_action( 'real_estate_salient_pro_homepage_offer', 'real_estate_salient_pro_home_offer', 0 );