<?php
/*
Template name: Main page
Theme Name: Artmashina
Theme URI: http://artmashina.ru/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://geotechru.com/
Version: 1.0
*/

get_header(); 
?>

	<?php
		foreach (get_field ('slider_main_page') as $nextgen_gallery_id){
			echo nggShowGallery( $nextgen_gallery_id['ngg_id'], "slider-main-page", 4 );
		}
	?>
	
	<?php $array_menu = wp_get_nav_menu_items( 24 ); ?>
	<?php if($array_menu) {?>
    <main class="main-index">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme our-direction-slider">
						<?php foreach($array_menu as $menu) {?>
                        <div>
                            <a href="<?php echo $menu->url; ?>">
                                <?php echo $menu->title; ?>
                            </a>
                        </div>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
	<?php } ?>
	
	<div class="container about-guarantee">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <p class="title-uppercase">О компании</p>
				<?php
					$args = array(
						'numberposts' => 5,
						'post_type'   => 'about-us',
						'orderby'     => 'date',
						'order'       => 'DESC',
					);
		
					$list_about_us = get_posts( $args );
					
					if($list_about_us){
				?>
                <div class="owl-carousel owl-theme about-slider">
					<?php
					foreach($list_about_us as $list){
						$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($list->ID), 'full');
						$descr = wpautop(stripcslashes( wp_trim_words( $list->post_content, 30, '...' ) ), $br = false);
						$link = get_permalink($news->ID);
					?>
                    <div>
						<?php if(!empty($image_url)){ ?>
							<img src="<?php echo $image_url[0]; ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id($list->ID), '_wp_attachment_image_alt', true ); ?>">
						<?php }else{ ?>
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/about-slide-1.jpg">
						<?php } ?>
                        <div class="description-slide">
                            <p class="small-title-bold"><?php echo $list->post_title; ?></p>
                            <?php echo $descr; ?>
							<p><a class="more" href="<?php echo $link; ?>">Learn More</a></p>
                        </div>
                    </div>
					<?php } ?>
                </div>
				<?php } ?>
				
            </div>
            <div class="col-md-12 col-lg-4">
                <p class="title-uppercase">Деятельность</p>
                <div class="guarantee-description">
					
				<?php echo wpautop(getMeta('guarantee_main_page')); ?>
                </div>
            </div>
        </div>
    </div>
	
	<!-- START NEWS-BLOCK -->
	<?php
		$args = array(
			'numberposts' => 4,
			'post_type'   => 'news',
			'orderby'     => 'date',
			'order'       => 'DESC',
		);

		$list_news = get_posts( $args );
		
		if($list_news){
	?>
    <div class="container-fluid news-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="title-uppercase">Полезное</p>
                </div>
				<?php foreach($list_news as $news){ ?>
				<?php
				$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($news->ID), 'full');
				$descr = wpautop(stripcslashes( wp_trim_words( $news->post_content, 55, '...' ) ), $br = false);
				$link = get_permalink($news->ID);
				?>
                <div class="col-md-3">
                    <div class="news">
						<?php if(!empty($image_url)){ ?>
							<img src="<?php echo $image_url[0]; ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id($news->ID), '_wp_attachment_image_alt', true ); ?>">
						<?php }else{ ?>
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/news-1.jpg">
						<?php } ?>
						
                        <p class="small-title"><?php echo $news->post_title; ?></p>
						<?php echo $descr; ?>
					    <a class="more" href="<?php echo $link; ?>">Learn More</a>
                    </div>
                </div>
				<?php } ?>
				
            </div>
        </div>
    </div>
	<?php } ?>
    <!-- END NEWS-BLOCK -->
	
	<!-- START UNDER-NEWS-BLOCK -->
    <div class="container-fluid under-news-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/training.png" alt="">
                    <p class="small-title">дизайн и разработка</p>
                    <p>Дизайн, верстка и корректура<br>оригинал-макетов</p>
                </div>
                <div class="col-md-4">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/service.png" alt="">
                    <p class="small-title">Индивидуальный подход</p>
                    <p>Консультации по<br>технологии печати</p>
                </div>
                <div class="col-md-4">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/devepopment.png" alt="">
                    <p class="small-title">Сервис и доставка</p>
                    <p>Обеспечение доставки продукции до<br>производства заказчика</p>
                </div>
            </div>
        </div>
    </div>
    <!-- END UNDER-NEWS-BLOCK -->

    <!-- start text for SEO -->

    <div class="container seo-text">
        <div class="row">
            <div class="col-md-12">
                <p class="title-uppercase">Текст  для СЕО</p>
            </div>
            <div class="col-md-6">
                <p>Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты). Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.."  ошибке, некоторые - намеренно (например, юмористические варианты). </p>
            </div>
            <div class="col-md-6">
                <p>Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по</p>
                <p>Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).</p>
            </div>
        </div>
    </div>

    <!-- end text for SEO -->
	
	<!-- START GALERY -->
    <div class="container-fluid galery-container">
    	<?php
    		foreach (get_field ('gallery_object_main_page') as $nextgen_gallery_id){
    			echo nggShowGallery( $nextgen_gallery_id['ngg_id'], "gallery-main-page");
    		}
    	?>
    </div>
    <!-- END GALERY -->
	
<script>
    $(document).ready(function(){
        $('.about-slider').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        autoplay:false,
        smartSpeed:2000,
        autoplayTimeout:5000,
        dots:false,
        stopOnHover:true,
        navigationText:["",""],
        rewindNav:true,
        pagination:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
        });

    });
</script>

<script>
    $(document).ready(function(){
        $('.our-direction-slider').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        autoplay:false,
        smartSpeed:1000,
        autoplayTimeout:5000,
        dots:false,
        stopOnHover:true,
        navigationText:["",""],
        rewindNav:true,
        pagination:true,
        responsive:{
            320:{
                items:3
            },
            400:{
                items:3
            },
            580:{
                items:3
            },
            768:{
                items:4
            },
            991:{
                items:6
            },
            1360:{
                items:8
            }
        }
        });
    });
</script>
	
<?php get_footer(); ?>