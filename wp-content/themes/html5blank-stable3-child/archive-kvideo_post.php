<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<div class="container archive-post">

			<h1><?php _e( 'All Katies Videos', 'html5blank' ); ?></h1>
			<?php $loop = new WP_Query( array( 'post_type' => 'kvideo_posts', 'posts_per_page' => 10 ) ); ?>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						
				<?php	echo '<div class="video-img">' ;
							
							the_content();
						echo '</div>'; 
						endwhile; endif; ?>

			
			<?php get_template_part('pagination'); ?>

		</div>
		<!-- /section -->
	</main>



	

<?php get_footer(); ?>