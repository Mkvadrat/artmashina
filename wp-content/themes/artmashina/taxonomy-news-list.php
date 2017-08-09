<?php
/*
Theme Name: Geotech
Theme URI: http://geotechru.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://geotechru.com/
Version: 1.0
*/

get_header();
?>
	
	<!-- START MAIN-NEWS -->

    <main class="main-news">

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
		
		<?php
			$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'category' 	     => 'news-list',
				'post_type'      => 'news',
				'posts_per_page' => $GLOBALS['wp_query']->query_vars['posts_per_page'],
				'paged'          => $current_page
			);

			$news_list = get_posts( $args );
		?>
		
        <div class="container">
            <div class="row">

                <div class="col-md-9">
                    <p class="title-uppercase">company news</p>
                    <div class="list-news">
						<?php if($news_list){ ?>
						<?php foreach($news_list as $news){ ?>
						<?php
						$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($news->ID), 'full');
						$date = get_post_meta( $news->ID, 'date_news_page', $single = true ); //echo get_the_date( 'd.m.y', $news->ID );
						$location = get_post_meta( $news->ID, 'location_news_page', $single = true );
						$descr = wp_trim_words( $news->post_content, 30, '...' );
						$link = get_permalink($news->ID);
						?>
                        <div class="block-news">
							<?php if(!empty($image_url)){ ?>
								<img src="<?php echo $image_url[0]; ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id($news->ID), '_wp_attachment_image_alt', true ); ?>">
							<?php }else{ ?>
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/but.jpg">
							<?php } ?>
							     
                            <div class="description">
                                <p class="small-title-bold"><?php echo $news->post_title; ?></p>
                                <p class="time"><time datetime="<?php echo $date; ?>"><?php echo $date; ?></time><span class="place"><?php echo $location; ?></span></p>
                                <p><?php echo $descr; ?></p>
                                <p class="more-block"><a class="more" href="<?php echo $link; ?>">Learn More</a></p>
                            </div>
                        </div>
						<?php } ?>
						<?php wp_reset_postdata(); ?>
						<?php } ?>
                    </div>
					
					<?php
						$defaults = array(
							'type' => 'array',
							'prev_next'    => True,
							'prev_text'    => __('last'),
							'next_text'    => __('next'),
						);
	
						$pagination = paginate_links($defaults);
						
					if($pagination){
					?>

                    <ul class="list-pages">
						<?php foreach ($pagination as $pag){ ?>
	                        <li><?php echo $pag; ?></li>
						<?php } ?>
                    </ul>
					<?php } ?>
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
