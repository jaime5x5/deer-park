<?php get_header(); ?>

<!-- single.php -->
    <div class="container" role="main">

      <div class="row">

        <div class="col-md-9 col-offset-1">
              
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <article>
            <div class="page-header-sng">
            <?php 
              $thumb_id = get_post_thumbnail_id();
              $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);           
              if($thumb_id):
            ?>
              <p class="featured-image single-post"><img src="<?php echo $thumb_url[0] ;?>" style="margin-top: 0;"></p>
            <?php endif; ?>
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>            
                <p>By <?php the_author(); ?> on <?php echo the_time('l, F jS, Y'); ?> in <?php the_category( ', ' );?>.  <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></p>
              </div>                    
              <?php the_content(); ?>
              <h3>Rate this article:</h3>
              <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
              <div class="entry-caption"></div>
          </article>
          <?php endwhile; endif; ?>
          			    <?php comments_template(); ?>
        </div>
        <div class="col-md-3 sb-sing-post">
		      <?php get_sidebar('blog'); ?>
        </div>

      </div>
    </div>

<?php get_footer(); ?>