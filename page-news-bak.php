<?php $options = get_option('plugin_options'); ?>
<?php
  /*
    Template Name: News Page Template
  */
?>
<?php get_header(); ?>
<!-- page-news.php -->
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

				$images = get_field('news-gallery');
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
	<section id="news-sec-title" class="news-sec-title" >

			<div class="col-xs-12 news-cont-title">
			<h3><?php the_field('news-body-title'); ?></h3>
			</div>

	</section>
	<div class="fluid-container">
	  	<div class="row main">
	    	<section class="col-xs-9 news-content">
	    	<div class="news-content-wrapper" id="news-masonry-wrapper">
			<?php

					/*
					*  Loop through post objects (assuming this is a multi-select field) ( setup postdata )
					*  Using this method, you can use all the normal WP functions as the $post object is temporarily initialized within the loop
					*  Read more: http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
					*/

					$post_objects = get_field('news-body');

					if( $post_objects ): ?>
					    <ul>
					    <?php 
					    $ctr=0; 
					    $args = array( 'posts_per_page' => 5 );

					    foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
					        <?php if($ctr>=5) break; else $ctr++;
					        var_dump($post);
					        ?>
					        <li>
			                  	<div class="news-bg">
					                <div class="news-container">
						                <div class="news-featured-image">
					                  	<a href="<?php the_permalink(); ?>">
					                  	<?php the_post_thumbnail( $post_id, 'thumbnail' )?>
					                  	</a>
			                  			</div>
						                  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						                  <p><em><?php the_author(); ?>&nbsp;|&nbsp;<?php echo the_time( 'l, F jS, Y' ); ?></em></p>
						                  <?php $ex= apply_filters('the_content', $post->post_content); ?>
						                  <?php echo substr($ex,0,200);?>
						                  <?php echo '<p>'.excerpt().'</p>'; ?>
						                  <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a><span class="social-reveal">&nbsp;&nbsp;&#43;Share </span>
					                <?php echo sharing_display(); ?>
						            </div>
						        </div>
					        </li>
					    <?php endforeach; ?>
					    </ul>
					    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
					endif;

			?>
			</div>
	    	</section>
	    	<section class="col-xs-3 news-sb">     
			      <?php get_sidebar( 'blog' ); ?>
			</section>
	  	</div>
	</div>        

<?php get_footer(); ?>

