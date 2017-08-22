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

   <!-- START FOOTER -->
    <footer class="footer">
        <div class="container-fluid links-line">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                    <?php 
                        if (has_nav_menu('footer_menu_one')){
                            wp_nav_menu( array(
                                'theme_location'  => 'footer_menu_one',
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
                                'items_wrap'      => '<ul class="footer-nav">%3$s</ul>',
                                'depth'           => 1,
                                'walker'          => '',
                            ) );
                        }
                    ?>
                    </div>
                    <div class="col-md-6">
                    <?php 
                        if (has_nav_menu('footer_menu_two')){
                            wp_nav_menu( array(
                                'theme_location'  => 'footer_menu_two',
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
                                'items_wrap'      => '<ul class="footer-nav">%3$s</ul>',
                                'depth'           => 1,
                                'walker'          => '',
                            ) );
                        }
                    ?>
                    </div>
                    <div class="col-md-3">
                        <p class="contacts-link"><a href="#">Contacts</a></p>
                        <p><a href="tel: <?php echo getMeta('phone_footer_main_page'); ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo getMeta('phone_footer_main_page'); ?></a></p>
                        <p><a href="email: <?php echo getMeta('email_footer_main_page'); ?>"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo getMeta('email_footer_main_page'); ?></a></p>
                        <ul class="social-links">
                            <li><a href="<?php echo getMeta('vk_footer_main_page'); ?>"><i class="fa fa-vk" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo getMeta('facebook_footer_main_page'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo getMeta('youtube_footer_main_page'); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo getMeta('instagram_footer_main_page'); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid bottom-line">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p><?php echo getMeta('powered_footer_main_page'); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p class="made-by"><a href="http://mkvadrat.com/" target="_blank">Site developed in <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo-m2.jpg" alt=""></a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->

<?php wp_footer(); ?>

</body>
</html>