<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="<?php bloginfo('description'); ?>">


        <meta name="description" content="" />

    	<title>The Life I Now Live</title>


        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


    	<?php wp_head(); ?>


		<meta name="google-site-verification" content="kgQiUkQVJ6es6NlZfJrGMOfqJFYPJqOgQnhiE_0TE1I" />

      <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-84597161-1', 'auto');
  ga('send', 'pageview');

</script>

    </head>





    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


          <?php /* Primary navigation */
                              wp_nav_menu( array(
                              'menu' => 'primary',
                              'theme-location' => 'primary',
                              'items_wrap' => my_nav_wrap(),
                              'depth' => 2,
                              // 'items_wrap' => my_nav_wrap(),
                              'menu_class' => 'nav navbar-nav navbar-right',
                              'fallback-cb' => 'wp_bootstrap_navwalker::fallback',
                              //Process nav menu using our custom nav walker
                              'walker' => new wp_bootstrap_navwalker())
                            );

                          ?>



      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

      <header class="<?php if (is_front_page()){echo 'home';} else { echo "page"; }?>">
            <div class="hero__image">
              <div class="brush__stroke" id="startchange">
                <h1>the life I now live</h1>
              </div>
              <div class="tag__line">
                <p>Empowering others to discover emotional and spiritual freedom through reclaiming their physical health</p>
              </div>
            </div>

          </header>
