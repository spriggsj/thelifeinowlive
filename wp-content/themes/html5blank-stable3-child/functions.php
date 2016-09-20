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


/* woocomerce */

/* removes desctiption and review tabs */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;

}

/* end remove */



/* removes the bread crumb */

add_action( 'init', 'jk_remove_wc_breadcrumbs' );
function jk_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

/* end of remove bread crumb */


function woocommerce_template_product_description() {
woocommerce_get_template( 'single-product/tabs/description.php' );
}
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_product_description', 20 );




/* end of woocoomerce */

/* pagantatnion for blog archive page */

function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   *
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }


  /**
   * We construct the pagination arguments to enter into our paginate_links
   * function.
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }

}

/* end of pagantatnion for blog archive page */




/* cart static li function and cart update function */

function my_nav_wrap() {
    $wrap  = '<ul id="%1$s" class="%2$s">';
    $wrap .= '%3$s';
    $wrap .= '<li>';
    $wrap .= '<a class="cart-contents" href="' . WC()->cart->get_cart_url() . '">';
		$wrap .= '<img src="' . get_stylesheet_directory_uri() . '/img/cart.svg"/>';
		$wrap .= '<span class="circle__price">';
    $wrap .= WC()->cart->get_cart_contents_count();
		$wrap .= '</span>';
    $wrap .= '</a>';
    $wrap .= '</li>';
    $wrap .= '</ul>';

  return $wrap;
}





// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
	<li>
    <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
      <?php echo '<img src="' . get_stylesheet_directory_uri() . '/img/cart.svg"/>';?>
      <?php echo '<span class="circle__price">' . sprintf (_n( '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ) . '</span>'; ?>
    </a>
	</li>



	<?php

	$fragments['a.cart-contents'] = ob_get_clean();

	return $fragments;
}

/* end of cart function */
