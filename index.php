<?php get_header(); ?>
<!-- index.php -->
<div class="fluid-container">

<?php
if (has_post_thumbnail()) {
  echo '<div class="featured-image fi-posts">';
    the_post_thumbnail();
  echo '</div>';
  echo '</div>'; // End fluid-container
  echo '<div class="container main-content posts">';

 if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            echo '<div class="page-header posts">';
            echo '<h1>';
            the_title(); 
            echo '</h1>';
            echo '</div>';
            the_content(); 
 endwhile; else: 
            echo '<div class="page-header">';
            echo '<h1>Oh no! Something didn\'t load from our Database!</h1>';
            echo '</div>';
 endif;



} elseif (has_post_thumbnail()){
?>
<style type="text/css"> 
  .page-header h1{ margin-top: 100px; }
</style>

<?php
echo '<div class="container main-content">';
if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            echo '<div class="page-header">';
            echo '<h1>';
            the_title(); 
            echo '</h1>';
            echo '</div>';
            the_content(); 
 endwhile; else: 
            echo '<div class="page-header">';
            echo '<h1>Oh no! Something didn\'t load from our Database!</h1>';
            echo '</div>';
 endif;

}else {


if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            the_content(); 
			get_template_part('content', 'gallery');
 endwhile; else: 
            echo '<div class="page-header">';
            echo '<h1>Oh no! Something didn\'t load from our Database!</h1>';
            echo '</div>';
 endif;

}
echo '</div> <!-- End fluid-container -->';
 // End else

?>



<?php get_footer(); ?>
