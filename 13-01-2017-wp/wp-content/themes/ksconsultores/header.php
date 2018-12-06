<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php
			global $page, $paged;
			wp_title( '|', true, 'right' );
			bloginfo( 'name' ); 
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $paged >= 2 || $page >= 2 )
				echo ' | ' . sprintf( __( 'Page %s', 'custom_cb' ), max( $paged, $page ) );
			?>
		</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,700italic,600italic,400italic,300italic,300' rel='stylesheet' type='text/css'>
<link rel="icon" type="image/png" sizes="16x16" href="http://ksconsultores.com.mx/imagenes/ico/16x16.png">
    <?php wp_head();?>
</head>

<body>
    <div id="ip-container" class="ip-container <?php if(is_front_page()): ?>  slider-parallax <?php else:  ?> single  <?php endif; ?>">
       <?php if(is_front_page()): ?> <div class="ip-header">
            <div class="ip-logo">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/logo.png" alt=""/>
            </div>
            <div class="ip-loader">
                <svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
                    <path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
                    <path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
                </svg>
            </div>
        </div>
    <?php endif; ?>
        <header id="header"  <?php if(!is_front_page()): ?>  class="fixed overflow" <?php endif; ?>>
            <div class="jt_row container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                    </button>
                  
                    <a class="navbar-brand mini" href="<?php echo get_site_url(); ?>"><img src="<?php echo get_template_directory_uri();?>/assets/img/logo-mini.png" alt="EPIC Theme"/></a>
              </div>
                <nav class="collapse navbar-collapse navbar-right navbar-main-collapse">
                   
                   <?php 
						    $menu_args = array(
									      'theme_location'  => 'primary', 
									      'container'       => false, 
									      'menu_class'      => 'nav navbar-nav navigation',
									      'menu_id'         => 'nav',
									      'echo'            => true);

						?>
						<?php wp_nav_menu($menu_args);?>
                </nav>
            </div>
        </header>
