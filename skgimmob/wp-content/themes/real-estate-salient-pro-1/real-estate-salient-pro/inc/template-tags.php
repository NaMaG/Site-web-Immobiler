<?php
/**
* Template hooks
* @package real-estate-salient
*/

if ( ! function_exists( 'real_estate_salient_pro_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 * Does nothing if the custom logo is not available.
 */
function real_estate_salient_pro_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;


//Header wrap open
if ( ! function_exists( 'real_estate_salient_pro_wrap_open' ) ) {
	function real_estate_salient_pro_wrap_open() {
		?>
	<header id="site-head" class="site-header" role="banner">
		<div class="container-fluid top-two">
			<?php if ( get_theme_mod( 'top-bar-enable', 'show') === 'show' ) : ?> 
			<div class="top-bar-two row">
				<div class="container clearfix">
					<div class="row">
						<div class="col-md-6 top-bar-left clearfix">
							<?php if ( get_theme_mod( 'email_id', 'email@textdomain.com') !== '') : ?>
								<div class="right-email clearfix">
									<i class="fas <?php echo esc_attr( get_theme_mod( 'email-icon', 'fa-envelope') ); ?>"></i>
									<p><?php echo sanitize_email( get_theme_mod( 'email_id', 'email@textdomain.com') ); ?></p>		
								</div>
							<?php endif; ?>
							<?php if ( get_theme_mod( 'phone_number', '123-456-7890') !== '') : ?>
								<div class="right-phone clearfix">
									<i class="fas <?php echo esc_attr( get_theme_mod( 'phone_icon', 'fa-phone-alt') ); ?>"></i>
									<p><?php echo esc_html( get_theme_mod( 'phone_number', '123-456-7890') ); ?></p>		
								</div>
							<?php endif; ?>
						</div>
						<div class="col-md-6 top-bar-right clearfix">
							<?php if ( get_theme_mod( 'login-enable', 'show') === 'show' && class_exists( 'Essential_Real_Estate' ) ) : ?>					
							<div class="right-login clearfix">								
								<?php echo real_estate_salient_pro_topbar_login(); ?>
							</div>
							<?php endif; ?>
							<?php 
								$social_defaults = [
								  	[
								    	'social_icon' => 'facebook',
										'social_url'  => 'https://www.facebook.com/',
									],
									[
										'social_icon' => 'twitter',
										'social_url'  => 'https://www.twitter.com/',
									],
								];
								$social_settings = get_theme_mod( 'socials', $social_defaults ); ?>
								<div class="right-social clearfix">
								<?php foreach( $social_settings as $social_setting ) : ?>
									<?php 
										$social_icon = '';
										if ($social_setting['social_icon'] === 'facebook'){$social_icon = 'fa-facebook-f';}
										if ($social_setting['social_icon'] === 'twitter'){$social_icon = 'fa-twitter';}
										if ($social_setting['social_icon'] === 'linkedin'){$social_icon = 'fa-linkedin-in';}
										if ($social_setting['social_icon'] === 'pinterest'){$social_icon = 'fa-pinterest-p';}
										if ($social_setting['social_icon'] === 'skype'){$social_icon = 'fa-skype';}
										if ($social_setting['social_icon'] === 'telegram'){$social_icon = 'fa-telegram-plane';}
									?>
									<a href="<?php echo esc_url( $social_setting['social_url'] ); ?>" title="<?php echo esc_attr( $social_setting['social_icon'] ); ?>"><i class="fab <?php echo $social_icon; ?>"></i></a>
									<?php endforeach; ?>
								</div>
						</div>
					</div>
				</div>			
			</div>
			<?php endif; ?>
			<div class="main-head row <?php if ( get_theme_mod( 'top-bar-enable', 'show') === 'show' ) {echo 'top-background'; } ?>">
				<div class="main-head-content container">
					<div class="row">
						<div class="logo col-md-3">
							<?php real_estate_salient_pro_custom_logo(); 
							if ( is_front_page() && is_home() ) : ?>		
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php endif;

							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo $description; ?></p>
							<?php endif; ?>
						</div>						
						<?php wp_nav_menu( array('theme_location' => 'catnav','container_class' => 'nav-menu col-md-9 clearfix', 'container_id' => 'cssmenu', 'menu_id' => 'menu main-menu cssmenu','menu_class' => 'menu menu-two navbar-right','fallback_cb' => 'false','items_wrap' => '<ul id="menu" class="%2$s">%3$s</ul>') ); ?>									
					</div>
				</div>
			</div>		
		</div>
	</header>
		<?php 
	}
}





/* -- post meta for single post and single page */
if ( ! function_exists( 'real_estate_salient_pro_post_meta' ) ) {
	function real_estate_salient_pro_post_meta() {
		?>
		<div class="index-single-post-content clearfix">
			<div class="index-title-content">
				<aside class="index-meta clearfix">										
					<div class="index-date-meta clearfix">
						<span><i class="fas fa-pen"></i><p><?php the_author_posts_link(); ?></p><i class="fa fa-calendar"></i><p><?php the_time( get_option( 'date_format' ) ); ?></p><i class="far fa-comments"></i><p><?php comments_popup_link( __( 'post a comment', 'real-estate-salient' ), __( '1 Comment', 'real-estate-salient' ), __( '% Comments', 'real-estate-salient' ),'', __( 'Comments Off', 'real-estate-salient' ));?></p></span>
					</div>
				</aside>
			</div>
		</div>
	<?php 
	}
}

/* -- previous / next post navigation for single post and single page */
if ( ! function_exists( 'real_estate_salient_pro_post_navigation' ) ) {
	function real_estate_salient_pro_post_navigation() {
		?>
	<div class="single-postnav clearfix">
		<hr>
			<div class="row clearfix">	
				<div class="next-post col-md-6 col-sm-6 col-xs-6"><?php next_post_link( '<i class="fa fa-chevron-circle-left"></i> %link'); ?></div>
				<div class="previous-post col-md-6 col-sm-6 col-xs-6"><?php previous_post_link( '%link <i class="fa fa-chevron-circle-right"></i>'); ?></div>
			</div>
		<hr>
	</div>
	<?php 
	}
}

/* -- post meta for index and archive lists */
if ( ! function_exists( 'real_estate_salient_pro_index_post_meta' ) ) {
	function real_estate_salient_pro_index_post_meta() {
		?>
		<div class="index-single-post-content clearfix">
			<?php if ( has_post_thumbnail() ) the_post_thumbnail('real-estate-salient-pro-index');?><!-- thumbnail picture -->
			<div class="index-title-content">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<aside class="index-meta clearfix">										
					<div class="index-date-meta clearfix">
						<span><i class="fas fa-pen"></i><p><?php the_author_posts_link(); ?></p><i class="fa fa-calendar"></i><p><?php the_time( get_option( 'date_format' ) ); ?></p><i class="far fa-comments"></i><p><?php comments_popup_link( __( 'post a comment', 'real-estate-salient' ), __( '1 Comment', 'real-estate-salient' ), __( '% Comments', 'real-estate-salient' ),'', __( 'Comments Off', 'real-estate-salient' ));?></p></span>
					</div>
				</aside>
				<?php the_excerpt(); ?>
			</div>
			<div class="index-content-readmore">
				<a href="<?php the_permalink(); ?>"><?php _e('Read More', 'real-estate-salient'); ?></a>
			</div>
		</div>
	<hr>
	<?php 
	}
}

/* -- pagination for index & archives */
if ( ! function_exists( 'real_estate_salient_pro_index_pagination' ) ) {
	function real_estate_salient_pro_index_pagination() {
		?>
		<div class="index-pagination">
			<?php echo the_posts_pagination(); ?>
		</div>
		<?php 
	}
}

/* -- content header title */
if( ! function_exists( 'real_estate_salient_pro_content_head' ) ) {
	function real_estate_salient_pro_content_head(){
		?>
			<div class="container-fluid content-head" style="background: #008080 url('<?php echo esc_url( get_template_directory_uri(). '/img/image.jpg' ); ?>') no-repeat fixed;background-size: cover;">
				<div class="header-general-background row">
				<div class="container">
					<h1><?php the_title(); ?></h1>
					<div class="breadcrumb"><?php breadcrumb_trail(); ?></div>
					<?php do_action( 'real_estate_salient_pro_postmeta' ); ?>
				</div>
				</div>
			</div>
		<?php
	}
}

/* -- content header title */
if( ! function_exists( 'real_estate_salient_pro_topbar_login' ) ) {
	function real_estate_salient_pro_topbar_login(){
	if(!is_user_logged_in()):?>
	    <a href="javascript:void(0)" class="login-link topbar-link" data-toggle="modal" data-target="#ere_signin_modal"><i class="fa fa-user"></i><span class="hidden-xs"><?php echo esc_html(get_theme_mod( 'login_text', __( 'Login or Register', 'real-estate-salient-pro' ))); ?></span></a>
	<?php else:
	    global $current_user;
	    wp_get_current_user();
	    $user_login = $current_user->user_login;
	    $user_id = $current_user->ID;
	    $allow_submit=ere_allow_submit();
	    $cur_menu='';
	    $ere_property=new ERE_Property();
	    $total_properties = $ere_property->get_total_my_properties(array('publish', 'pending', 'expired', 'hidden'));
	    $ere_invoice=new ERE_Invoice();
	    $total_invoices = $ere_invoice->get_total_my_invoice();
	    $total_favorite=$ere_property->get_total_favorite();
	    $ere_save_search= new ERE_Save_Search();
	    $total_save_search=$ere_save_search->get_total_save_search();
	    ?>
	    <div class="user-dropdown">
	        <span class="user-display-name"><i class="fa fa-user"></i><span class="hidden-xs"><?php echo esc_html($user_login); ?></span></span>
	        <ul class="user-dropdown-menu list-group">
	            <?php if ($permalink = ere_get_permalink('my_profile')) : ?>
	                <li class="list-group-item<?php if ($cur_menu == 'my_profile') echo ' active' ?>">
	                    <a href="<?php echo esc_url($permalink); ?>"><i class="fa fa-info-circle"></i><?php esc_html_e('My Profile', 'essential-real-estate'); ?></a>
	                </li>
	            <?php endif;
	            if ($allow_submit) :
	                if ($permalink = ere_get_permalink('my_properties')) : ?>
	                    <li class="list-group-item<?php if ($cur_menu == 'my_properties') echo ' active' ?>">
	                        <span class="badge"><?php echo esc_html($total_properties); ?></span>
	                        <a href="<?php echo esc_url($permalink); ?>"><i class="fa fa-list-alt"></i><?php esc_html_e('My Properties ', 'essential-real-estate'); ?></a>
	                    </li>
	                <?php endif;
	                $paid_submission_type = ere_get_option( 'paid_submission_type','no');
	                if($paid_submission_type!='no'):
	                    if ($permalink = ere_get_permalink('my_invoices')) : ?>
	                        <li class="list-group-item<?php if ($cur_menu == 'my_invoices') echo ' active' ?>">
	                            <span class="badge"><?php echo esc_html($total_invoices); ?></span>
	                            <a href="<?php echo esc_url($permalink); ?>"><i class="fa fa-credit-card"></i><?php esc_html_e('My Invoices ', 'essential-real-estate'); ?></a>
	                        </li>
	                    <?php endif;
	                endif;
	                if ($permalink = ere_get_permalink('submit_property')) : ?>
	                    <li class="list-group-item">
	                        <a href="<?php echo esc_url($permalink); ?>"><i class="fa fa-plus-circle"></i><?php esc_html_e('Submit New Property', 'essential-real-estate'); ?></a></li>
	                <?php endif;
	            endif;
	            $enable_favorite = ere_get_option('enable_favorite_property', 1);
	            if($enable_favorite==1):
	                if ($permalink = ere_get_permalink('my_favorites')) : ?>
	                    <li class="list-group-item<?php if ($cur_menu == 'my_favorites') echo ' active' ?>">
	                        <span class="badge"><?php echo esc_html($total_favorite); ?></span>
	                        <a href="<?php echo esc_url($permalink); ?>"><i class="fa fa-heart"></i><?php esc_html_e('My Favorites ', 'essential-real-estate'); ?></a>
	                    </li>
	                <?php endif;
	            endif;
	            $enable_saved_search = ere_get_option('enable_saved_search', 1);
	            if($enable_saved_search==1):
	                if ($permalink = ere_get_permalink('my_save_search')) : ?>
	                    <li class="list-group-item<?php if ($cur_menu == 'my_save_search') echo ' active' ?>">
	                        <span class="badge"><?php echo esc_html($total_save_search); ?></span>
	                        <a href="<?php echo esc_url($permalink); ?>"><i class="fa fa-search"></i><?php esc_html_e('My Saved Searches', 'essential-real-estate'); ?></a>
	                    </li>
	            <?php endif;
	            endif; ?>
	            <li class="list-group-item">
	                <?php $permalink=get_permalink(); ?>
	                <a href="<?php echo wp_logout_url( $permalink ); ?>"><i class="fa fa-sign-out"></i><?php esc_html_e('Logout', 'essential-real-estate');?></a>
	            </li>
	        </ul>
	    </div>
	<?php endif;
	}
}


add_action( 'real_estate_salient_pro_wrapopen', 'real_estate_salient_pro_wrap_open', 0 );
add_action( 'real_estate_salient_pro_postmeta', 'real_estate_salient_pro_post_meta', 0 );
add_action( 'real_estate_salient_pro_postnavigation', 'real_estate_salient_pro_post_navigation', 0 );
add_action( 'real_estate_salient_pro_index_postmeta', 'real_estate_salient_pro_index_post_meta', 0 );
add_action( 'real_estate_salient_pro_index_pagination', 'real_estate_salient_pro_index_pagination', 0 );
add_action( 'real_estate_salient_pro_content_head', 'real_estate_salient_pro_content_head', 0 );
