<?php
/*
Theme Name: Artmashina
Theme URI: http://artmashina.ru/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://geotechru.com/
Version: 1.0
*/

get_header(); 
?>

    <!-- START MAIN-404 -->
    <main class="main-404">

        <!-- start bread-crumbs -->
        <div class="container-fluid bread-crumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                       <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- end bread-crumbs -->

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class="title-uppercase">404 - Page not found!</p>

                    <div class="border-block">
                        <p>We apologize, this page was not found or was deleted.</p>
                        <p><a class="more" href="<?php echo esc_url( home_url( '/' ) ); ?>">back</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- END MAIN-404 -->
    
<?php get_footer(); ?>