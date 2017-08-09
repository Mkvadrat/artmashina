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

    <!-- START MAIN-OBJECT-LIST-MAIN -->

    <main class="main-object-list-main">

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
                   
                    <aside class="sidebar">
                        <div id='cssmenu'>
                            <?php bellows( 'main' , array( 'theme_location' => 'product_menu' ) ); ?>
                        </div>
                    </aside>
                    
                    <?php $array_menu = wp_get_nav_menu_items( 49 ); ?>
                    <?php if($array_menu) {?>
                    <aside class="sidebar videocatalog">
                        <p class="title-videocatalog">Videocatalogue</p>
                        <button type="button" class="button-video"><i class="fa fa-bars"></i></button>
                        <ul class="first-lavel">
                            <?php foreach($array_menu as $menu) {?>
                                <li><a href="<?php echo $menu->url; ?>"><?php echo $menu->title; ?></a></li>
                            <?php } ?>
                        </ul>
                    </aside>
                    <?php } ?>
                </div>
                
                <div class="col-md-9">
                    <p class="title-uppercase"><?php echo single_cat_title("", false); ?></p>
                    <?php
                        $term = get_queried_object();
                        $cat_id = $term->term_id;
                        $cat_description = get_option('category_'.$cat.'_description_product_category');
                        $cat_download_id = get_option('category_'.$cat.'_download_product_category');
                        $cat_download_link = getAttachment( $cat_download_id );
                        $cat_email = getMeta('email_ru_contact_page'); 
                    ?>
                    <?php if($cat_description){ ?>
                    <div class="border-block-pink">
                        <?php echo wpautop(stripcslashes( $cat_description ), $br = false); ?>
                    </div>
                    <?php } ?>
                     
                    <ul class="feedback-links">
                        <?php if($cat_download_link){ ?> 
                        <li>
                            <a href="<?php echo $cat_download_link; ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/feedback-icon-2.png" alt=""> Download Brochure</a>
                        </li>
                        <?php } ?>
                        <?php if($cat_email){ ?> 
                        <li>
                            <a href="mailto:<?php echo $cat_email; ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/feedback-icon-4.png" alt=""> Email</a>
                        </li>
                         <?php } ?>
                    </ul>
                    <?php
                        $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array(
                            'category' 	     => getCurrentCatID(),
                            'posts_per_page' => $GLOBALS['wp_query']->query_vars['posts_per_page'],
                            'paged'          => $current_page
                        );
                    
                        $products_list = get_posts( $args );
                    ?>
                    
                    <?php if($products_list){ ?>
                    <ul class="object-list">
                        <?php foreach($products_list as $product){ ?>
                        <?php
                           $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($product->ID), 'full');
                           $descr = wpautop(wp_trim_words( get_post_meta( $product->ID, 'description_product_page', $single = true ), 40, '...' )); 
                           $link = get_permalink($product->ID);
                        ?>
                        <li>
                            <?php if(!empty($image_url)){ ?>
								<img src="<?php echo $image_url[0]; ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id($product->ID), '_wp_attachment_image_alt', true ); ?>">
							<?php }else{ ?>
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/but-category.jpg">
							<?php } ?>
                            
                            <p class="small-title-bold"><?php echo $product->post_title; ?></p>
                            <?php echo $descr; ?>
                            <p><a class="more" href="<?php echo $link; ?>">More description</a></p>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php }else{ ?>
                    <div class="no-items">Items not found.</div>
                    <?php } ?>
                    
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
            </div>
        </div>

    </main>

    <script type="text/javascript">
        $(".button-video").click(function() {
            $(".first-lavel").slideToggle();
        });
    </script>

    <!-- END MAIN-OBJECT-LIST-MAIN -->

<?php get_footer(); ?>