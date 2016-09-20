
<footer>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-4 contact__info">
        <h1>Contact Info</h1>
        <li><a href="#">Phone Number: (559)333-2325</a></li>
        <li><a href="#">Email: living@gmail.com</a></li>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-4 social__butterfly">
        <h1>Social Butterfly</h1>
          <div class="col-md-2 col-sm-3 xs-5">
            <li><a href="https://twitter.com/thelifeinowlive" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/twitter.svg" alt="" /></a></li>
            <li><a href="https://www.facebook.com/profile.php?id=100010741058990&fref=ts" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/facebook.svg" alt="" /></a></li>
          </div>
          <div class="col-md-3 col-sm-4 col-xs-8">
            <li><a href="https://www.pinterest.com/thelifeinowlive/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/pinterest.svg" alt="" /></a></li>
            <li><a href="https://www.instagram.com/thelifeinowlive/?hl=en" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/instagram.svg" alt="" /></a></li>
          </div>
      </div>
      <div class="col-md-3 col-sm-3 col-xs-3 Recent__Post">
        <ul>

        <h1>Recent Post</h1>

  <?php $the_query = new WP_Query( 'posts_per_page=3' ); ?>


  <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>


  <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>





  <?php
  endwhile;
  wp_reset_postdata();
  ?>
  </ul>

      </div>
    </div>
      <hr>
      <div class="row">
        <div class="col-md-6 col-sm-6 the__life">
          <h1>the life I now live</h1>
        </div>
        <div class="col-md-6 col-sm-6 copyright">
          <p>
              &copy; <?php echo date('Y'); ?> All Rights Reserved <?php _e(); ?>
          </p>
        </div>
      </div>
  </div>





</footer>

<?php wp_footer(); ?>
