<?php

namespace classes;


use WP_Query;

class PostsViewer {


	public function __construct(){
		add_action('wp_ajax_load_more_posts', __CLASS__ .'::load_more_posts');
		add_action('wp_ajax_nopriv_load_more_posts', __CLASS__ .'::load_more_posts');

	}

	public static function load_more_posts() {
		$posts_ids = array();
		if(isset($_GET['post_id'])){
			$posts_ids[]=$_GET['post_id'];
		}
		if (isset($_GET['paged'])) {
			$paged = $_GET['paged'];
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => 1,
				'paged'=>$paged,
				'post__not_in'=>$posts_ids
			);

			$query = new WP_Query($args);
			$post = $query->posts[0];
			ob_start();
			setup_postdata($post->ID);
			get_template_part( 'template-parts/content', 'ajax-posts',array(
				'post'=>$post,
			) );

			$content = ob_get_contents();
			ob_end_clean();
			if ($post) {
				$response = array(
					'success' => true,
					'content' => $content,
					'permalink' => get_permalink($post->ID),
					'next_post_id' => $post->ID,
				);
			} else {
				$response = array('success' => false);
			}
			wp_send_json($response);
		}
		die();
	}


	public static function write_log( $log ) {
	if ( true === WP_DEBUG ) {
		if ( is_array( $log ) || is_object( $log ) ) {
			error_log( print_r( $log, true ) );
		} else {
	error_log( $log );
}
}
}



}

new PostsViewer();