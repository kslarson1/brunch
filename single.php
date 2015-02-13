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


<!-- start of ratings -->
	<div class="row">
		<div class="col-xs-12 center">
			
<!-- begin gold repeater -->
<?php
// check if the repeater field has rows of data
if( have_rows('good_rating') ):
 	// loop through the rows of data
    while ( have_rows('good_rating') ) : the_row(); ?>
        <!-- // display a sub field value -->
     
        <i class="gold fa fa-2x <?php the_sub_field('good'); ?>"></i>

    <?php endwhile;
else :
    // no rows found
endif;
?>
<!-- end gold repeater -->

<!-- begin gray repeater -->
<?php
// check if the repeater field has rows of data
if( have_rows('bad_rating') ):
 	// loop through the rows of data
    while ( have_rows('bad_rating') ) : the_row(); ?>
        <!-- // display a sub field value -->
     
        <i class="gray fa fa-2x <?php the_sub_field('bad'); ?>"></i>

    <?php endwhile;
else :
    // no rows found
endif;
?>
<!-- end repeater -->

		</div>
	</div>
	<br>
<!-- end of ratings -->
      	
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
