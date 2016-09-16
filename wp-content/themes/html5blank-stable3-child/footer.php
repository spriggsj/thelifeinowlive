<footer>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <li><a href="#">Contact Info</a></li>
        <li><a href="#">(559)333-2325</a></li>
        <li><a href="#">living@gmail.com</a></li>
      </div>
      <div class="col-md-4">
        <li>Social Butterfly</li>
          <div class="col-md-2">
            <li><a href="https://twitter.com/thelifeinowlive"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/twitter.svg" alt="" /></a></li>
            <li><a href="https://www.facebook.com/profile.php?id=100010741058990&fref=ts"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/facebook.svg" alt="" /></a></li>
          </div>
          <div class="col-md-2">
            <li><a href="https://www.pinterest.com/thelifeinowlive/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/pinterest.svg" alt="" /></a></li>
            <li><a href="https://www.instagram.com/thelifeinowlive/?hl=en"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/instagram.svg" alt="" /></a></li>
          </div>
      </div>
      <div class="col-md-4">
        <ul>

  <?php $the_query = new WP_Query( 'posts_per_page=3' ); ?>


  <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>


  <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>


  <li><?php the_excerpt(__('(more…)')); ?></li>


  <?php
  endwhile;
  wp_reset_postdata();
  ?>
  </ul>

      </div>
    </div>
  </div>

</footer>
