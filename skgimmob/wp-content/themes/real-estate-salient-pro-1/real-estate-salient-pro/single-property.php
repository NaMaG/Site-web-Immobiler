<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
global $post;
$property_id=get_the_ID();
$property_meta_data = get_post_custom( $property_id );
$property_identity         = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_identity' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_identity' ][0] : '';
$property_size         = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_size' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_size' ][0] : '';
$property_bedrooms    = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_bedrooms' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_bedrooms' ][0] : '0';
$property_bathrooms   = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_bathrooms' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_bathrooms' ][0] : '0';

$property_title = get_the_title();
$property_address     = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_address' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_address' ][0] : '';
$property_status = get_the_terms( $property_id, 'property-status' );
$property_price              = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_price' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_price' ][0] : '';
$property_price_short              = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_short' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_short' ][0] : '';
$property_price_unit             = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_unit' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_unit' ][0] : '';

$property_price_prefix      = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_prefix' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_prefix' ][0] : '';
$property_price_postfix      = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_postfix' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_postfix' ][0] : '';

get_header('ere');
/**
 * ere_before_main_content hook.
 *
 * @hooked ere_output_content_wrapper_start - 10 (outputs opening divs for the content)
 */
?>
<div class="container-fluid" style="background: #008080 url('<?php echo esc_url( get_template_directory_uri(). '/img/image.jpg' ); ?>') no-repeat fixed;background-size: cover;">
	<div class="header-general-background row">
		<div class="container">
		<div class="property-heading">
		<div class="property-info-block-inline">
			<?php if (!empty( $property_price ) ): ?>
				<span class="property-price">
				<?php if(!empty( $property_price_prefix )) {echo '<span class="property-price-prefix">'.$property_price_prefix.' </span>';} ?>
				<?php
				echo ere_get_format_money( $property_price_short,$property_price_unit );
				?>
				<?php if(!empty( $property_price_postfix )) {echo '<span class="property-price-postfix"> / '.$property_price_postfix.'</span>';} ?>
			</span>
			<?php elseif (ere_get_option( 'empty_price_text', '' )!='' ): ?>
				<span class="property-price"><?php echo ere_get_option( 'empty_price_text', '' ) ?></span>
			<?php endif; ?>
			<?php
				if ( $property_status ) : ?>
					<div class="property-status">
						<?php foreach ( $property_status as $status ) :
							$status_color = get_term_meta($status->term_id, 'property_status_color', true);?>
							<span class="" style="background-color: <?php echo esc_attr($status_color) ?>"><?php echo esc_html( $status->name ); ?></span>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			<?php if ( ! empty( $property_title ) ): ?>
				<h2><?php the_title(); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $property_address ) ):
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
				<div class="property-location" title="<?php echo esc_attr( $property_address ) ?>">
					<i class="fa fa-map-marker"></i>
					<a target="_blank"
					   href="<?php echo esc_url($google_map_address_url); ?>"><span><?php echo esc_attr($property_address) ?></span></a>
				</div>
			<?php endif; ?>
		</div>
		</div>
		</div>
	</div>	
</div>
<div class="content-area container">
	<div class="single-index col-md-9 clearfix" id="content">
<?php
do_action( 'ere_before_main_content' );
do_action('ere_single_property_before_main_content');
if (have_posts()):
    while (have_posts()): the_post(); ?>
        <?php ere_get_template_part('content', 'single-property'); ?>
    <?php endwhile;
endif;
do_action('ere_single_property_after_main_content');
/**
 * ere_after_main_content hook.
 *
 * @hooked ere_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'ere_after_main_content' );
/**
 * ere_sidebar_property hook.
 *
 * @hooked ere_sidebar_property - 10
 */
?>
</div>

<?php 
do_action('ere_sidebar_property');?>
</div>
<?php get_footer('ere');