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
 
	<!-- START MAIN-OBJECT -->

    <main class="main-object">

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
                <div class="col-md-3 desctop-sidebar">
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
                    <div class="descriptin-product-block">
                        <div class="col-md-6 pad-left-none">
                            <div class="product-photo">
								<?php $image_product = get_the_post_thumbnail( get_the_ID(), 'full');
								?>
                                	<?php if(!empty($image_product)){ ?>
										<?php echo $image_product; ?>
									<?php }else{ ?>
										<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/but-product.jpg">
									<?php } ?>
                            </div>
                        </div>
						<?php
							$descr = wpautop(get_post_meta( get_the_ID(), 'short_description_product_page', $single = true ));
							$download_id = get_post_meta( get_the_ID(), 'download_product_page', $single = true );
							$download_link = getAttachment( $download_id );
							$email = getMeta('email_ru_contact_page');
						?>
                        <div class="col-md-6 pad-right-none">
                            <p class="title-uppercase"><?php the_title(); ?></p>

                            <div class="border-block-pink">
								<?php if($descr){ ?>
									<?php echo $descr; ?>
								<?php } ?>
								</div>

                            <ul class="feedback-links">
                                <li><a class="ancLinks" href="#send-form">
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/feedback-icon-1.png" alt=""> Ask about additional equipment
                                </a></li>
								<?php if($download_link){ ?>
                                <li><a href="<?php echo $download_link; ?>">
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/feedback-icon-2.png" alt=""> Download Brochure
                                </a></li>
								<?php } ?>
                                <li><a href="javascript:window.print();"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/feedback-icon-3.png" alt=""> Print
                                </a></li>
                                <li><a href="mailto:<?php echo $email?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/feedback-icon-4.png" alt=""> Email
                                </a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- start tabs-block -->
					<?php
						$full_description = wpautop(get_post_meta( get_the_ID(), 'description_product_page', $single = true ));
						$characteristics = wpautop(get_post_meta( get_the_ID(), 'characteristics_product_page', $single = true ));
						$software = wpautop(get_post_meta( get_the_ID(), 'software_product_page', $single = true ));
						$additional_equipment = getProductsMeta(get_the_ID(), 'additional_equipment_product_page');
						$antenna_units = getProductsMeta(get_the_ID(), 'antenna_units_product_page');
					?>
                    <div class="col-md-8 pad-left-none">
                        <div class="tabs-block">
                            <ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#panel1">Description</a></li>
								
								<?php if($characteristics){ ?>
									<li><a data-toggle="tab" href="#panel2">Characteristics</a></li>
								<?php } ?>
								
								<?php if($software){ ?>
									<li><a data-toggle="tab" href="#panel3">Software</a></li>
								<?php } ?>
								
								<?php if($additional_equipment){ ?>
									<li><a data-toggle="tab" href="#panel4">Additional Equipment</a></li>
								<?php } ?>
								
								<?php if($antenna_units){ ?>
									<li><a data-toggle="tab" href="#panel5">Antenna Units</a></li>
								<?php } ?>
                            </ul>

                            <div class="tab-content">
								
                                <div id="panel1" class="tab-pane fade in active">
									<?php echo $full_description; ?>
								</div>
								
								<?php if($characteristics){ ?>
									<div id="panel2" class="tab-pane fade">
										<?php echo $characteristics; ?>
									</div>
								<?php } ?>
								
								<?php if($software){ ?>
									<div id="panel3" class="tab-pane fade">
										<?php echo $software; ?>
									</div>
								<?php } ?>
								
								<?php if($additional_equipment){ ?>
									<div id="panel4" class="tab-pane fade">
										<ul class="equipment-list">
											<?php foreach($additional_equipment as $equipment){ ?>
												<?php
													$image_url_equipment = wp_get_attachment_image_src( get_post_thumbnail_id($equipment->ID), 'full');
													$descr_equipment = wpautop(wp_trim_words( get_post_meta( $equipment->ID, 'description_product_page', $single = true ), 40, '...' ));
													$link_equipment = get_permalink($equipment->ID);
												?>
													<li>
														<?php if(!empty($image_url_equipment)){ ?>
															<img src="<?php echo $image_url_equipment[0]; ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id($equipment->ID), '_wp_attachment_image_alt', true ); ?>">
														<?php }else{ ?>
															<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/but.jpg">
														<?php } ?>
														
														<div class="description">
															<p class="small-title-bold"><?php echo $equipment->post_title; ?></p>
															<?php echo $descr_equipment; ?>
															<p>Price: <a class="more" href="<?php echo $link_equipment; ?>">More description</a></p>
														</div>
													</li>
											<?php }?>
										</ul>
									</div>
								<?php } ?>
								
								<?php if($antenna_units){ ?>
									<div id="panel5" class="tab-pane fade">
										<ul class="equipment-list">
											<?php foreach($antenna_units as $antenna){ ?>
												<?php
													$image_url_antena = wp_get_attachment_image_src( get_post_thumbnail_id($antenna->ID), 'full');
													$descr_antena = wpautop(wp_trim_words( get_post_meta( $antenna->ID, 'description_product_page', $single = true ), 40, '...' ));
													$link_antena = get_permalink($antenna->ID);
												?>
													<li>
														<?php if(!empty($image_url_antena)){ ?>
															<img src="<?php echo $image_url_antena[0]; ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id($antenna->ID), '_wp_attachment_image_alt', true ); ?>">
														<?php }else{ ?>
															<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/but.jpg">
														<?php } ?>
														
														<div class="description">
															<p class="small-title-bold"><?php echo $antenna->post_title; ?></p>
															<?php echo $descr_antena; ?>
															<p>Price: <a class="more" href="<?php echo $link_antena; ?>">More description</a></p>
														</div>
													</li>
											<?php }?>
										</ul>
									</div>
								<?php } ?>
                            </div>
                        </div>

						<div class="form" id="send-form">
							<p class="title-form"><span>We will contact you within 24 hours</span> <a href="mailto:<?php echo $email; ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/feedback-icon-4.png" alt="">Email</a></p>
							<p><label>* Name:</label><input type="text" id="name" placeholder="Type in your name"><label>* E-mail:</label><input type="text" id="email" placeholder="Type in your Email address"></p>
							<p><label>* Country:</label><input type="text" id="country" placeholder="Country:">
	
								<label>* Tel:</label><input type="text" id="phone" placeholder="Tel">
							</p>
							<p>
								<label>* Message:</label>
								<span class="boxtextarea">
									<textarea placeholder="Enter the details of your inquiry such as product name, color, FOB, etc." id="comment"></textarea>
									<label><input type="checkbox" id="checkbox">Yes, I would like to receive future communications (such as email) from Logis-Geotech extended enterprise and dealer network.</label>
									<input type="submit" value="submit" onclick="SendForm();">
								</span>
							</p>
						</div>
                    </div>

                    <!-- end tabs-block -->

                    <div class="col-md-4 pad-right-none related-products">
						<?php
							$results = getProductsMeta(get_the_ID(), 'related_products_product_page');
							
							if($results){
								foreach($results as $related){
									$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($related->ID), 'full');
									$descr = wpautop(wp_trim_words( get_post_meta( $related->ID, 'description_product_page', $single = true ), 40, '...' ));
									$link = get_permalink($related->ID);
						?>
                        <aside>
                            <p class="title-uppercase">Related Products</p>
								<div class="related-product-block">
									<?php if(!empty($image_url)){ ?>
										<img src="<?php echo $image_url[0]; ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id($related->ID), '_wp_attachment_image_alt', true ); ?>">
									<?php }else{ ?>
										<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/but.jpg">
									<?php } ?>
									
									<p class="small-title-bold"><?php echo $related->post_title; ?></p>
									<?php echo $descr; ?>
									<p><a class="more" href="<?php echo $link; ?>">More description</a></p>
								</div>
							<?php } ?>
						<?php } ?>
                        </aside>
                    </div>
                </div>


                <div class="col-md-3 mobile-sidebar">
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
            </div>
        </div>

    </main>
    <!-- END MAIN-OBJECT -->

<script type="text/javascript">
$(document).ready(function() {
	$("a.ancLinks").click(function () { 
	  var elementClick = $(this).attr("href");
	  var destination = $(elementClick).offset().top;
	  $('html,body').animate( { scrollTop: destination }, 1100 );
	  return false;
  });
});
</script>

<script type="text/javascript">
//форма обратной связи
function SendForm() {
    if($("#checkbox").is(':checked')){
        var check = $('#checkbox').val();
    }
    
	var data = {
		'action': 'SendForm',
		'name' : $('#name').val(),
		'email' : $('#email').val(),
        'country' : $('#country').val(),
		'comment' : $('#comment').val(),
        'phone' : $('#phone').val(),
        'checkbox' : check,
	};
	$.ajax({
		url:'http://' + location.host + '/wp-admin/admin-ajax.php',
		data:data,
		type:'POST',
		success:function(data){
			swal(data.message);
		}
	});
};
</script>

<script type="text/javascript">
        $(".button-video").click(function() {
            $(".first-lavel").slideToggle();
        });
    </script>

<?php get_footer(); ?>
