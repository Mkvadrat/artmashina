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

	<!-- START MAIN-ABOUT -->

    <main class="main-about">

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
              <div class="col-md-3">
					<?php
						$args = array(
							'numberposts' => 5,
							'post_type'   => 'about-us',
							'orderby'     => 'date',
							'order'       => 'DESC',
						);
			
						$list_about_us = get_posts( $args );
						
						$id = get_the_ID();
						
						if($list_about_us){
					?>
                    <aside class="sidebar">
                        <div id='cssmenu'>
                            <ul class="first-lavel">
							<?php foreach($list_about_us as $list){ ?>
							<?php if($id ==  $list->ID){ ?>
                                <li class="active-about" class='has-sub'><a href="<?php echo get_permalink($list->ID)?>"><span><?php echo $list->post_title; ?></span></a></li>
							<?php }else{ ?>
								<li class='has-sub'><a href="<?php echo get_permalink($list->ID)?>"><span><?php echo $list->post_title; ?></span></a></li>
							<?php } ?>
							<?php } ?>
                            </ul>
                        </div>
                    </aside>
					<?php } ?>
                </div>

                <div class="col-md-9">
                    <p class="title-uppercase"><?php the_title(); ?></p>

					<?php if (have_posts()): while (have_posts()): the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; endif; ?>
                </div>
            </div>
        </div>

    </main>

    <!-- END MAIN-ABOUT -->
	
<?php get_footer(); ?>
