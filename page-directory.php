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
		  	<div class="row ">
				<div class="col-xs-8">
				<h3><?php the_field('member-directory-title-search'); ?></h3>
				</div>
				<div class="col-xs-4 directory-search">
				<?php get_sidebar('sidebar-blog'); ?>
				</div>
			</div>
		  </div>
		</div>
	</section>
	<section id="mem-dir-body" class="mem-dir-body">
	<div class="fluid-container ">		
		<div class="row ">			
			<article class="bg-fill  main">
				<div class="col-md-12  feat-business">
					<div class='col-md-8 col-md-offset-1 dir-mem-state'>Deer Park has over 50 member businesses that serve the Deer Park area. Use this directory to connect with these great local resources!</div>
					<div class="col-md-3 directory-sidebar">
						<h3>Categories:</h3>
				            <ul>
				              <li><a href="http://localhost/wordpress/tag/agriculture/" title="Agriculture" class="agriculture">Agriculture</a></li>
				              <li><a href="http://localhost/wordpress/tag/automotive/" title="Automotive" class="automotive">Automotive</a></li>
				              <li><a href="http://localhost/wordpress/tag/building-construction/" title="Building & Construction" class="building-construction">Building & Construction</a></li>
				              <li><a href="http://localhost/wordpress/tag/business-services/" title="Business Services" class="business-services">Business Services</a></li>
				              <li><a href="http://localhost/wordpress/tag/community-services/" title="Community Services" class="community-services">Community Services</a></li>
				              <li><a href="http://localhost/wordpress/tag/education/" title="Education" class="education">Education</a></li>
				              <li><a href="http://localhost/wordpress/tag/emergency-services/" title="Emergency Services" class="emergency-services">Emergency Services</a></li>
				              <li><a href="http://localhost/wordpress/tag/entertainment/" title="Entertainment" class="entertainment">Entertainment</a></li>
				              <li><a href="http://localhost/wordpress/tag/finance/" title="Finance" class="finance">Finance</a></li>
				              <li><a href="http://localhost/wordpress/tag/food-dining/" title="Food & Dining" class="food-dining">Food & Dining</a></li>
				              <li><a href="http://localhost/wordpress/tag/government/" title="Government" class="government">Government</a></li>
				              <li><a href="http://localhost/wordpress/tag/health-medical/" title="Health & Medical" class="health-medical">Health & Medical</a></li>
				              <li><a href="http://localhost/wordpress/tag/legal-services/" title="Legal Services" class="legal-services">Legal Services</a></li>
				              <li><a href="http://localhost/wordpress/tag/manufacturing-industrial/" title="Manufacturing & Industrial" class="manufacturing-industrial">Manufacturing & Industrial</a></li>
				              <li><a href="http://localhost/wordpress/tag/news-media/" title="News & Media" class="news-media">News & Media</a></li>
				              <li><a href="http://localhost/wordpress/tag/office-printing/" title="Office & Printing" class="office-printing">Office & Printing</a></li>
				              <li><a href="http://localhost/wordpress/tag/organizations-clubs/" title="Organizations & Clubs" class="organizations-clubs">Organizations & Clubs</a></li>
				              <li><a href="http://localhost/wordpress/tag/other-services/" title="Other Services" class="other-services">Other Services</a></li>
				              <li><a href="http://localhost/wordpress/tag/personal-services/" title="Personal Services" class="personal-services">Personal Services</a></li>
				              <li><a href="http://localhost/wordpress/tag/professional-services/" title="Professional Services" class="professional-services">Professional Services</a></li>
				              <li><a href="http://localhost/wordpress/tag/real-estate/" title="Real Estate" class="real-estate">Real Estate</a></li>
				              <li><a href="http://localhost/wordpress/tag/shopping/" title="Shopping" class="shopping">Shopping</a></li>
				              <li><a href="http://localhost/wordpress/tag/transportation/" title="Transportation" class="transportation">Transportation</a></li>
				              <li><a href="http://localhost/wordpress/tag/travel-tourism/" title="Travel & Tourism" class="travel-tourism">Travel & Tourism</a></li>
				              <li><a href="http://localhost/wordpress/tag/utilities/" title="Utilities" class="utilities">Utilities</a></li>
				            </ul>
				      </div>
					<div class='col-md-8 col-md-offset-1 top-rated-mem'>Top-Rated Businesses:</div>					
						<?php $args = array(
		                    'post_type' => 'post',
		                    'category_name' => 'directory',
		                    'meta_key' => 'ratings_average',
		                    'orderby' => 'meta_value_num', 
		                    'order' => 'DESC',
		                    'posts_per_page' => 3,
		                );
		                $the_query = new WP_Query( $args );
						if ( $the_query->have_posts() ) :
		                while ( $the_query->have_posts() ) : $the_query->the_post();
		          		   if( have_rows('directory_post') ):
			                while ( have_rows('directory_post') ) : the_row();
			            		echo '<div class="col-md-8 ind-feat-bus">';
			            		echo '<div class="col-md-2 post-rate">';
			            		the_ratings();
			            		echo '</div>';
		                        if( get_row_layout() == 'directory_listing' ):
		                          echo '<div class="col-md-9 dir-post-title"><h2><a href="';
		                            the_permalink();
		                            echo '">';
		                            the_sub_field('post_title');
		                          echo '</a></h2></div>';
		                        endif;
		                        if( get_row_layout() == 'directory_listing' ): 
		                          echo '<div class="col-md-9 col-md-offset-1 dir-co_tag_line"><h3>';
		                            the_sub_field('co_tag_line');
		                          echo '</h3></div>';
		                        endif;
		                        if( get_row_layout() == 'directory_listing' ): 
		                          echo '<div class="col-md-5 col-md-offset-1 dir-contact"><p class="dir-co_phone">';
		                            the_sub_field('co_phone');
		                          echo '</p>';
		                        endif;
		                      	if( get_row_layout() == 'directory_listing' ):
		                          echo '<ul><li>';
		                            the_sub_field('co_email');
		                          echo '</li>';                  
		                        endif;
		                        if( get_row_layout() == 'directory_listing' ): 
			                      echo '<li><a class="dir-co_website" href="';
			                        the_sub_field('co_website');
			                      echo '">';
			                      	the_sub_field('co_website');
			                      echo '</a></li></ul>';
			                      echo '</div>';
			                    endif;
		                        if( get_row_layout() == 'directory_listing' ): 
		                          echo '<div class="col-md-6 dir-co_street"><p>';
		                            the_sub_field('co_street');
		                          echo '</p>';
		                          echo '<p>';
		                        endif;
		                      	if( get_row_layout() == 'directory_listing' ):
		                          echo '<p class="dir-co_c_s_z">';
		                            the_sub_field('co_c_s_z');
		                          echo '</p>';
		                          echo '</div>';
		                        endif;
		                        echo '</div><!-- end ind-feat-bus -->';
		                    endwhile;
							
			                else :
			                  // no layouts found

			                endif;
		                ?>
						<?php endwhile; ?>
						<?php else : ?>
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
						<?php endif; ?>
						<div class="col-md-8 col-md-offset-1 dir-break"><hr></div>
						<div id="all-business"class="col-md-8 col-md-offset-1 all-business">
							<ul>
							<?php
							global $post;
							$args = array( 'post_type' => 'post', 'category_name' => 'directory', 'posts_per_page' => 15, 'paged' => $paged  );
							$myposts = get_posts( $args );
							foreach( $myposts as $post ) :  setup_postdata($post); ?>
							    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php endforeach; wp_reset_postdata(); ?>
							</ul>

							<?php
								$the_last_page = $wp_query->max_num_pages;
								$loaded_page = intval($paged);
								//var_dump($the_last_page);
								//var_dump($loaded_page);

							if ($loaded_page == 0) { ?>
								<a href="<?php next_posts(); ?>#all-business">Next &raquo;</a>
							<?php } else { ?> 
								<a href="<?php previous_posts(); ?>#all-business">&laquo; Previous</a> ∞ <a href="<?php next_posts(); ?>#all-business">Next &raquo;</a>
							<?php } ?>								
						</div>
					</div>			
		  	</article>
		  	
			</div><!--row-->
		</div><!--end fluid-container-->
	</section>
<?php get_footer(); ?>
