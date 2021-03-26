<?php
/**
* properties by area block
*/

/* -- Home offer Block */
if ( ! function_exists( 'real_estate_salient_pro_home_area' ) ) {
	function real_estate_salient_pro_home_area() {
		$area_status = get_theme_mod( 'area_properties_enable', 'enable' );
		//$area_layout = get_theme_mod( 'area_properties_layout', 'one' );
		if ( $area_status === 'enable' && class_exists( 'Essential_Real_Estate' ) ) : ?>
		<div class="container-fluid home-two-area" data-aos="fade-up">
			<div class="row">
				<div class="container" data-aos="fade-up">
					<div class="recent-post-title-two">
						<h2 class="bold-second-word" data-aos="fade-up"><?php echo esc_html( get_theme_mod( 'area_properties_title', __( 'Browse Properties', 'real-estate-salient-pro' ) ) ); ?></h2>
						<p data-aos="fade-up"><?php echo esc_html( get_theme_mod( 'area_properties_title_desc', __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'real-estate-salient-pro' ) ) ); ?></p>
						<?php if( get_theme_mod( 'area_properties_title_desc' ) ) : ?>
							<hr>
						<?php endif; ?>
					</div>
					<div class="home-two-area-content row">
						<?php
						$default = [
					        [
					            'area_custom_property' => 21,
					            'area_image' => '',
					        ],
					        [
					            'area_custom_property' => 24,
					            'area_image' => '',
					        ],
					        [
					            'area_custom_property' => 25,
					            'area_image' => '',
					        ],
					        [
					            'area_custom_property' => 35,
					            'area_image' => '',
					        ],
					    ];

					    //Define for loop
					    $area_singles = get_theme_mod( 'area_property_types', $default );

					    //Foreach
					    foreach( $area_singles as $area_single ) : 
					    	$property_id = $area_single['area_custom_property'];
					    	$terms = get_terms( $property_id );
					    	$term = get_term( $property_id, 'property-type' );

						?>
						<div class="home-two-area-single col-md-6 col-sm-6 clearfix" data-aos="fade-up">
							<div class="home-two-area-single-content">
								<?php if ( $area_single['area_image'] !== '' ) : ?>
									<a href="<?php echo esc_url( get_term_link( $term) ); ?>"><?php echo wp_get_attachment_image( $area_single['area_image'], 'real-estate-salient-pro-featured' ); ?></a>
								<?php endif; ?>
								<?php if ( $area_single['area_image'] === '') : ?>
									<a href="<?php echo esc_url( get_term_link( $term) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri(). '/img/image.jpg' ); ?>"></a>
								<?php endif; ?>
								<a href="<?php echo esc_url( get_term_link( $term) ); ?>" class="home-two-area-featured"><?php echo esc_html( $term->count ); ?> Properties</a>
								<div class="home-two-area-meta" data-aos="flip-down" data-aos-duration="1000">
									<h4><?php echo $term->name; ?></h4>
									<p><?php echo $term->description; ?></p>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
		<?php endif;
	}
}


add_action( 'real_estate_salient_pro_homepage_area', 'real_estate_salient_pro_home_area', 0 );