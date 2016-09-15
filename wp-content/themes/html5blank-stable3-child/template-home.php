<?php /* Template Name: home Page Template */ get_header(); ?>

  <main role="main">
    <!-- section -->



    <section>

      <?php echo do_shortcode('[posts_items]');?>

      <section class="sanity">
        <div class="sanity__header">
          <h1>sanity</h1>
        </div>

        <?php echo do_shortcode('[featured_products per_page="3" columns="3"]');?>
      </section>






      <?php include 'content.php'; ?>
      <!--or content for original-->




      <?php get_template_part('pagination'); ?>

    </section>
    <!-- /section -->
  </main>
<?php get_footer() ?>
