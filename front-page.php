<?php $options = get_option('plugin_options'); ?>
<?php
  /*
    Template Name: Front Page Template
  */
?>
<?php get_header(); ?>
<!-- page-front-page.php -->
    <!-- Landing Section Section -->
    <section class="landing" id="home">		
			<div class="row">
				<div class="span12 front-image">
					<?php if( get_field('front_page_image') ): ?>

						<img src="<?php the_field('front_page_image'); ?>" />

					<?php endif; ?>
				</div>
				<div class="fp-dpcc-logo"></div>
			</div>
		</div>
      <!-- <h1 class="hide">&nbsp;</h1> -->
    </section>
    <!-- Content for landing Section should only contain the landing page logo. -->

  <!-- Misison Statment Section -->
  <div class="fluid-container">
		<div class="row">
			<div class="col-xs-3">
				<div class="wrapper">
					<div id="weatherList" class="weatherList"></div>
					<div id="weatherReport" class="weatherFeed"></div>
				</div>
			</div>
		</div>
	</div>
	
  <section id="mission" class="mission">
        <div class="fluid-container valign-fix-container">		
          <div class="container">
          		<div class="row">
					<div class="col-xs-12">
            			<h3><?php the_field('f_p_mission_stat'); ?></h3>
            		</div>
            	</div>
          </div>
        </div>
  </section>

<?php wp_reset_query(); ?>
  <!-- About Section --> 
  <section class="about" id="about">
    <div class="fluid-container">
      <div class="row news-feed-hotfix">
			<div class="col-xs-5 col-xs-offset-1 about-section">
				<?php
				// Create second WordPress loop
				$page_content = new WP_Query( 'page_id=72' );

				while( $page_content->have_posts() ) : $page_content->the_post();
					// Your content output goes here
					echo "<h2>What&#8217;s happening around town?</h2>";
					$page_contents = get_page($page->ID);
					echo do_shortcode('[ai1ec view="agenda"]');
				endwhile;
				// Don't forget to reset the post data!
				wp_reset_postdata(); ?>
			</div>
			<div class="col-xs-5 news-feed-background">
				<article class="news-feed">
				  <?php
				  	$args = array( 'posts_per_page' => 1, 'category_name' => 'featured', );					
				  	$thumbnails = get_posts( $args );
					foreach ( $thumbnails as $thumbnail ) {
						if ( has_post_thumbnail( $thumbnail->ID ) ) {
							echo '<a href="' . get_permalink( $thumbnail->ID ) . '" title="' . esc_attr( $thumbnail->post_title ) . '">';
							echo get_the_post_thumbnail( $thumbnail->ID, 'medium' );
							echo '</a>';
						}
						//endif;
					}					  
					//endforeach;
					wp_reset_postdata();

					$lastposts = get_posts( $args );
					//var_dump($lastposts);
					foreach ( $lastposts as $post ) :
					//var_dump($post);
					  setup_postdata( $post ); 
					endforeach;
					?>
					  <div id="fp-news-caption" class="fp-news-caption">
					  <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>				  
					  <?php echo '<p>'.excerpt(15).'</p>'; ?>
					  </div>
					<?php wp_reset_postdata(); ?>
				</article>
			</div>
      </div>
    </div>
  </section>
  <section class="events-heading" id="events-heading">
	<div class="container">
        <div class="row">
			<div class="col-md-12 col-md-offset-1 deerpark-seas-ads">
				<h3><?php the_field('f_p_seas_stat'); ?></h3>
			<?php
			    if( have_rows('f_p_seas_att_cont') ):
	                while ( have_rows('f_p_seas_att_cont') ) : the_row();
	            		echo '<div class="col-md-5  sea_att_content_col_1">';
	            		if( get_row_layout() == 'seasonal_attractions_title' ): 
                            the_sub_field('sea_att_content_col_1');
                          echo '</div>';
                        endif;
                        if( get_row_layout() == 'seasonal_attractions_title' ): 
                          echo '<div class="col-md-5 sea_att_content_col_2">';
                            the_sub_field('sea_att_content_col_2');
                          echo '</div>';
                        endif;
                    endwhile;
					
	                else :
	                  // no layouts found

	                endif;
	                ?>
			</div>
			<div class="boxes">			  
				<div class="two box-1">
			    	<?php echo adrotate_group(1); ?>
			  	</div> 
				<div class="one box">
				   	<?php echo adrotate_group(2); ?>
				</div> 
				<div class="three box">
				   	<?php echo adrotate_group(2); ?>
				</div> 
			    <div class="four box">
			    	<?php echo adrotate_group(2); ?>
			    </div> 
			</div>
			<div class="boxes">
			    <div class="one box">
			   		<?php echo adrotate_group(2); ?>
			    </div> 
			    <div class="three box">
			    	<?php echo adrotate_group(2); ?>
			    </div> 
			    <div class="four box">
			    	<?php echo adrotate_group(2); ?>
			    </div> 
			</div>
			<script src="wp-content/themes/deer-park/js/gsap/jquery.gsap.min.js">
			function equalHeight(group) {
			   tallest = 0;
			   group.each(function() {
			      thisHeight = $(this).height();
			      if(thisHeight > tallest) {
			         tallest = thisHeight;
			      }
			   });
			   group.height(tallest);
			}

			$(document).ready(function() {
			   equalHeight($(".box"));
			});

			$(window).resize(function() {
			   $('.box').css('height','auto');
			   equalHeight($(".box"));
			});
			</script>
		</div>
	</div>
  </section>
<?php get_footer(); ?>
