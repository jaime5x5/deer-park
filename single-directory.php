<?php get_header(); ?>

<!-- single-directory.php -->
<section class="mem-dir-header">
<div class="container ">
  <div class="row">       
    <div class="col-md-9">
        <h3>Member Directory</h3>     
    </div>
    <div class="col-md-3">
      <div class="mem-dir-header-search">
        <?php get_sidebar('sidebar-blog'); ?>     
      </div>
    </div>
  </div>
</div>
</section>
<div class="container single-dir-post">
      <div class="row">
        <div class="col-md-9  dir-post-body">
            <div class="page-header">
              <h2><?php the_title(); ?></h2>
              <?php
              if( have_rows('directory_post') ):

                   // loop through the rows of data
                  while ( have_rows('directory_post') ) : the_row();
                      
                        echo '<div class="co_pic">';
                        if( get_row_layout() == 'directory_listing' ):
                      ?>
                          <img src="<?php the_sub_field('co_photo'); ?>" />
                      <?php
                        echo '</div>';
                      endif;
                      if( get_row_layout() == 'directory_listing' ):
                        echo '<div class="post-title"><h2>';
                          the_sub_field('post_title');
                        echo '</h2></div>';
                      endif;
                      if( get_row_layout() == 'directory_listing' ): 
                        echo '<div class="co_tag_line"><h3>';
                          the_sub_field('co_tag_line');
                        echo '</h3></div>';
                      endif;
                      if( get_row_layout() == 'directory_listing' ): 
                        echo '<div class="col-xs-6"><p class="co_phone">';
                          the_sub_field('co_phone');
                          echo '</p>';
                      endif;
                      if( get_row_layout() == 'directory_listing' ):
                        echo '<p class="co_email">';
                          the_sub_field('co_email');
                        echo '</p>';                  
                      endif;
                      if( get_row_layout() == 'directory_listing' ): 
                        echo '<p class="co_website">';
                          the_sub_field('co_website');
                        echo '</p>';
                        echo '</div>';
                      endif;
                      if( get_row_layout() == 'directory_listing' ): 
                        echo '<div class="co_street">';
                          the_sub_field('co_street');
                        echo '</div>';
                      endif;
                      if( get_row_layout() == 'directory_listing' ):
                        echo '<div class="co_c_s_z">';
                          the_sub_field('co_c_s_z');
                        echo '</div>';
                      endif;
                      if( get_row_layout() == 'directory_listing' ): 
                         if( have_rows('locations') ): ?>
                          <div class=" col-xs-6 acf-map">
                            <?php while ( have_rows('locations') ) : the_row(); 
                              $location = get_sub_field('location');
                              ?>
                              <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
                                <h4><?php the_sub_field('company_name'); ?></h4>
                                <p class="address"><?php echo $location['address']; ?></p>
                                <p><?php the_sub_field('description'); ?></p>
                              </div>
                          <?php endwhile; ?>
                          </div>
                        <?php endif; 
                        echo '</div>';
                      endif;
                      if( get_row_layout() == 'directory_listing' ): 
                        echo '<div class=" col-xs-6 co_services"><h3>Services:</h3>';
                          the_sub_field('co_services');
                        echo '</div>';
                      endif;
                  endwhile;

              else :
                  // no layouts found

              endif;
              ?>
          </div>          
          <div class="col-md-3 post-cat-v">
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
          <div class="col-md-4 directory-post-rate" >
          <h3>Rate this business:</h3>
          <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
          </div>
            <?php $sep = ", "; ?> 
            <div class="col-md-4 post-tags">
              <h3>Category tags:</h3>
              <?php $tag_id = 1; ?>
              <a href="<?php echo get_tag_link($tag_id); ?>">tag name</a>
            </div>
            <div class="col-md-8 dir-test">
              <?php
                  the_field('directory_testimonial');
              ?>
            </div>
            <hr>

        </div>    

      </div>
</div>
    <script type="text/javascript">
      (function($) {

      function render_map( $el ) {

        // var
        var $markers = $el.find('.marker');

        // vars
        var args = {
          zoom    : 16,
          center    : new google.maps.LatLng(0, 0),
          mapTypeId : google.maps.MapTypeId.ROADMAP
        };

        // create map           
        var map = new google.maps.Map( $el[0], args);

        // add a markers reference
        map.markers = [];

        // add markers
        $markers.each(function(){

            add_marker( $(this), map );

        });

        // center map
        center_map( map );

      }

      function add_marker( $marker, map ) {

        // var
        var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

        // create marker
        var marker = new google.maps.Marker({
          position  : latlng,
          map     : map
        });

        // add to array
        map.markers.push( marker );

        // if marker contains HTML, add it to an infoWindow
        if( $marker.html() )
        {
          // create info window
          var infowindow = new google.maps.InfoWindow({
            content   : $marker.html()
          });

          // show info window when marker is clicked
          google.maps.event.addListener(marker, 'click', function() {

            infowindow.open( map, marker );

          });
        }

      }

      function center_map( map ) {

        // vars
        var bounds = new google.maps.LatLngBounds();

        // loop through all markers and create bounds
        $.each( map.markers, function( i, marker ){

          var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

          bounds.extend( latlng );

        });

        // only 1 marker?
        if( map.markers.length == 1 )
        {
          // set center of map
            map.setCenter( bounds.getCenter() );
            map.setZoom( 16 );
        }
        else
        {
          // fit to bounds
          map.fitBounds( bounds );
        }

      }

      $(document).ready(function(){

        $('.acf-map').each(function(){

          render_map( $(this) );

        });

    });

    })(jQuery);
    </script>

<?php get_footer(); ?>