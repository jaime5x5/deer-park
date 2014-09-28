<?php $options = get_option('plugin_options'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<title><?php wp_title( '|', true, 'right' ); ?></title>


    <!-- look up Google authorship plugins, and SEO by YOST -->
                
<?php wp_head(); ?>
<link href="<?php bloginfo( 'template_directory' );?>/bootstrap/css/bootstrap.css" rel='stylesheet' type='text/css'>
<link href="<?php bloginfo( 'template_directory' );?>/style.css" rel='stylesheet' type='text/css'>


  <!--[if lt IE 9]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="<?php bloginfo( 'template_directory' );?>/js/respond.js"></script>	
<style type="text/css">
	.navbar-inverse .navbar-nav>li>a { background: url("<?php bloginfo( 'template_directory' ); ?>/images/nav-bg1.png"); }    
</style>  
<![endif]-->
<?php 
  $current = $_SERVER['REQUEST_URI'];
  if ($current == '/') {
?>
<?php if ( is_user_logged_in() ) {?>

</head>
<body <?php body_class(); ?> data-spy="scroll" data-target=".wga_scrollspy" data-offset="152">
<?php  } else { ?>
<style type="text/css">
	.home section.landing {	margin-top: 120px; }
</style>
</head>
<body <?php body_class(); ?> data-spy="scroll" data-target=".wga_scrollspy" data-offset="120">
<?php } ?>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container nav-bar-c">
        <div class="navbar-header">
          
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
			  MENU
            </button>
          
         <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><img src="<?php echo $options['logo']; ?>" alt="Deer Park Chamber of Commerce"></a>
        </div>
        <div class="nav-button">
          <button type="button" class="navbar-toggle secondary-nav-toggle" data-toggle="collapse" data-target=".secondary-navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
			MENU
          </button>
        </div>
        <div class="navbar-collapse collapse">
          <?php
            $args = array (
                  'menu' => 'header-menu',
                  'menu_class' => 'nav navbar-nav main-nav',
                  'container' => 'false'
              );
            wp_nav_menu( $args );
          ?>
        <div class="secondary-navbar collapse sub-nav wga_scrollspy">
          <ul class="nav navbar-nav main-nav wga_secondary_nav">
            <li><a onClick="event.preventDefault(); wgaNavFunction(jQuery(this).attr('href'));" href="#home">Home</a></li>
            <li><a onClick="event.preventDefault(); wgaNavFunction(jQuery(this).attr('href'))" href="#mission">Mission</a></li>
            <li><a onClick="event.preventDefault(); wgaNavFunction(jQuery(this).attr('href'))" href="#about">About</a></li>
            <li><a onClick="event.preventDefault(); wgaNavFunction(jQuery(this).attr('href'))" href="#events">Events</a></li>
            <li><a onClick="event.preventDefault(); wgaNavFunction(jQuery(this).attr('href'))" href="#contact">Contact</a></li>
          </ul>
        </div><!--/.secondary-navbar -->
        </div><!--/.navbar-collapse -->
        
      </div>
    </div><!-- End of Navbar -->

<?php } else { ?>

<?php if ( is_user_logged_in() ) {?>
<style type="text/css">
	.admin-bar .navbar-fixed-top { margin-top: 30px; }
	.home section.landing {	margin-top: 118px; }
@media (max-width:782px){
  .admin-bar .navbar-fixed-top { margin-top: 46px; }
}
</style>
</head>
<body <?php body_class(); ?> data-spy="scroll" data-target=".wga_scrollspy" data-offset="152">
<?php  } else { ?>
<style type="text/css">
	.home section.landing {	margin-top: 120px; }
</style>
</head>
<body <?php body_class(); ?> data-spy="scroll" data-target=".wga_scrollspy" data-offset="120">
<?php } ?>   
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">         
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span>MENU</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>  
         <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><img src="<?php echo $options['logo']; ?>" alt="Deer Park Chamber of Commerce"></a>
        </div>
        <div class="navbar-collapse collapse">
          <?php
            $args = array (
                  'menu' => 'header-menu',
                  'menu_class' => 'nav navbar-nav main-nav',
                  'container' => 'false'
              );
            wp_nav_menu( $args );
          ?>
        </div><!--/.navbar-collapse -->        
      </div>
    </div><!-- End of Navbar -->    

<?php } ?>



<!-- End Header -->