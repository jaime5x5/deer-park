<?php 

function theme_styles() {
	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'normalize_css', get_template_directory_uri() . '/normalize.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'flexslider_css', get_template_directory_uri() . '/css/flexslider.css' );
	

}
//add_action( 'wp_enqueue_scripts', 'theme_styles' );

function theme_js() {
	global $wp_scripts;
	wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', '', '', false );
	wp_register_script( 'respond_js', get_template_directory_uri() . '/js/respond.js', '', '', false );
	wp_enqueue_script( 'gsap_scroll', get_template_directory_uri() . '/js/gsap/plugins/ScrollToPlugin.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'gsap', get_template_directory_uri() . '/js/gsap/TweenMax.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'flexslider_js', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), '', false );
	wp_enqueue_script( 'viewport', get_template_directory_uri() . '/js/viewport.mini.js', array('jquery'), '', true );
	wp_enqueue_script( 'vide', get_template_directory_uri() . '/js/jquery.vide.js', array('jquery'), '', true );
	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery', 'gsap_scroll', 'viewport', 'bootstrap_js', 'masonry', 'gsap'), '', true );
	wp_enqueue_script( 'gmap', 'http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.7', array('jquery'), '', true );
	wp_enqueue_script( 'swscript', get_template_directory_uri() . '/js/jquery.zweatherfeed.min.js', array('jquery'), '', false );
	wp_enqueue_script( 'weatherscript', get_template_directory_uri() . '/js/weatherscript2.js', array('jquery'), '', true );
	wp_enqueue_script( 'map', get_template_directory_uri() . '/js/map.js', array('jquery'), '', true );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array('jquery'), '', true );
	//$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
	//$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'theme_js' );

function register_theme_menus() {
	register_nav_menus(
		array(
				'header-menu' => __( 'Header Menu' )
			)
		);
}

add_action( 'init', 'register_theme_menus');

function blog_sidebar_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),	 
		'id' => $id, 
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

blog_sidebar_widget( 'Blog Sidebar', 'blog', 'Displays on the side of the blog page' );


function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'<br><a class="news-feed-more" href="'. get_permalink($post->ID) . '"> read more &#187;</a>';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
}

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

//create_widget( 'Latest News', 'blog', 'Displays on the side of the blog page' );

//tutorial care of http://www.sitepoint.com/wordpress-options-panel/
//require_once(TEMPLATEPATH . '/functions/admin-menu.php');


//Gets post cat slug and looks for single-[cat slug].php and applies it
add_filter('single_template', create_function(
	'$the_template',
	'foreach( (array) get_the_category() as $cat ) {
		if ( file_exists(STYLESHEETPATH . "/single-{$cat->slug}.php") )
		return STYLESHEETPATH . "/single-{$cat->slug}.php"; }
	return $the_template;' )
);

function dropdown_tag_cloud( $args = '' ) {
	$defaults = array(
		'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 45,
		'format' => 'flat', 'orderby' => 'name', 'order' => 'ASC',
		'exclude' => '', 'include' => ''
	);
	$args = wp_parse_args( $args, $defaults );

	$tags = get_tags( array_merge($args, array('orderby' => 'count', 'order' => 'DESC')) ); // Always query top tags

	if ( empty($tags) )
		return;

	$return = dropdown_generate_tag_cloud( $tags, $args ); // Here's where those top tags get sorted according to $args
	if ( is_wp_error( $return ) )
		return false;
	else
		echo apply_filters( 'dropdown_tag_cloud', $return, $args );
}

function dropdown_generate_tag_cloud( $tags, $args = '' ) {
	global $wp_rewrite;
	$defaults = array(
		'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 45,
		'format' => 'flat', 'orderby' => 'name', 'order' => 'ASC'
	);
	$args = wp_parse_args( $args, $defaults );
	extract($args);

	if ( !$tags )
		return;
	$counts = $tag_links = array();
	foreach ( (array) $tags as $tag ) {
		$counts[$tag->name] = $tag->count;
		$tag_links[$tag->name] = get_tag_link( $tag->term_id );
		if ( is_wp_error( $tag_links[$tag->name] ) )
			return $tag_links[$tag->name];
		$tag_ids[$tag->name] = $tag->term_id;
	}

	$min_count = min($counts);
	$spread = max($counts) - $min_count;
	if ( $spread <= 0 )
		$spread = 1;
	$font_spread = $largest - $smallest;
	if ( $font_spread <= 0 )
		$font_spread = 1;
	$font_step = $font_spread / $spread;

	// SQL cannot save you; this is a second (potentially different) sort on a subset of data.
	if ( 'name' == $orderby )
		uksort($counts, 'strnatcasecmp');
	else
		asort($counts);

	if ( 'DESC' == $order )
		$counts = array_reverse( $counts, true );

	$a = array();

	$rel = ( is_object($wp_rewrite) && $wp_rewrite->using_permalinks() ) ? ' rel="tag"' : '';

	foreach ( $counts as $tag => $count ) {
		$tag_id = $tag_ids[$tag];
		$tag_link = clean_url($tag_links[$tag]);
		$tag = str_replace(' ', '&nbsp;', wp_specialchars( $tag ));
		$a[] = "t<option value='$tag_link'>$tag ($count)</option>";
	}

	switch ( $format ) :
	case 'array' :
		$return =& $a;
		break;
	case 'list' :
		$return = "<ul class='wp-tag-cloud'>nt<li>";
		$return .= join("</li>nt<li>", $a);
		$return .= "</li>n</ul>n";
		break;
	default :
		$return = join("n", $a);
		break;
	endswitch;

	return apply_filters( 'dropdown_generate_tag_cloud', $return, $tags, $args );
}


?>