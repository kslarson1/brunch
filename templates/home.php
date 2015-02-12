<?php
/**
 * Template Name: Home
 *
 * 
 *
 * @package Brunch
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

<div id="home">
<div class="container">
		<div class="row">
		  <div class="col-xs-12">
			<h1>Brunch Billionaires</h1>
			<p>We're the best</p>
		  </div>
		</div>
	</div>
</div>

<div class="break">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<h1>Latest Brunches</h1>
			</div>
		</div>
	</div>
</div>

<!-- start of =blogroll -->
<div class="blog_area">
<div class="container-fluid">
  <div class="row">
<!-- START OF CUSTOM POST FOR BLOG -->
<!-- // The Arguments -->
<?php $args = array( 
			 'post_type' => 'brunch_review', 
			 'posts_per_page' => 3
			 );

// <!-- START LOOP -->
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>


  <!-- LOOP CONTENT BEGINS-->
  <div class="custom_column_third">
  <a href="<?php echo get_permalink(); ?>">
  <div class="travel_blog_post" style="background-image: url(<?php the_field('small_display_image'); ?>);">
    <div class="black_background_top">
      <h4><?php the_title(); ?></h4>
    </div>
    <div class="black_background bottom">
      <p><?php the_field('small_display_teaser'); ?></p>
    </div>
  </div>
  </a>
  </div>

<?php endwhile; ?>
<!-- END OF CUSTOM POST FOR BLOG -->
<!-- END OF BLOG AREA -->
  </div>  <!-- END OF ROW -->
</div> <!-- END OF CONTAINER -->
</div>  <!-- END OF blog_area -->
<!-- end of =blogroll -->

<div class="break2">
	<container>
		<div class="row">
			<div class="col-xs-12">
				<h3>quote about stuff</h3>
			</div>
		</div>
	</container>
</div>

<div id="about">
<div class="container">
	<div class="row">
		<div class="col-xs-12 center">
			<h1>The Billionaires</h1>
			  <img class="image_big" src="<?php the_field('about_image'); ?>">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum consequatur cum veniam maxime ratione laudantium est quam in! Accusamus earum ex et deserunt beatae reiciendis. Nobis, sunt vero odio dicta!</p>
		</div>
	</div>
</div>
</div>

<div id="contact">
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-sm-offset-3">
			<?php echo do_shortcode('[contact-form-7 id="6" title="Contact form 1"]'); ?>
		</div>
	</div>
</div>
</div>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
