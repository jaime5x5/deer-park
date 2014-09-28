<?php $options = get_option('plugin_options'); ?>
<?php
  /*
    Template Name: News Page Template
  */
?>
<?php get_header(); ?>
<!-- page-news.php -->
    <div class="fluid-container">
<!-- Bootstrap Carousel -->
          <?php 
            $args = array(
              'post_type' => 'post',
              'category_name' => 'featured',
            );
            $the_query = new WP_Query( $args );
          ?>
          
          <div id="custom-news-slideshow" class="carousel slide" data-ride="carousel">
            <div class="news-page-heading">
              <h1><?php wp_title( '' ); ?></h1>
            </div>
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              
               <li data-target="#custom-news-slideshow" data-slide-to="<?php echo $the_query->current_post; ?>" class="<?php if($the_query->current_post == 0): ?>active<?php endif; ?>"></li> 
              
              <?php endwhile; endif; ?>
            </ol>

            <?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              
              <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <div class="item <?php if($the_query->current_post == 0): ?>active<?php endif; ?>">
                <?php
                  $thumbnail_id = get_post_thumbnail_id();
                  $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
                  $thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );

                ?>
                <?php //var_dump($thumbnail_meta); die; ?>
                <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $thumbnail_meta; ?>"></a>
                <div class="slideshow-caption">
                  <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                  <a href="<?php the_permalink(); ?>"><?php echo excerpt(10); ?></a>
                  <?php echo sharing_display(); ?>
                </div>
              </div>
              <?php endwhile; endif; 
                // Reset Post Data
                wp_reset_query();
              ?>
            
            </div><!-- end carousel-inner -->

            <!-- Controls -->
            <a class="left carousel-control" href="#custom-news-slideshow" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#custom-news-slideshow" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
          </div>
<!-- End of Bootstrap Carousel -->
<section id="news-sec-title" class="news-sec-title" >
		<div class="col-xs-12 news-cont-title">
		  <h3><?php the_field('news-title-bar'); ?></h3>
		</div>
</section>
<div class="fluid-container news-content">
  <div class="row">
    <div class="col-xs-9">
      <div class="news-content-wrapper" id="news-masonry-wrapper"> 
                <?php
                    $args = array(
                      'post_type' => 'post',
                      'category_name' => 'news',
                      'posts_per_page' => 15,
                      );
                      $the_query = new WP_Query( $args );
                  if ( $the_query->have_posts() ) :
                  while ( $the_query->have_posts() ) : $the_query->the_post();
                ?> 
              <div class="news-bg">

                <div class="news-container">
                  <span class="social-reveal">&nbsp;&nbsp;&#43;Share</span><?php echo sharing_display(); ?>
                  <div class="news-featured-image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
                  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <!-- <p><em>
                    By <?php the_author(); ?> 
                     on <?php echo the_time( 'l, F jS, Y' ); ?>
                     in <?php the_category( ', ' ); ?>,
                     <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
                  </em></p> -->
                  
                  <?php echo '<p>'.excerpt(200).'</p>'; ?>
                  <br>
                  <?php 
                    $zero = '<span class="news-comment-count">Comments <span class="glyphicon glyphicon-heart"></span> 0</span>'; 
                    $one = '<span class="news-comment-count">Comments <span class="glyphicon glyphicon-heart"></span> 1</span>'; 
                    $more = '<span class="news-comment-count">Comments <span class="glyphicon glyphicon-heart"></span> %</span>'; 
                  ?>
                  <a href="<?php comments_link(); ?>"><?php comments_number($zero, $one, $more); ?></a>

                </div>
              </div>
          <?php endwhile; else: ?>
            
              <div class="page-header">
                <h1>Oh no! Something didn't load from our Database!</h1>
              </div>
            
            <?php endif; 
             wp_reset_postdata();
            ?>
      </div>
    </div>        
    <div class="col-xs-3">     
      <?php get_sidebar( 'blog' ); ?>
    </div>
  </div><!-- end of row-->  
</div>   

<?php get_footer(); ?>

