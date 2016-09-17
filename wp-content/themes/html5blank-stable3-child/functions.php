<?php

add_action('wp_enqueue_scripts', 'my_style_method');
function my_style_method() {

	//sets it
	wp_register_style('style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0', 'all');
	// fires it
	wp_enqueue_style('style'); //enqueue it
}

add_action('wp_enqueue_scripts', 'my_method');
function my_method() {
    //sets it
	 wp_register_script('custom-script', get_stylesheet_directory_uri() . '/min/custom-min.js', true );

	wp_register_script('custom-js', get_stylesheet_directory_uri() . '/scripts/custom.js', true );
	// fires it
	wp_enqueue_script('custom-js'); //enqueue it
}

wp_register_script('bootstrap', get_stylesheet_directory_uri(). '/scripts/bootstrap.min.js', array('jquery'), true);

wp_enqueue_script('bootstrap');

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'html5blank-stable3-child' ),
) );


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
          'type'  =>  'post',
      ], $atts
    );

    $post_type = $custom_loop_atts['type'];
    $args = array(
        'post_type'     => $post_type,
        'post_status'   => 'publish',
        'order' => 'date',
        'posts_per_page' => 5
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
							$output .= get_the_excerpt();
						$output .= '</p>';
				}
				elseif ($i==1){
					$output .= '<h1>';
						$output .= get_the_title();
					$output .= '</h1>';
					$output .= '<p>';
						$output .= get_the_excerpt();
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
						$output .= get_the_excerpt();
					$output .= '</p>';
				}

				else{
					$output .= '<h1>';
						$output .= get_the_title();
					$output .= '</h1>';
					$output .= '<p>';
						$output .= get_the_excerpt();
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
