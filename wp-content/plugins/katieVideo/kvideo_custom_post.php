<?php
/*
*Plugin Name: Katie Video Post
*Plugin URI:
*Description: Katie Video Post
*Version 1.0
*Author: Jason Spriggs
*/


add_action('init', 'kvideo_custom_post');

function kvideo_custom_post(){
	register_post_type('kvideo_post',
		[
		'labels' => [
			'name' => 'Katie Video post',
			'singular_name' => 'Katie Video post',
			'edit_item' => 'Edit item',
			'new_item' => 'New item',
			'view_item' => 'View item',
			'search_item' => 'Search Video',
			'not_found' => 'No items found',
			'not_found_in_trash' => 'No items found in the trash',
			'parent_item_colon' => 'Parent item'
		],
			'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-format-video',
			'publicly_queryable' => true,
			'query_var' => true,
			'supports' => [
				'title', 'editor', 'thumbnail', 'comments',
			],
				'taxonomies' => ['Video Catagories','post_tag'],
		]
	);
}

add_action('admin_init', 'kvideo_post');

function kvideo_post(){
	add_meta_box(
		'Video Info',
		'kvideo_post',
		'normal',
		'high'
	);
}
/* Taxonomy for catagories */
//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'js_video_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

 function js_video_taxonomy() {

 //Add new taxonomy, make it hierarchical like categories
// first do the translations part for GUI
$labels = [
	'name' => 'Video Catagories',
	'singular_name' => 'Video Catagories',
	'search_item' => 'Search Video Catagories',
	'all_items' => 'All Video Catagories',
	'parent_item' => 'Parent Video',
	'parent_item_colon' => 'Parent Video:',
	'edit_item' => 'Edit Video Catagories',
	'update_item' => 'Update Video',
	'add_new_item' => 'Add New Video Catagories',
	'new_item_name' => 'New Video Name',
	'menu_name' => 'Video Catagories'
];

$args = [
	'hierarchical' => true,
	'labels' => $labels,
	'show_ui' => true,
	'show_admin_column' => true,
	'query_var' => true,
];

register_taxonomy('video', 'kvideo_post', $args);

}
/* End of Taxonomy */


function js_excerpt_length($length){
	return 15;
}
add_filter('excerpt_length', 'js_excerpt_length', 999);


function js_excerpt_more($more){
	return 'Read More';
}

add_filter('excerpt_more', 'js_excerpt_more');



add_action('save_post', 'add_video_fields', 10, 2);

function add_video_fields($video_info_id, $video){
	if($video->post_type == 'kvideo_post'){
		if(!current_user_can('edit_post', $video_info_id))
			return $video_info_id;
	}
}

add_filter('template_include', 'include_video_function', 1);

function include_video_function($template_path){
	if(get_post_type() == 'kvideo_post'){
		if(is_single()){
			if($theme_file = locate_template(['kvideo.php'])){
				$template_path = $theme_file;
			} else {
				$template_path = plugin_dir_path(__FILE__) . '/kvideo.php';
			}
		}
	}
	return $template_path;
}

// function set_posts_per_page_for_Video($query){
// 	if($query -> is_post_type_archive('kvideo_post')){
// 		$query -> set('posts_per_page', '3');
// 	}
// }

// add_action('pre_get_posts', 'set_posts_per_page_for_video');




/*/////////////////////////short code/////////////////////////////////////*/

function custom_loop_shortcode( $atts ) {
    $output = '';
    $custom_loop_atts = shortcode_atts(
      [
        'type' => 'kvideo_post',
      ], $atts

      );
    $post_type = $custom_loop_atts['type'];
    $args = array(
        'post_type' => kvideo_post,
        'post_status' => 'publish',
        'order' => 'date',
        'posts_per_page' => 4

      );



    $the_query = new WP_Query($args);
        $output .= '<div class="container-fluid">';
            $output .= '<div class="row">';

           
		    while ($the_query->have_posts()) : $the_query->the_post();
		      $post_id = get_the_ID();

		       
			      	$output .= '<div class="col-sm-6 col-md-6 col-lg-3 newest-recent-post">';
				      	$output .= get_the_post_thumbnail($post_id, 'full');

			      		$output .= '<div class="embed-responsive embed-responsive-4by3">';

			      		

			      			$output .= '<span class="katieVideo">';
			      				$output .= get_the_content();
			      			$output .= '</span>';
				      	$output .= '</div>';
			      	$output .= '</div>';


		    

		     
>

				
		    endwhile;

				
       		$output .= '</div>';
        $output .= '</div>';

      	return $output;

      	wp_reset_postdata();

    }


    add_shortcode('custom-loop', 'custom_loop_shortcode');




?>
