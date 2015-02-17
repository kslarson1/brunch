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
<a href="<?php echo get_permalink(); ?>">
<div class="container-fluid">
 	<div class="row">
    <div class="bg_left">
		<div class="container-fluid">
			
					<h2 class="center"><?php the_field('brunch_name'); ?></h2>
						<iframe width="100%" height="280" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.ca/maps?center=<?php the_field('brunch_map'); ?>&q=<?php the_field('brunch_map'); ?>&zoom=6&size=300x300&output=embed&iwloc=near"></iframe><br /> <!-- =Google maps-->
				
		</div>	
   	</div>
   		<div class="bg_right" style="background-image: url(<?php the_field('small_display_image'); ?>);">
  			<div class="black_background_top">
  			</div>
  		</div>
  	</div>
</div>
<div class="container-fluid">
	<div class="row">
  		<div class="bottom">
      		<h3><?php the_field('small_display_teaser'); ?></h3>
  		</div>
  	</div>
</div>
</a>
 

<!-- <div class="black_background_top"> -->
      <!-- <h1><?php the_title(); ?></h1> -->
    <!-- </div> -->


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
