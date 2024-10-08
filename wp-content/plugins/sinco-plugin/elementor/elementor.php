<?php

namespace SINCOPLUGIN\Element;


class Elementor {
	static $widgets = array(
		//Home Page One
		'banner_v1',
		'services_provider',
		'our_business',
		'work_process',
		'funfacts',
		'testimonials',
		'our_faqs',
		'latest_news',
		'contact_us',
		'our_clients',
		
		//Home Page Two
		'banner_v2',
		'our_clients_v2',
		'services_v1',
		'our_business_v2',
		'success_stories',
		'our_skills',
		'our_features',
		'testimonials_v2',
		'latest_news_v2',
		'call_to_action',
		
		//Home Page Three
		'banner_v3',
		'services_v2',
		'our_solutions',
		'funfacts_v2',
		'work_process_v2',
		'recent_work',
		'pricing_plan',
		'testimonials_v3',
		'our_clients_v3',
		'contact_info',
		
		//Home Page Four
		'banner_v4',
		'our_features_v2',
		'our_chatbot_tabs',
		'chatbot_platform',
		'how_it_works',
		'why_choose_us',
		'download_app',
		'contact_info_v2',
		
		//Home Page Five
		'banner_v5',
		'our_clients_v4',
		'services_v3',
		'our_solutions_v2',
		'how_it_works_v2',
		'our_skills_v2',
		'recent_projects',
		'pricing_plan_v2',
		'latest_news_v3',
		'call_to_action_v2',
		
		//Inner Pages
		'our_business_v3',
		'our_features_v3',
		'funfacts_v3',
		'our_team',
		'our_vedio',
		'services_v4',
		'service_detail',
		'our_faq_v1',
		'our_projects',
		'our_projects_v1',
		'project_detail',
		'blog_grid',
		'blog_sidebar',
		'our_blogs',
		'contact_us_v1',
		'call_to_action_v3',
	);

	static function init() {
		add_action( 'elementor/init', array( __CLASS__, 'loader' ) );
		add_action( 'elementor/elements/categories_registered', array( __CLASS__, 'register_cats' ) );
	}

	static function loader() {

		foreach ( self::$widgets as $widget ) {

			$file = SINCOPLUGIN_PLUGIN_PATH . '/elementor/' . $widget . '.php';
			if ( file_exists( $file ) ) {
				require_once $file;
			}

			add_action( 'elementor/widgets/widgets_registered', array( __CLASS__, 'register' ) );
		}
	}

	static function register( $elemntor ) {
		foreach ( self::$widgets as $widget ) {
			$class = '\\SINCOPLUGIN\\Element\\' . ucwords( $widget );

			if ( class_exists( $class ) ) {
				$elemntor->register_widget_type( new $class );
			}
		}
	}

	static function register_cats( $elements_manager ) {

		$elements_manager->add_category(
			'sinco',
			[
				'title' => esc_html__( 'Sinco', 'sinco' ),
				'icon'  => 'fa fa-plug',
			]
		);
		$elements_manager->add_category(
			'templatepath',
			[
				'title' => esc_html__( 'Template Path', 'sinco' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

Elementor::init();