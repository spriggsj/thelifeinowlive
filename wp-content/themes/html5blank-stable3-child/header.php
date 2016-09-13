<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php bloginfo('description'); ?>">

        <meta name="description" content="" />
    
    	<title>The Life I Now Live</title>

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
    	<?php wp_head(); ?>
        



    </head>

    <body>

        

        <nav class="navbar navbar-transparent navbar-static-top">
                    <div class="navbar navbar-static-top navbar-custom">
                    <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="container-fluid">
                            <div class="row primary">
                                <?php /* Primary navigation */
                                                    wp_nav_menu( array(
                                                    'menu' => 'primary',
                                                    'theme-location' => 'primary',
                                                    'depth' => 2,
                                                    // 'items_wrap' => my_nav_wrap(),
                                                    'menu_class' => 'nav navbar-right ',
                                                    'fallback-cb' => 'wp_bootstrap_navwalker::fallback',
                                                    //Process nav menu using our custom nav walker
                                                    'walker' => new wp_bootstrap_navwalker())
                                                    );

                                                ?>

                                <div class="col-xs-12 col-sm-6 col-md-5">
                                    <div class="row">
                                         <div class="col-xs-12 col-md-12">
                                            <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            </button>
                                        </div>

                                        <!-- Collect the nav links, forms, and other content for toggling -->
                                        <div class="collapse navbar-collapse navHeaderCollapse">
                                            <div class="col-xs-12 main-nav">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end div class collapse navbar-collapse navHeaderCollapse -->
                            </div>
                        </div><!--end div class container-fluid-->
                    </div><!--end div class navbar  navbar-static-top navbar-custom-->
                </nav>

            
