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

// function jk_excerpt_length( $length) {
//         return 24;
//     }
//     add_filter( 'excerpt_length', 'jk_excerpt_length', 999 );

// 		function jk_excerpt_more( $more ) {
// 			return '...Read More';
// 	}
// 	add_filter( 'excerpt_more', 'jk_excerpt_more' );

// function posts_shortcode( $atts ) {
//     $output = '';
//     $custom_loop_atts = shortcode_atts(
//       [
//           'type'  =>  'post',
//       ], $atts
//     );

//     $post_type = $custom_loop_atts['type'];
//     $args = array(
//         'post_type'     => $post_type,
//         'post_status'   => 'publish',
//         'order' => 'date',
//         'posts_per_page' => 5
//     );

//     $the_query = new WP_Query($args);

//     $output .= '<section class="self">';
//       $output .= '<div class="container-fluid">';
//         $output .= '<div class="row">';




// 		$i = 0;
//     while ($the_query->have_posts()) : $the_query->the_post();
//         $post_id = get_the_ID();
// 				if ($i == 0){
// 					$output .= '<div class="col-md-4 self__first__col">';
// 						$output .= '<h1>';
// 							$output .= get_the_title();
// 						$output .= '</h1>';
// 						$output .= '<p>';
// 							$output .= get_the_excerpt();
// 						$output .= '</p>';
// 				}
// 				elseif ($i==1){
// 					$output .= '<h1>';
// 						$output .= get_the_title();
// 					$output .= '</h1>';
// 					$output .= '<p>';
// 						$output .= get_the_excerpt();
// 					$output .= '</p>';
// 					$output .= '</div>';
// 				}
// 				elseif ($i==2){
// 					$output .= '<div class="col-md-4 self__header">';
// 						$output .= '<h1>';
// 							$output .= 'self';
// 						$output .= '</h1>';
// 					$output .= '</div>';

// 				}
// 				elseif ($i==3){
// 					$output .= '<div class="col-md-4 self__second__col">';
// 					$output .= '<h1>';
// 						$output .= get_the_title();
// 					$output .= '</h1>';
// 					$output .= '<p>';
// 						$output .= get_the_excerpt();
// 					$output .= '</p>';
// 				}

// 				else{
// 					$output .= '<h1>';
// 						$output .= get_the_title();
// 					$output .= '</h1>';
// 					$output .= '<p>';
// 						$output .= get_the_excerpt();
// 					$output .= '</p>';
// 					$output .= '</div>';
// 				}





// 		$i++;
//     endwhile;

// 		$output .= '</div>';
// 		$outout .= '</div>';
// 		$output .= '</section>';


//   return $output;
//   wp_reset_postdata();

// }

// add_shortcode( 'posts_items', 'posts_shortcode');


// remove default sorting dropdown

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );


add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}


/** woocommerce: change position of price on single product **/
 remove_action( 'woocommerce_single_product_summary',
						'woocommerce_template_single_price', 10);
 add_action( 'woocommerce_single_product_summary',
				 'woocommerce_template_single_price', 20 );


// removing the woocommerce sorriting
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

	/** Remove Showing results functionality site-wide */
	function woocommerce_result_count() {
	        return;
	}


add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );
/**
 * woo_hide_page_title
 *
 * Removes the "shop" title on the main shop page
 *
 * @access      public
 * @since       1.0
 * @return      void
*/
function woo_hide_page_title() {

	return false;

}



if ( ! function_exists( 'woocommerce_quantity_input' ) ) {
	function woocommerce_quantity_input( $args = array(), $product = null, $echo = true ) {

		if ( is_null( $product ) )
      $product = $GLOBALS['product'];

		$defaults = array(
		  'input_name'    => 'quantity',
		  'input_value'   => '1',
		  'max_value'     => apply_filters( 'woocommerce_quantity_input_max', '', $product ),
		  'min_value'     => apply_filters( 'woocommerce_quantity_input_min', '', $product ),
		  'step'          => apply_filters( 'woocommerce_quantity_input_step', '1', $product ),
		  'style'         => apply_filters( 'woocommerce_quantity_style', 'margin-bottom: 10px;', $product )
		);

		if ( ! empty( $defaults['min_value'] ) )
		$min = $defaults['min_value'];
		else $min = 1;

		if ( ! empty( $defaults['max_value'] ) )
		$max = $defaults['max_value'];
		else $max = 20;

		if ( ! empty( $defaults['step'] ) )
		$step = $defaults['step'];
		else $step = 1;

		$options = '';
		for ( $count = $min; $count <= $max; $count = $count+$step ) {
			$selected = $count === $args['input_value'] ? ' selected' : '';
			$options .= '<option value="' . $count . '"'.$selected.'>' . $count . '</option>';
		}

		$args = apply_filters( 'woocommerce_quantity_input_args', wp_parse_args( $args, $defaults ), $product );

		echo '<div class="quantity_select" style="' . $args['style'] . '"><select name="' . esc_attr( $args['input_name'] ) . '" title="' . _x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) . '" class="qty">' . $options . '</select></div>';

    ob_start();

    if ( $echo ) {
        echo ob_get_clean();
    } else {
        return ob_get_clean();
    }
	}
}
