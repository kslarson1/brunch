<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Brunch
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

<div class="container">
<div class="brunch_post">
	<div class="row">
		<div class="col-xs-12 col-sm-8">
		<div class="post_header">
        	<a href="<?php echo get_permalink(); ?>">
        		<h1><?php the_title(); ?></h1>
        	</a>
      	</div>
			<?php get_template_part( 'content', 'single' ); ?>
			<?php if(is_single()) comments_template(); ?>
		</div>
		<div class="col-xs-12 col-xs-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
</div>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
