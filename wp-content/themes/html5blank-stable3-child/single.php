<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section>
	<div id="startchange"></div>
	<div class="container">
		<div class="row">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- post thumbnail -->
			<div class="col-md-12 k-post-single img-responsive">
					<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(); // Fullsize image for the single post ?>
				</a>
			<?php endif; ?>
		</div>
		</div>

			<!-- /post thumbnail -->

			<!-- post title -->
			<div class="col-md-12 k-post-title">
				<h1>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h1>
			</div>
			<!-- /post title -->


			<div class="col-md-12 k-post-content">
			<?php the_content(); // Dynamic Content ?>
			</div>

			<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
			<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __(), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
			<!-- /post details -->

			<?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

			

			<!-- post details -->



			<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

			<?php comments_template(); ?>


		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>
		</div>
	</div>



		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>


<?php get_footer(); ?>
