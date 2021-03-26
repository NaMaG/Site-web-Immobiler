<?php
/**
* agent block
*/
if ( ! function_exists( 'real_estate_salient_pro_home_counter' ) ) {
	function real_estate_salient_pro_home_counter() {
	$counter_status = get_theme_mod( 'counter_enable', 'enable' );
	$counter_default = get_template_directory_uri(). '/img/image.jpg';
	$counter_background = get_theme_mod( 'counter_upload', $counter_default );
	if( !get_theme_mod( 'counter_upload' ) ){
		$counter_background = get_template_directory_uri(). '/img/image.jpg';
	}
	if ( $counter_status === 'enable' ) : ?>
	<div class="container-fluid home-two-progress" style="background: #008080 url('<?php echo esc_url( $counter_background ); ?>') no-repeat fixed;background-size: cover;" data-aos="fade-up">
		<div class="row home-two-progress-background">
			<div class="container" data-aos="fade-up">
				<div class="home-two-progress-content row">
					<?php
					$default = [
					    [
					        'counter_icon' => 'chart-bar',
					        'counter_title'  => esc_html__( 'Properties', 'real-estate-salient-pro' ),
					        'counter_count'  => 1232,
					    ],
					    [
					        'counter_icon' => 'compass',
					        'counter_title'  => esc_html__( 'Customers', 'real-estate-salient-pro' ),
					        'counter_count'  => 354,
					    ],
					    [
					        'counter_icon' => 'edit',
					        'counter_title'  => esc_html__( 'Agents', 'real-estate-salient-pro' ),
					        'counter_count'  => 27,
					    ],
					    [
					        'counter_icon' => 'thumbs-up',
					        'counter_title'  => esc_html__( 'Cities', 'real-estate-salient-pro' ),
					        'counter_count'  => 12,
					    ],
					];

					//Define for loop
				    $count_singles = get_theme_mod( 'counter_single', $default );

				    // Begin for each
				    foreach( $count_singles as $count_single ) :
				    ?>
					<div class="home-two-progress-single col-md-3 col-sm-6 clearfix">
						<i class="far fa-<?php echo esc_attr( $count_single[ 'counter_icon' ] ); ?>"></i>
						<div class="count-num home-count"><?php echo absint( $count_single[ 'counter_count' ] ); ?></div>
						<P><?php echo esc_html( $count_single[ 'counter_title' ] ); ?></P>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<?php 
	endif;
	}
}
add_action( 'real_estate_salient_pro_homepage_counter', 'real_estate_salient_pro_home_counter', 0 );