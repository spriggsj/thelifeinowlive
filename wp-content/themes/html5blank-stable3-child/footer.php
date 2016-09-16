
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

<!-- footer -->
<footer class="footer" role="contentinfo">
  <div class="container text-center">
<hr>
<div class="row">
<div class="col-lg-12">
<div class="col-md-4">
  <ul class="nav-stacked" style="list-style:none;">
    <li><a href="#">Contact Info</a></li>
    <li><a href="#">(559)333-2325</a></li>
    <li><a href="#">living@gmail.com</a></li>
  </ul>
</div>
<div class="col-md-4">
  <ul class="nav-stacked" style="list-style:none;">
    <!-- <li>Social Butterfly</li> -->
    <div>
			<a href="https://twitter.com/thelifeinowlive"><i class="fa fa-twitter fa-4x" aria-hidden="true"></i></a>
      <a href="https://www.facebook.com/profile.php?id=100010741058990&fref=ts"><i class="fa fa-facebook fa-4x" aria-hidden="true"></i></a>
    </div>
    <div>
      <a href="https://www.pinterest.com/thelifeinowlive/"><i class="fa fa-pinterest fa-4x" aria-hidden="true"></i></a>
      <a href="https://www.instagram.com/thelifeinowlive/?hl=en"><i class="fa fa-instagram fa-4x" aria-hidden="true"></i></a>
    </div>
    <!-- <li><a href="#">Logo's go here</a></li>
    <li><a href="#">Logo's go here</a></li>
    <li><a href="#">Logo's go here</a></li>
    <li><a href="#">Logo's go here</a></li> -->
  </ul>
</div>
<div class="col-md-4">
  <ul class="nav-stacked" style="list-style:none;">
    <li><a href="#">Recent Blog</a></li>
    <li><a href="#">How I changed My Life</a></li>
    <li><a href="#">My Healthy Tips</a></li>
    <li><a href="#">The Life I now live</a></li>
  </ul>
</div>
</div>
</div>
<hr>
<div class="row">
  <div class="col-lg-12">
      <ul class="nav-justified" style="list-style:none;">
          <li><a href="/">The Life I Now Live</a></li>
          <!-- <li><a href="#">Terms of Service</a></li> -->
          <li><!-- copyright -->
          <p class="copyright">

            <!-- <a href="//wordpress.org" title="WordPress">WordPress</a> &amp; <a href="//html5blank.com" title="HTML5 Blank">HTML5 Blank</a>. -->
          </p>
          <!-- /copyright --></li>
      </ul>
  </div>
</div>
</div>


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
