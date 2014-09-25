      <footer>

        <div class="fluid-container footer-nav-position">
          <div class="footer-nav">  
              <div class="row footer-bg">
                <div class="col-xs-12">
                  <div class="footer-nav-container">
        				    <section class="events" id="events" >
          						<div class="my-gmap-area">
          							<div id="gmap"></div>
          						</div>	
          					</section>
          				  <ul>
          				  <li>
                              <?php
                                $args = array (
                                      'menu' => 'header-menu',
                                      'menu_class' => 'custom-footer-nav',
                                      'container' => 'false'
                                  );
                                wp_nav_menu( $args );
                              ?>
          					</li>
          						<p><span class="foot-baseline">Deer Park Chamber of Commerce</span>|<span class="foot-baseline">316 E. Crawford Ave.</span>|<span class="foot-baseline">Deer Park, WA  99006</span>|<span class="foot-baseline">(509) 276-5900</span>|<span class="foot-baseline">info@deerpark.</span></p>
          					</ul>
                  </div><!--/.navbar-collapse -->
                </div>
              </div>
            </div>
          </div>
      </footer>
<?php wp_footer(); ?>

  </body>
</html>