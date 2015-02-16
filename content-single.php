<?php
/**
 * @package Brunch
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	

	<div class="entry-content">
	
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

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'brunch' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	
</article><!-- #post-## -->
