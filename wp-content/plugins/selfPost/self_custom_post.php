<?php
/*
*Plugin Name: Self Custom Post
*Plugin URI:
*Description: Self Custom Post
*Version 1.0
*Author: Jason Spriggs
*/


add_action('init', 'js_self_custom_post');

function js_self_custom_post(){
	register_post_type('self_post',
		[
		'labels' => [
			'name' => 'Self Custom Post',
			'singular_name' => 'Self Custom Post',
			'edit_item' => 'Edit item',
			'new_item' => 'New item',
			'view_item' => 'View item',
			'search_item' => 'Search self',
			'not_found' => 'No items found',
			'not_found_in_trash' => 'No items found in the trash',
			'parent_item_colon' => 'Parent item'
		],
			'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-heart',
			'publicly_queryable' => true,
			'query_var' => true,
			'supports' => [
				'title', 'editor', 'thumbnail', 'comments',
			],
				'taxonomies' => ['Self Catagories','post_tag'],
		]
	);
}

add_action('admin_init', 'self_post');

function self_post(){
	add_meta_box(
		'Self Info',
		'self_post',
		'normal',
		'high'
	);
}
/* Taxonomy for catagories */
//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'js_self_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

 function js_self_taxonomy() {

 //Add new taxonomy, make it hierarchical like categories
// first do the translations part for GUI
$labels = [
	'name' => 'Self Catagories',
	'singular_name' => 'Self Catagories',
	'search_item' => 'Search Self Catagories',
	'all_items' => 'All Self Catagories',
	'parent_item' => 'Parent Self',
	'parent_item_colon' => 'Parent Self:',
	'edit_item' => 'Edit Self Catagories',
	'update_item' => 'Update Self',
	'add_new_item' => 'Add New Self Catagories',
	'new_item_name' => 'New Self Name',
	'menu_name' => 'Self Catagories'
];

$args = [
	'hierarchical' => true,
	'labels' => $labels,
	'show_ui' => true,
	'show_admin_column' => true,
	'query_var' => true,
];

register_taxonomy('Self', 'self_post', $args);

}
/* End of Taxonomy */





add_action('save_post', 'add_self_fields', 10, 2);

function add_self_fields($self_info_id, $self){
	if($self->post_type == 'self_post'){
		if(!current_user_can('edit_post', $self_info_id))
			return $self_info_id;
	}
}

add_filter('template_include', 'include_self_function', 1);

function include_self_function($template_path){
	if(get_post_type() == 'self_post'){
		if(is_single()){
			if($theme_file = locate_template(['self.php'])){
				$template_path = $theme_file;
			} else {
				$template_path = plugin_dir_path(__FILE__) . '/self.php';
			}
		}
	}
	return $template_path;
}



/*/////////////////////////new short code/////////////////////////////////////*/
/*/////////////////////////short code/////////////////////////////////////*/



/* short code for "self" post */

function jk_excerpt_length( $length) {
        return 24;
    }
    add_filter( 'excerpt_length', 'jk_excerpt_length', 999 );

		function jk_excerpt_more( $more ) {
			return '...Read More';
	}
	add_filter( 'excerpt_more', 'jk_excerpt_more' );

function posts_shortcode( $atts ) {
    $output = '';
    $custom_loop_atts = shortcode_atts(
      [
          'type'  =>  'self_post',
      ], $atts
    );

    $post_type = $custom_loop_atts['type'];
    $args = array(
        'post_type'     => self_post,
        'post_status'   => 'publish',
        'order' => 'date',
        'posts_per_page' => 6
    );

    $the_query = new WP_Query($args);

    $output .= '<section class="self">';
      $output .= '<div class="container-fluid">';
        $output .= '<div class="row">';




		$i = 0;
    while ($the_query->have_posts()) : $the_query->the_post();
        $post_id = get_the_ID();
				if ($i == 0){
					$output .= '<div class="col-md-4 self__first__col">';
						$output .= '<h1>';
							$output .= get_the_title();
						$output .= '</h1>';
						$output .= '<p>';
							$output .= get_the_excerpt($post_id);
						$output .= '</p>';
				}
				elseif ($i==1){
					$output .= '<h1>';
						$output .= get_the_title();
					$output .= '</h1>';
					$output .= '<p>';
						$output .= get_the_excerpt($post_id);
					$output .= '</p>';
					$output .= '</div>';
				}
				elseif ($i==2){
					$output .= '<div class="col-md-4 self__header">';
						$output .= '<h1>';
							$output .= 'self';
						$output .= '</h1>';
					$output .= '</div>';

				}
				elseif ($i==3){
					$output .= '<div class="col-md-4 self__second__col">';
					$output .= '<h1>';
						$output .= get_the_title();
					$output .= '</h1>';
					$output .= '<p>';
						$output .= get_the_excerpt($post_id);
					$output .= '</p>';
				}

				else{
					$output .= '<h1>';
						$output .= get_the_title();
					$output .= '</h1>';
					$output .= '<p>';
						$output .= get_the_excerpt($post_id);
					$output .= '</p>';
					$output .= '</div>';
				}





		$i++;
    endwhile;

		$output .= '</div>';
		$outout .= '</div>';
		$output .= '</section>';


  return $output;
  wp_reset_postdata();

}

add_shortcode( 'posts_items', 'posts_shortcode');





?>