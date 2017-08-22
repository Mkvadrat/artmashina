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
    <?php wpb_set_post_views(get_the_ID()); ?>
	
	<!-- START MAIN-NEWS -->
    <main class="main-news-in">
		
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
				<div class="col-md-9 text-news">
					<p class="title-uppercase"><?php the_title(); ?></p>
	
					<div class="border-block">
										
						<?php if (have_posts()): while (have_posts()): the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; endif; ?>
					</div>
				</div>

				<?php $most_popular = set_popular_news(); ?>
				
                <div class="col-md-3 most-popular">
                    <aside>
                        <p class="title-uppercase">MOST POPULAR</p>
						<?php if($most_popular){?>
						<?php foreach($most_popular as $popular_news){ ?>
						<?php $image_popular = wp_get_attachment_image_src( get_post_thumbnail_id($popular_news->ID), 'full'); ?>
                        <div class="most-popular-block">
							<?php if(!empty($image_popular)){ ?>
								<img src="<?php echo $image_popular[0]; ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id($popular_news->ID), '_wp_attachment_image_alt', true ); ?>">
							<?php }else{ ?>
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/but.jpg">
							<?php } ?>
							
                            <div class="description">
                                <p class="small-title-bold"><?php echo $popular_news->post_title; ?></p>
                                <p><?php echo wp_trim_words( $popular_news->post_content, 30, '...' )?><p>
								<a class="more" href="<?php echo get_permalink($popular_news->ID) ?>">Learn More</a></p>
                            </div>
                        </div>
						<?php } ?>
						<?php } ?>
                    </aside>
                </div>
            </div>
        </div>
    </main>
    <!-- END MAIN-NEWS -->
    
<?php get_footer(); ?>
