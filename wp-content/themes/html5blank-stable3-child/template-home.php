<?php /* Template Name: home Page Template */ get_header(); ?>

  <main role="main">
    <!-- section -->

    <section class="self">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 self__first__col">
            <h1>The Life I Live</h1>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Read More</p>
            <h1>The Life I Live</h1>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Read More</p>
          </div>
          <div class="col-md-4 self__header">
            <h1>self</h1>
          </div>
          <div class="col-md-4 self__second__col">
            <h1>The Life I Live</h1>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Read More</p>
            <h1>The Life I Live</h1>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Read More</p>
          </div>
        </div>
      </div>
    </section>

    <section>



      <?php include 'content.php'; ?>
      <!--or content for original-->




      <?php get_template_part('pagination'); ?>

    </section>
    <!-- /section -->
  </main>
<?php get_footer() ?>
