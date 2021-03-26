<?php 
/**
 * The archive template
 *
 * @package real-estate-salient-pro
 */


get_header(); ?>


<div class="container-fluid content-head" style="background: #008080 url('<?php echo esc_url( get_template_directory_uri(). '/img/image.jpg' ); ?>') no-repeat fixed;background-size: cover;">
	<div class="header-general-background row">
	<div class="container">
		<h1><?php the_archive_title(); ?></h1>
		<div class="breadcrumb"><?php breadcrumb_trail(); ?></div>
	</div>
	</div>
</div>
<div class="content-area container">
	<div class="single-index-content col-md-9">
		<div class="archive-head">
			
		</div>
	</div>	
	<?php 
		//content loop	
		get_template_part( 'template-parts/content', 'loop' );
		//get sidebar
		get_sidebar();
	?>
</div>
<?php get_footer();