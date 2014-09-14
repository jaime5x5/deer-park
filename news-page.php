<?php $options = get_option('plugin_options'); ?>
<?php
  /*
    Template Name: News Page Template
  */
?>
<?php get_header(); ?>
<!-- page-news-page.php -->
    <!-- Landing Section Section -->
    <section class="landing" id="home">
		
			<div class="row">
				<div class="span12 front-image"></div>
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
	
  <section id="mission" class="mission" style="background: url('<?php bloginfo( 'template_directory' ); ?>/images/mission-fill.png'); background-position:fixed;" data-type="background" data-speed="3">
        <div class="fluid-container valign-fix-container">
		
          <div class="container">
            <h3><?php echo $options['mission_statement']; ?></h3>
          </div>
        </div>
  </section>

<?php wp_reset_query(); ?>
  <!-- About Section --> 
  <section class="about" id="about">
    <div class="fluid-container">
      <div class="row news-feed-hotfix">
			<div class="col-xs-6 col-xs-offset-1 about-section">
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
			<div class="col-xs-4 news-feed-background">
				<div class="col-xs-4 news-feed">
				  <?php
				  	$args = array( 'posts_per_page' => 1 );
					$lastposts = get_posts( $args );
					foreach ( $lastposts as $post ) :
					  setup_postdata( $post ); ?>
					  <div id="fp-news-caption" class="col-xs-4 fp-news-caption">
					  <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>				  
					  <?php echo '<p>'.excerpt(15).'</p>'; ?>
					  </div>
					<?php
					$thumbnails = get_posts( 'numberposts=1' );
					foreach ( $thumbnails as $thumbnail ) {
						if ( has_post_thumbnail( $thumbnail->ID ) ) {
							echo '<a href="' . get_permalink( $thumbnail->ID ) . '" title="' . esc_attr( $thumbnail->post_title ) . '">';
							echo get_the_post_thumbnail( $thumbnail->ID, 'full' );
							echo '</a>';
						}
					}					  
					endforeach; 
					wp_reset_postdata(); ?>
				</div>
			</div>
      </div>
    </div>
  </section>
  <section class="events-heading" id="events-heading">
	<div class="deerpark-gallery">
				<?php
				// Create second WordPress loop
				$page_content = new WP_Query( 'page_id=129' );

				while( $page_content->have_posts() ) : $page_content->the_post();
					// Your content output goes here
					echo '<h2>';
					the_title();
					echo '</h2>';
					$page_contents = get_page($page->ID);
					echo do_shortcode($page_contents->post_content);
				endwhile;
				// Don't forget to reset the post data!
				wp_reset_postdata(); ?>
	</div>
  </section>
<?php get_footer(); ?>
