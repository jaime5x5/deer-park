<?php get_header(); ?>
<!-- page.php -->
<div class="fluid-container">
 
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
  echo '<div class="fluid-container main-content">';
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

} else {
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
            //echo '<div class="page-headline">';
            //echo '<h1>Oh no! Something didn\'t load from our Database!</h1>';
            //echo '</div>';
 endif;



<?php get_footer(); ?>
