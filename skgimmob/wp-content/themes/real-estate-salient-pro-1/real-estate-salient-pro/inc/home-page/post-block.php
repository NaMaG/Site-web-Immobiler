<?php
/**
* agent block
*/
if ( ! function_exists( 'real_estate_salient_pro_home_post' ) ) {
	function real_estate_salient_pro_home_post() {
	$post_status = get_theme_mod( 'post_enable', 'enable' );
	$post_type = get_theme_mod( 'post_type', 'recent' );
	$post_count = absint( get_theme_mod( 'post_number_count', 3 ) );
	// Layout one
	if ( $post_status === 'enable' ) : ?>
	<div class="container-fluid home-two-post" data-aos="fade-up">
		<div class="row">
			<div class="container" data-aos="fade-up">
				<div class="recent-post-title-two">
					<h2 class="bold-second-word"><?php echo esc_html( get_theme_mod( 'post_title', __( 'Latest News', 'real-estate-salient-pro' ) ) ); ?></h2>
					<p><?php echo esc_html( get_theme_mod( 'post_title_desc', __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'real-estate-salient-pro' ) ) ); ?></p>
					<?php if( get_theme_mod( 'post_title_desc', __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'real-estate-salient-pro' ) ) ) : ?>
						<hr>
					<?php endif; ?>
				</div>
				<div class="home-two-post-content owl-carousel owl-theme clearfix">
					<?php if ( $post_type === 'recent' ) :
					$args = array(
					    'post_type' => 'post',
					    'ignore_sticky_posts' => true,
					    'posts_per_page' => $post_count,
					    'orderby' => 'date',
					    'order' => 'DESC',
					    'post_status' => 'publish',
					);
					$latestloop = new WP_Query($args);
					if ($latestloop->have_posts()) :  while ($latestloop->have_posts()) : $latestloop->the_post();
					?>    
					<div class="home-two-post-single clearfix">
						<div class="home-two-post-single-content">
							<a href="<?php the_permalink();?>"><?php the_post_thumbnail('real-estate-salient-pro-featured'); ?></a>
							<h3><a title-"<?php the_title(); ?>" href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
							<p><i class="fas fa-calendar-alt"></i><?php
			                    $get_the_time=get_the_time('U');
			                    $current_time=current_time('timestamp');
			                    $human_time_diff=human_time_diff($get_the_time, $current_time);
			                    printf(_x(' %s ago', '%s = human-readable time difference', 'real-estate-salient-pro'), $human_time_diff); ?></p>
							<?php the_excerpt(); ?>
						</div>
					</div>
					<?php 
					endwhile;
					wp_reset_postdata();
					endif;
					endif;

					// Custom posts
					if ( $post_type === 'custom' ) : 
					$custom_posts = get_theme_mod( 'post_custom', '' );
					foreach( $custom_posts as $custom_post ) : 
					$postid = $custom_post['custom_post'];
					?>
						<div class="home-two-post-single clearfix">
							<div class="home-two-post-single-content">
								<a href="<?php echo esc_url( get_the_permalink( $postid ) );?>"><?php echo get_the_post_thumbnail( $postid, 'real-estate-salient-pro-featured' ); ?></a>
								<h3><a title-"<?php echo esc_html( get_the_title( $postid ) ); ?>" href="<?php echo esc_url( get_the_permalink( $postid ) );?>"><?php echo esc_html( get_the_title( $postid ) ); ?></a></h3>
								<p><i class="fas fa-calendar-alt"></i><?php
				                    $get_the_time=get_the_time('U');
				                    $current_time=current_time('timestamp');
				                    $human_time_diff=human_time_diff($get_the_time, $current_time);
				                    printf(_x(' %s ago', '%s = human-readable time difference', 'real-estate-salient-pro'), $human_time_diff); ?></p>
								<?php echo get_the_excerpt( $postid ); ?>
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
	<?php 
	endif; //End of Layout one
	}
}
add_action( 'real_estate_salient_pro_homepage_post', 'real_estate_salient_pro_home_post', 0 );