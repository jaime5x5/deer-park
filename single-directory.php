<?php get_header(); ?>

<!-- single-directory.php -->
    <div class="fluid-container navbar-fix" role="main">

      <div class="row">

        <div class="col-xs-9">

          <article>
            <div class="page-header">
              <?php

              // check if the flexible content field has rows of data
              if( have_rows('directory_post') ):

                   // loop through the rows of data
                  while ( have_rows('directory_post') ) : the_row();
                      
                        echo '<div class="co_pic">';
                        if( get_row_layout() == 'directory_listing' ):
                      ?>
                          <img src="<?php the_sub_field('co_pic'); ?>" />
                      <?php
                        echo '</div>';
                      endif;
                      if( get_row_layout() == 'directory_listing' ):
                        echo '<div class="post-title">';
                          the_sub_field('post_title');
                        echo '</div>';
                      endif;
                      if( get_row_layout() == 'directory_listing' ): 
                        echo '<div class="co_tag_line">';
                          the_sub_field('co_tag_line');
                        echo '</div>';
                      endif;
                      if( get_row_layout() == 'directory_listing' ): 
                        echo '<div class="co_phone">';
                          the_sub_field('co_phone');
                        echo '</div>';
                      endif;
                      if( get_row_layout() == 'directory_listing' ):
                        echo '<div class="co_email">';
                          the_sub_field('co_email');
                        echo '</div>';
                      endif;
                      if( get_row_layout() == 'directory_listing' ): 
                        echo '<div class="co_website">';
                          the_sub_field('co_website');
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
                        echo '<div class="co_services">';
                          the_sub_field('co_services');
                        echo '</div>';
                      endif;
                      
                      if( get_row_layout() == 'directory_listing' ): 
                         if( have_rows('locations') ): ?>
                          <div class="acf-map">
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

                  endwhile;

              else :
                echo "not good";
                  // no layouts found

              endif;
              ?>
          </article>
          <script type="text/javascript">
          (function($) {

          /*
          *  render_map
          *
          *  This function will render a Google Map onto the selected jQuery element
          *
          *  @type  function
          *  @date  8/11/2013
          *  @since 4.3.0
          *
          *  @param $el (jQuery element)
          *  @return  n/a
          */

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

          /*
          *  add_marker
          *
          *  This function will add a marker to the selected Google Map
          *
          *  @type  function
          *  @date  8/11/2013
          *  @since 4.3.0
          *
          *  @param $marker (jQuery element)
          *  @param map (Google Map object)
          *  @return  n/a
          */

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

          /*
          *  center_map
          *
          *  This function will center the map, showing all markers attached to this map
          *
          *  @type  function
          *  @date  8/11/2013
          *  @since 4.3.0
          *
          *  @param map (Google Map object)
          *  @return  n/a
          */

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

          /*
          *  document ready
          *
          *  This function will render each map when the document is ready (page has loaded)
          *
          *  @type  function
          *  @date  8/11/2013
          *  @since 5.0.0
          *
          *  @param n/a
          *  @return  n/a
          */

          $(document).ready(function(){

            $('.acf-map').each(function(){

              render_map( $(this) );

            });

          });

          })(jQuery);
          </script>
        </div>
        <div class="col-xs-3">
		      
        </div>

      </div>
    </div>

<?php get_footer(); ?>