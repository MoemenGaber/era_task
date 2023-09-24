<?php

namespace classes;

class Assets {


	public function __construct(){
		add_action( 'wp_enqueue_scripts', __CLASS__ .'::enqueue_infinite_scroll_script' );
	}

	public static function enqueue_infinite_scroll_script() {
		wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' );
		wp_enqueue_style( 'custom-style', get_template_directory_uri().'/assets/css/style.css' );

		wp_enqueue_script( 'infinite-scroll', get_template_directory_uri() . '/assets/js/infinite-scroll.js', array('jquery'), null, true );
		wp_localize_script( 'infinite-scroll', 'infinite_scroll', array('ajaxurl' => admin_url( 'admin-ajax.php' )));
	}


}
new Assets();