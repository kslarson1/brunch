<?php
/**
 * Template Name: Home Page
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
			<h5>The best brunchers in Denver. Check out our reviews and join the club.</h5>
			<br>
			<br>
				<i class="fa fa-3x fa-chevron-down"></i>
		  </div>
		</div>
	</div>
</div>

<div class="break">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<hr>
					<h1>Latest Brunches</h1>
				<hr>
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
  <div class="custom_column_whole">
  <a href="<?php echo get_permalink(); ?>">
  <div class="brunch_blog_post" style="background-image: url(<?php the_field('small_display_image'); ?>);">
    <div class="black_background_top">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
  <div class="black_background bottom">
      <h3><?php the_field('small_display_teaser'); ?></h3>
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
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1><?php the_field('quote', 8); ?></h1>
				<p>-<?php the_field('quoter', 8); ?></p>
			</div>
		</div>
	</div>
</div>

<div id="about">
<div class="container">
	<div class="row">
		<div class="col-xs-12 center">
			<p><?php the_field('about_text', 8); ?></p>
		</div>
	</div>
</div>
</div>

<div id="contact" style="background-image: url(<?php the_field('about_bg_image', 8); ?>)">
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="contact_box center">
				<h3>Wanna join us or give us free brunch? Let's chat.</h3>
				<?php echo do_shortcode('[contact-form-7 id="40" title="Contact Form"]'); ?>
			</div>
		</div>
	</div>
</div>
</div>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
