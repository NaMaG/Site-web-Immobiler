<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package real-estate-salient-pro
 */

get_header(); ?>
<?php do_action( 'real_estate_salient_pro_content_head' ); ?>
<div class="container-fluid ">
	<div class="content-area container">
		<div class="single-index clearfix" id="content">
			<div class="row">
			<?php 
				if(have_posts()):
					while(have_posts()): the_post(); 
							get_template_part( 'template-parts/content', 'single' );
					endwhile;
				endif; 
			?>		
			<?php get_sidebar(); ?>	
			</div>	
		</div>		
	</div>
</div>
<?php 
get_footer();