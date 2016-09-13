<?php /* Template Name: home Page Template */ get_header(); ?>
	
  <main role="main">
    <!-- section -->
    <section>

		

      <?php include 'content.php'; ?>
      <!--or content for original-->




      <?php get_template_part('pagination'); ?>

    </section>
    <!-- /section -->
  </main>



<?php get_footer(); ?>