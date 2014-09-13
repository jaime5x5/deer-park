<?php
  /*
    Template Name: Calendar Template
  */
?>
<?php get_header(); ?>
<!-- page-calendar.php -->
	  <!-- member-directory-title-search section -->
	<section id="calendar-title" class="calendar-title" >
		<div class="fluid-container valign-fix-container-calendar">
		  <div class="container">
			<div class="col-xs-8">
			<h3>Calendar of Events</h3>
			</div>
		  </div>
		</div>
	</section>
	<section id="calendar-body" class="calendar-body">
	<div class="fluid-container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<h3><?php the_title() ;?></h3>	
			<?php the_content(); ?>
			<hr>

		<?php endwhile; else: ?>
			
			<p>There are no posts or pages here</p>

		<?php endif; ?>
		</div> <!-- End fluid-container-->
	</section>
	<section id="calendar-cta" class="calendar-cta">
		<div class="fluid-container">
			<div class="row">
				<div class="col-xs-12 cal-cta-txt">
					<h2><?php the_field('calendar-registration-cta'); ?><?h2>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 cal-cta-btn">
					<a class="btn btn-default cal-reg-btn" href="http://localhost/wordpress">Register here!</a>
				</div>
			</div>
		</div>
	</section>
<?php get_footer(); ?>