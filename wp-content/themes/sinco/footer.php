<?php
/**
 * Footer Main File.
 *
 * @package SINCO
 * @author  Template Path
 * @version 1.0
 */
global $wp_query;
$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();
?>

	<div class="clearfix"></div>

	<?php sinco_template_load( 'templates/footer/footer.php', compact( 'page_id' ) );?>

	<button class="scroll-top">
        <i class="bi bi-arrow-up-short"></i>
    </button>
			

</div>
<!--End Page Wrapper-->

<?php wp_footer(); ?>
</body>
</html>
