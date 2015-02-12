<?php
/**
 * The template for displaying all single posts.
 *
 * @package Brunch
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>



<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8">
		<div class="post_header">
        <h1><?php the_title(); ?></h1>
      </div>
			<?php get_template_part( 'content', 'single' ); ?>
		</div>
		<div class="col-xs-12 col-xs-4">
			<?php get_sidebar(); ?>
</div>
			
			</div>
			</div>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>