<?php
return array(
	'title'      => 'Sinco Setting',
	'id'         => 'sinco_meta',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'page', 'post', 'team', 'project', 'product', 'tribe_events', 'service' ),
	'sections'   => array(
		require_once SINCOPLUGIN_PLUGIN_PATH . '/metabox/header.php',
		require_once SINCOPLUGIN_PLUGIN_PATH . '/metabox/banner.php',
		require_once SINCOPLUGIN_PLUGIN_PATH . '/metabox/sidebar.php',
		require_once SINCOPLUGIN_PLUGIN_PATH . '/metabox/footer.php',
	),
);