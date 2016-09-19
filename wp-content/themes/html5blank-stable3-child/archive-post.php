<?php

/*
Template Name: Archives
*/
?>
<?php get_header(); ?>




<?php $the_query = new WP_Query( 'posts_per_page=9' ); ?>


	<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>









<?php

endwhile;
		 if (function_exists(custom_pagination)) {
			 custom_pagination($custom_query->max_num_pages,"",$paged);
		 }
	 ?>

 <?php wp_reset_postdata(); ?>


	 <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>








<?php get_template_part('pagination'); ?>
<?php get_footer(); ?>
