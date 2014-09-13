<?php
  /*
    Template Name: Directory Template
  */
?>


<?php get_header(); ?>
<!-- page-directory.php -->

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
				<?php endif; ?>
							</div><!-- deerpark-gallery-2 -->
						</section> <!-- end gallery-slider -->
					</div> <!-- main-content -->
				</div><!-- col-xs-12 -->
			</div><!-- main-content -->
		</div><!-- row -->
	</div><!-- container -->
	  <!-- member-directory-title-search section -->
	<section id="mem-dir-title-search" class="mem-dir-title-search" >
		<div class="fluid-container valign-fix-container-mem-dir">
		  <div class="container">
			<div class="col-xs-8">
			<h3><?php the_field('member-directory-title-search'); ?></h3>
			</div>
			<div class="col-xs-4 directory-search">
			<?php get_sidebar('sidebar-blog'); ?>
			</div>
		  </div>
		</div>
	</section>
	<section id="mem-dir-body" class="mem-dir-body">
	<div class="bg-fill container">
		<div class="row">
				<div class="col-md-3 directory-sidebar"></div>
				<div class="col-md-9 feat-business"></div>				
				<div class="col-md-9 all-business"></div>
				
		</div>
	</div>
	</section>
<?php get_footer(); ?>
