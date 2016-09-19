<?php

/*
Template Name: Archives
*/
?>
<?php get_header(); ?>

<?php

  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

  $custom_args = array(
      'post_type' => 'post',
      'posts_per_page' => 9,
      'paged' => $paged
    );
    ?>
    <section class="blog">
      <div class="container-fluid">
        <div class="row">
    <?php

  $custom_query = new WP_Query( $custom_args ); ?>

  <?php if ( $custom_query->have_posts() ) : ?>

    <!-- the loop -->
    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
      <div class="col-md-4">
      	<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
      	<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>

      	<p><?php the_excerpt();?></p>
      </div>
    <?php endwhile; ?>
    <!-- end of the loop -->
  </div>
</div>

    <!-- pagination here -->
    <?php
      if (function_exists(custom_pagination)) {
        custom_pagination($custom_query->max_num_pages,"",$paged);
      }
    ?>
  </section>

  <?php wp_reset_postdata(); ?>

  <?php else:  ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>
<?php get_footer();?>
