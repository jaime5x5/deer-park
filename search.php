<?php

 
get_header(); ?>
 <!-- search.php -->
 <style>
    section#primary {
        margin-top: 122px;
    }
 </style>
        
<div class="search container navbar-fix">
        
 
            <?php if ( have_posts() ) : ?>
 
                <header class="page-header">
                    <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'WGA' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                </header><!-- .page-header -->
 
                <?php /* Spit out the listings that match*/ ?>
                <?php while ( have_posts() ) : the_post(); ?>
 
                    <div class="page-headline col-xs-12">
                    <a href="<?php the_permalink(); ?>"><h1> <?php the_title(); ?></h1></a>
                    </div>
 
                <?php endwhile; ?>
 
                <?php //shape_content_nav( 'nav-below' ); ?>
 
            <?php else : ?>
 
                <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'WGA' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    <p>There is nothing on this site that matches your search.</p>
            <?php endif; ?>
 </div><!-- end container -->

<?php get_footer(); ?>