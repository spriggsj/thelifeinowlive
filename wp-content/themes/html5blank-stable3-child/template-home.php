<?php /* Template Name: home Page Template */ get_header(); ?>

  <main role="main">
    <!-- section -->





      <?php echo do_shortcode('[posts_items]');?>

      <section class="sanity">
        <div class="sanity__header">
          <h1>sanity</h1>
        </div>

        <?php echo do_shortcode('[featured_products per_page="3" columns="3"]');?>
      </section>





      <section class="sparkle">
        <div class="sparkle__brushstroke">
              <h1>sparkle</h1>
        </div>
        <?php echo do_shortcode('[custom-loop]'); ?>
        <!--or content for original-->
      </section>






    <!-- /section -->
  </main>
<?php get_footer() ?>
