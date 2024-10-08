<?php

/**
 * Sidebar Template
 *
 * @package    WordPress
 * @subpackage SINCO
 * @author     TemplatePath
 * @version    1.0
 */

if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'sidebar_type' ) == 'e' AND $data->get( 'sidebar_elementor' ) ) {
	?>

	<div class="col-lg-4 col-md-6">
		<div class="blog-sidebar ps-xl-5 ps-lg-3 me-xxl-5 mt-45 md-mt-70">
			<?php
			echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'sidebar_elementor' ) );
			?>
		</div>
	</div>
	<?php
	return false;
} else {
	$options = $data->get( 'sidebar' );
}
?>

<?php if ( is_active_sidebar( $options ) ) : ?>
	<div class="col-lg-4 col-md-6">
		<div class="blog-sidebar ps-xl-5 ps-lg-3 me-xxl-5 mt-45 md-mt-70">
			<?php dynamic_sidebar( $options ); ?>
		</div>
	</div>
<?php endif; ?>

