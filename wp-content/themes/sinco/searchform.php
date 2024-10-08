<?php
/**
 * Search Form template
 *
 * @package SINCO
 * @author Template Path
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<div class="sidebar-search">
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="text" name="s"  value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search..', 'sinco' ); ?>">
        <button class="tran3s"><i class="bi bi-search"></i></button>
    </form>
</div>
