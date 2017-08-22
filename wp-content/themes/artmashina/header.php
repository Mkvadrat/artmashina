<?php
/*
Theme Name: Artmashina
Theme URI: http://artmashina.ru/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://geotechru.com/
Version: 1.0
*/
?>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo artmashina_wp_title('','', true, 'right'); ?></title>
    <base href="#">
    <!-- Bootstrap -->
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/reset.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/fonts.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/styles.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/media.css">
	<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/sweetalert.css">

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery-1.9.1.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- OWL-CAROUSEL -->
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/owl.theme.default.css">

    <!-- FANCYBOX -->
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/js/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.mousewheel-3.0.6.pack.js"></script>

    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/js/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
     
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/js/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <!-- HTML5 for IE -->
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
	<!-- OTHER -->
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/sweetalert.min.js"></script>
	
	<?php wp_head(); ?>
</head>
<body>

    <!-- START HEADER -->

    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="logo">
						<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img
                              src="<?php header_image(); ?>"
                              height="<?php echo get_custom_header()->height; ?>"
                              width="<?php echo get_custom_header()->width; ?>"
                              alt="logotype"
                            />
						</a>
                    </div>
                    <div class="header-phone">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <a href="tel:+79859245846">+7 (985) 924-58-46</a>
                        <a href="tel:+79859245846">+7 (985) 924-58-46</a>
                    </div>
                    <div class="order">
                        <a href="#">Заказать</a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="labg-search">
                        <div class="lang"><a href="#"><i class="fa fa-globe" aria-hidden="true"></i></a></div>
                        <div class="search"><a href="<?php echo get_page_link('646') ?>"><i class="fa fa-search" aria-hidden="true"></i></a></div>
                    </div>
                    <nav>
                        <button type="button" class="menu-button"><i class="fa fa-bars"></i></button>
						<?php
							if (has_nav_menu('primary_menu')){
								wp_nav_menu( array(
									'theme_location'  => 'primary_menu',
									'menu'            => '',
									'container'       => false,
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => '',
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'      => '<ul class="first-lavel-menu">%3$s</ul>',
									'depth'           => 3,
									'walker'          => new primary_menu(),
								) );
							}
						?>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <script type="text/javascript">
        $(".menu-button").click(function() {
            $("nav .first-lavel-menu").slideToggle();
        });
    </script>

    <!-- END HEADER -->
