<?php get_header(); ?>

<!-- single-directory.php -->
<section class="mem-dir-header">
<div class="container ">
  <div class="row">       
    <div class="col-xs-9">
        <h3>Member Directory</h3>     
    </div>
    <div class="col-xs-3">
      <div class="mem-dir-header-search">
        <?php get_sidebar('sidebar-blog'); ?>     
      </div>
    </div>
  </div>
</div>
</section>
    <div class="container">
      <div class="row">
        <div class="col-xs-9  dir-post-body">

          <article>
            <div class="page-header">
              <h2><?php the_title(); ?></h2>
              <?php
              
              // check if the flexible content field has rows of data
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
          </article>

          <div class="col-xs-6 directory-post-rate" >
          <h3>Rate this business:</h3>
          <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
          </div>
            <?php $sep = ", "; ?> 
            <div class="col-xs-6 post-tags">
              <h3>Category tags:</h3>
              <?php the_tags( '', $sep, '' ); ?>
            </div>
            <div class="col-xs-12 dir-test">
              <?php
                  the_field('directory_testimonial');
              ?>
            </div>
            <hr>
            <div class="col-xs-12 post-cat-h">
             <h3>Categories:</h3>
              <ul>
                <li><a href="">Accounting & Booking Services | </a></li>
                <li><a href="">Advertising | </a></li>
                <li><a href="">Aircraft and Airport Services | </a></li>
                <li><a href="">Architecture & Design | </a></li>
                <li><a href="">Attorney & Legal | </a></li>
                <li><a href="">Autombile | </a></li>
                <li><a href="">Banks & Credit Unions | </a></li>
                <li><a href="">Beauty & Salons | </a></li>
                <li><a href="">Builders & Contractors | </a></li>
                <li><a href="">Building Supplies | </a></li>
                <li><a href="">Butcher | </a></li>
                <li><a href="">Care Giving & Adult Services | </a></li>
                <li><a href="">Citizen | </a></li>
                <li><a href="">Community Organization | </a></li>
                <li><a href="">Computer & Technology Repair | </a></li>
                <li><a href="">Convienance Stores | </a></li>
                <li><a href="">Delivery & Freight Services | </a></li>
                <li><a href="">Education, Schools & Daycare | </a></li>
                <li><a href="">Emergency Services | </a></li>
                <li><a href="">Farmer’s Markets | </a></li>
                <li><a href="">Financial Services | </a></li>
                <li><a href="">Fitness | </a></li>
                <li><a href="">Funeral Homes | </a></li>
                <li><a href="">Golf | </a></li>
                <li><a href="">Grocery | </a></li>
                <li><a href="">Grooming & Pet Services | </a></li>
                <li><a href="">Heating & AC | </a></li>
                <li><a href="">Indoor Recreation | </a></li>
                <li><a href="">Insurance | </a></li>
                <li><a href="">Library & Books | </a></li>
                <li><a href="">Lodging & Accomodations | </a></li>
                <li><a href="">Manufacturing | </a></li>
                <li><a href="">Medical Services | </a></li>
                <li><a href="">Newspaper & Printing | </a></li>
                <li><a href="">Non-Profit Organizations | </a></li>
                <li><a href="">Nurseries | </a></li>
                <li><a href="">Physical Therapy | </a></li>
                <li><a href="">Plumbing</a></li>
              </ul> 
            </div>
        </div>
        <div class="col-xs-3 post-cat-v">
		      <h3>Categories:</h3>
          <ul>
            <li><a href="">Accounting & Booking Services</a></li>
            <li><a href="">Advertising</a></li>
            <li><a href="">Aircraft and Airport Services</a></li>
            <li><a href="">Architecture & Design</a></li>
            <li><a href="">Attorney & Legal</a></li>
            <li><a href="">Autombile</a></li>
            <li><a href="">Banks & Credit Unions</a></li>
            <li><a href="">Beauty & Salons</a></li>
            <li><a href="">Builders & Contractors</a></li>
            <li><a href="">Building Supplies</a></li>
            <li><a href="">Butcher</a></li>
            <li><a href="">Care Giving & Adult Services</a></li>
            <li><a href="">Citizen</a></li>
            <li><a href="">Community Organization</a></li>
            <li><a href="">Computer & Technology Repair</a></li>
            <li><a href="">Convienance Stores</a></li>
            <li><a href="">Delivery & Freight Services</a></li>
            <li><a href="">Education, Schools & Daycare</a></li>
            <li><a href="">Emergency Services</a></li>
            <li><a href="">Farmer’s Markets</a></li>
            <li><a href="">Financial Services</a></li>
            <li><a href="">Fitness</a></li>
            <li><a href="">Funeral Homes</a></li>
            <li><a href="">Golf</a></li>
            <li><a href="">Grocery</a></li>
            <li><a href="">Grooming & Pet Services</a></li>
            <li><a href="">Heating & AC</a></li>
            <li><a href="">Indoor Recreation</a></li>
            <li><a href="">Insurance</a></li>
            <li><a href="">Library & Books</a></li>
            <li><a href="">Lodging & Accomodations</a></li>
            <li><a href="">Manufacturing</a></li>
            <li><a href="">Medical Services</a></li>
            <li><a href="">Newspaper & Printing</a></li>
            <li><a href="">Non-Profit Organizations</a></li>
            <li><a href="">Nurseries</a></li>
            <li><a href="">Physical Therapy</a></li>
            <li><a href="">Plumbing</a></li>
          </ul>
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
    <script language="javascript">
      PDRTJS_settings_7842252 = {
      "id" : "7842252",
      "unique_id" : "default",
      "title" : "",
      "permalink" : ""
      }; </script>
      <script language="javascript" src="http://i.polldaddy.com/ratings/rating.js"></script>
<?php get_footer(); ?>