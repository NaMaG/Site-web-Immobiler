<?php
/**
* Home offer block
*/

/* -- Home offer Block */
if ( ! function_exists( 'real_estate_salient_pro_home_search' ) ) {
	function real_estate_salient_pro_home_search() {
		$search_status = get_theme_mod( 'search_enable', 'enable' );
		if ( $search_status === 'enable' ) : 
		?>
		<div class="container-fluid home-two-search">
			<div class="row">
				<div class="container">
					<div class="home-two-search-content" data-aos="zoom-in" data-aos-duration="1500" data-aos-once="true">
					<?php echo do_shortcode('[ere_property_advanced_search status_enable="true" type_enable="true" title_enable="true" address_enable="true" country_enable="false" state_enable="false" city_enable="false" neighborhood_enable="false" bedrooms_enable="false" bathrooms_enable="false" price_enable="true" price_is_slider="false" area_enable="true" area_is_slider="false" land_area_enable="true" land_area_is_slider="false" label_enable="false" garage_enable="false" property_identity_enable="false" other_features_enable="false" layout="tab" column="3" color_scheme="color-dark" el_class=""]');?>
					</div>
				</div>
			</div>
		</div>		
	<?php endif;
	}
}
add_action( 'real_estate_salient_pro_homepage_search', 'real_estate_salient_pro_home_search', 0 );