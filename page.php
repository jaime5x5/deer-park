<?php get_header(); ?>
<!-- page.php -->
<div class="fluid-container post-page">
 
<?php
if (has_post_thumbnail()) {
?>
<style type="text/css">
  .container.main-content { margin-top: -1px; } 
  .page-headline h1{ margin-top: -100px; color:#ffffff; font-weight: 300; font-size: 48px; position: relative; }
  .main-content { display: inline-block; width: 100%; margin-top: -2px;}
  .wga-full-background { background:url("<?php echo get_template_directory_uri() ?>/images/mission.jpg"); color: #fff;}
 /* .page-headline { margin:0; }*/
</style>
<?php
  echo '<div class="featured-image">';
    the_post_thumbnail();
  echo '</div>'; // end featured-image
  echo '</div>'; // End fluid-container
  echo '<div class="fluid-container main-content post">';
  echo '<div class="row">';

 if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            echo '<div class="page-headline col-xs-6 col-xs-offset-6">';
            echo '<h1>';
            the_title(); 
            echo '</h1>';
            echo '</div>'; // end page-headline
            echo '</div>'; // End row
            echo '<div class="row">';
            the_content();
            echo '</div>'; 
 endwhile; else: 
            //echo '<div class="page-headline">';
            //echo '<h1>Oh no! Something didn\'t load from our Database!</h1>';
            //echo '</div>';
 endif;

 
 echo '</div>'; // End main-content container

} elseif (have_posts()) { 
?>
<style type="text/css"> 
  .page-headline h1{ margin-top: 150px; font-weight: 300; font-size: 48px; } 
</style>

<?php
echo '<div class="fluid-container main-content">';

 if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            echo '<div class="row">';
            echo '<div class="page-headline col-xs-6">';
            echo '<h1>';
            the_title(); 
            echo '</h1>';
            echo '</div>'; // end page-headline
            echo '</div>';
            the_content(); 
 endwhile; else: 

 endif;
 }
	 echo'<section class="testpage">';
		echo '<div class="deerpark-gallery-2">';
?>
<?php $image = wp_get_attachment_image_src(get_field('imagetest'), 'full'); ?>

<img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(get_field('imagetest')) ?>" />

<?php if( have_rows('repeatertest') ): ?>

	<ul class="slides">

	<?php while( have_rows('repeatertest') ): the_row(); 

		// vars
		$image = get_sub_field('image');
		$content = get_sub_field('content');
		$link = get_sub_field('link');

		?>

		<li class="slide">

			<?php if( $link ): ?>
				<a href="<?php echo $link; ?>">
			<?php endif; ?>

				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />

			<?php if( $link ): ?>
				</a>
			<?php endif; ?>
			<p>
			<?php echo $content; ?>
			</p>
		</li>

	<?php endwhile; ?>

	</ul>

<?php endif; ?>
<?php
// always good to see exactly what you are working with
		echo '</div>';
	 echo '</section>'; 
 echo '</div>'; // End main-content container
?>



<?php get_footer(); ?>
