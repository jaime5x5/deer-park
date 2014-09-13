<?php
  /*
    Template Name: Full Width Template
  */
?>


<?php get_header(); ?>
<!-- page-full-width.php -->

<?php
if (has_post_thumbnail()) {
?>
    <div class="container">
		<div class="row">       
			<div class="col-xs-12">
				<div class="page-header">
<?php
echo '<div class="fluid-container main-content">';

 if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            the_content();
		endwhile;
		endif;
} 

if (have_posts()) { 
	 echo'<section class="gallery-slider">';
		echo '<div class="deerpark-gallery-2">';

$images = get_field('gallery-directory');
}
if( $images ): ?>
    <div id="slider" class="flexslider">
        <ul class="slides">
            <?php foreach( $images as $image ): ?>
                <li>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    <p><?php echo $image['caption']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php  ?>
							</div><!-- deerpark-gallery-2 -->
						</section> <!-- end gallery-slider -->
					</div> <!-- main-content -->
				</div><!-- col-xs-12 -->
			</div><!-- main-content -->
		</div><!-- row -->
	</div><!-- container -->
<?php endif; ?>
<?php get_sidebar('sidebar-blog'); ?>
<?php get_footer(); ?>
