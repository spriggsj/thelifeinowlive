<?php get_header(); ?>

	<div class="container">
		<div class="row main-content">
			<div class="Video">

				<?php $loop = new WP_Query( array( 'post_type' => 'kvideo_posts', 'posts_per_page' => 10 ) ); ?>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						
				<?php	echo '<div class="video-img">' ;
							
							the_content();
						echo '</div>'; 
						endwhile; endif; ?>

						

				
				
			

				

			</div>
			
		</div>
	</div>

<?php get_footer(); ?>
