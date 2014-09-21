<?php
  /*
    Template Name: Chamber Template
  */
?>


<?php get_header(); ?>
<!-- page-chamber.php -->

<?php
if (has_post_thumbnail()) {
?>
<div class="container">
	<div class="row">       
		<div class="col-xs-12">
			<div class="chamber-header">			
<?php if( get_field('chamber-header-image') ): ?>

	<img src="<?php the_field('chamber-header-image'); ?>" />

<?php endif;?>
<?php } ?>
			</div>
		</div>
	</div>
</div>
  <!-- Mission Statment Section -->
  <section id="chamber-mission" class="chamber-mission" style="background: url('<?php bloginfo( 'template_directory' ); ?>/images/mission-fill.png'); position:relative; z-index: 10;" data-type="background" data-speed="3">
        <div class="fluid-container valign-fix-container-chamber">
          <div class="container">
            <h3><?php the_field('mission-chamber-text'); ?></h3>
			<P><?php the_field('mission-chamber-identities'); ?></p>
			
          </div>
        </div>
  </section>
  <section id="about" class="chamber-about">
	<div class="fluid-container">
		<div class="container">
			<div class="row">       
				<div class="col-xs-8 chamber-cont">
				<?php
				// check if the flexible content field has rows of data
				if( have_rows('chamber-content') ):
					 // loop through the rows of data
					while ( have_rows('chamber-content') ) : the_row();
						echo' <h2>';
						if( get_row_layout() == 'about' ):
							the_sub_field('about-title');
						endif;
						echo' </h2>';
						echo' <h3>';
						if( get_row_layout() == 'about' ): 
							the_sub_field('about-sub-title');
						endif;
						echo' </h3>';
						echo' <p class="chamber-about-txt">';
						if( get_row_layout() == 'about' ): 
							the_sub_field('about-content');
						endif;
						echo' </p>';
						echo' <h3>';
						if( get_row_layout() == 'about' ): 
							the_sub_field('about-sub-title-2-goals');
						endif;
						echo' </h3>';
						echo' <p class="chamber-about-txt">';
						if( get_row_layout() == 'about' ): 
							the_sub_field('about-goals');
						endif;
						echo' </p>';
					endwhile;
				else :
					// no layouts found
				endif;

				?>
				</div><!-- end col-xs-8 -->
				<div class="col-xs-4 chamber-logo">
				<?php 
					if( have_rows('chamber-sidebar') ):
						 // loop through the rows of data
						while ( have_rows('chamber-sidebar') ) : the_row();
							if( get_row_layout() == 'chamber-sidebar-content' ):
							?>
							<img src="<?php the_sub_field('chamber-logo'); ?>" />
							<?php
							endif;
						endwhile;
					else :
						// no layouts found
					endif;
				?>						
				</div><!-- end col-xs-4 -->
			</div><!-- end row 1 -->
			<div class="row">       
				<div class="col-xs-12">
					<h3><p><?php the_field('chamber-res'); ?></p></h3>
				</div>
				<?php
				// check if the flexible content field has rows of data
				if( have_rows('chamber-res-table') ):
					 // loop through the rows of data
					while ( have_rows('chamber-res-table') ) : the_row();
						echo' <div class="col-xs-3 chamb-col">';
						if( get_row_layout() == 'chamber-res-table-cols' ):
							the_sub_field('chamber-res-table-col-1');
						endif;
						echo' </div>';
						echo' <div class="col-xs-3 chamb-col">';
						if( get_row_layout() == 'chamber-res-table-cols' ): 
							the_sub_field('chamber-res-table-col-2');
						endif;
						echo' </div>';
						echo' <div  class="col-xs-3 chamb-col">';
						if( get_row_layout() == 'chamber-res-table-cols' ): 
							the_sub_field('chamber-res-table-col-3');
						endif;
						echo' </div>';
						echo' <div  class="col-xs-3 chamber-quote">';
						if( get_row_layout() == 'chamber-res-table-cols' ): 
							the_sub_field('chamber-res-table-col-4');
						endif;
						echo' </div>';
					endwhile;
				else :
					// no layouts found
				endif;
				?>
			</div><!-- end row 2 -->
		</div><!-- container -->
	</div><!--fluid container -->
  </section>
  <section id="chamber-contact" class="chamber-contact banner">
		<div class="dpcc-contact">
				<?php
				// check if the flexible content field has rows of data
				if( have_rows('chamber-contatct') ):
					 // loop through the rows of data
					while ( have_rows('chamber-contatct') ) : the_row();
						echo' <h4 class="col-xs-12 contact-cat">';
						if( get_row_layout() == 'chamber-contact-dpcc' ):
							the_sub_field('contact-cat');
						endif;
						echo' </h4>';
						echo' <h2 class="col-xs-12 contact-title">';
						if( get_row_layout() == 'chamber-contact-dpcc' ): 
							the_sub_field('contact-title');
						endif;
						echo' </h2>';
						echo' <div  class="col-xs-12 contact-street-add">';
						if( get_row_layout() == 'chamber-contact-dpcc' ): 
							the_sub_field('contact-street-add');
						endif;
						echo' </div>';
						echo' <div  class="col-xs-12 contact-csz">';
						if( get_row_layout() == 'chamber-contact-dpcc' ): 
							the_sub_field('contact-csz');
						endif;
						echo' </div>';
						echo' <div  class="col-xs-12 contact-pers-title">';
						if( get_row_layout() == 'chamber-contact-dpcc' ): 
							the_sub_field('contact-pers-title');
						endif;
						echo' </div>';
						echo' <div  class="col-xs-12 contact-phone">';
						if( get_row_layout() == 'chamber-contact-dpcc' ): 
							the_sub_field('contact-phone');
						endif;
						echo' </div>';
						echo' <div  class="col-xs-12 contact-email">';
						if( get_row_layout() == 'chamber-contact-dpcc' ): 
							the_sub_field('contact-email');
						endif;
						echo' </div>';
					endwhile;
				else :
					// no layouts found
				endif;
				?>		
		</div>
		<div class="dpcc-contact-sponsor"> 
			<?php if( have_rows('chamber-sponsor') ): ?>
				<ul class="slides contact-sponsor">
				<?php while( have_rows('chamber-sponsor') ): the_row(); 
					// vars
					$content = get_sub_field('chamber-sponsor-txt');
					$image = get_sub_field('chamber-sponsor-image');
					?>
					<li class="slide chamber-sponsor-txt">
						<?php echo $content; ?>
					</li>
					<li class="slide chamber-sponsor-image">
						<span>SPONSORED BY:</span><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />	
					</li>
				<?php endwhile; ?>
				</ul>
			<?php endif; ?>	
		</div>
  </section><!-- chamber-contact-banner section -->
  <section id="membership" class="chamber-membership">
	<div class="row"> 
		<div class="col-xs-9 membership-dpcc">
			<h4><?php the_field('chamber-membership-title'); ?></h4>
			<?php
				// check if the flexible content field has rows of data
				if( have_rows('chamber-res-table') ):
					 // loop through the rows of data
					while ( have_rows('chamber-membership') ) : the_row();
						echo' <div class="col-xs-5 col-xs-offset-1 chamber-membership-info-col-1">';
						if( get_row_layout() == 'chamber-membership-info' ):
							the_sub_field('chamber-membership-info-col-1');
						endif;
						echo' </div>';
						echo' <div class="col-xs-5 col-xs-offset-1 chamber-membership-info-col-2">';
						if( get_row_layout() == 'chamber-membership-info' ): 
							the_sub_field('chamber-membership-info-col-2');
						endif;
						echo' </div>';
					endwhile;
				else :http://www.w3schools.com/tags/tryit.asp?filename=tryhtml_button_test
					// no layouts found
				endif;
			?>
		</div>
		<div class="col-xs-3 membership-btns">
			<a class="btn btn-default new-member-btn" href="http://localhost/wordpress">New Member Application</a>
			<a class="btn btn-default renew-dues-btn" href="http://localhost/wordpress">Renew Membership Dues</a>
		</div>
	</div><!-- end row 3 -->
  </section><!-- membership section -->
<?php get_footer(); ?>
