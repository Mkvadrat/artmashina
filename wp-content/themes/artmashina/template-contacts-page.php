<?php
/*
Template name: Contacts page
Theme Name: Artmashina
Theme URI: http://artmashina.ru/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://geotechru.com/
Version: 1.0
*/

get_header(); 
?>

    <main class="main-contacts">

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
                <div class="col-md-12">
                    <p class="title-uppercase">CONTACT US</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="border-block">
                        <p class="small-title-bold">Moscow</p>
                        <p><strong>Phone/fax:</strong> <a href="tel:<?php echo getMeta('phone_fax_ru_contact_page'); ?>"><?php echo getMeta('phone_fax_ru_contact_page'); ?></a></p>
                        <p><strong>E-mail: </strong> <a href="email:<?php echo getMeta('email_ru_contact_page'); ?>"><?php echo getMeta('email_ru_contact_page'); ?></a></p>
                        <address><p><strong>Address:</strong><?php echo getMeta('address_ru_contact_page'); ?></p></address>
                        <!--<p><strong>Map:</strong><span class="map-block"><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Abfdc430a9db8db875b2cf507ccbbc0c368b1b875552b71093790d846ebd0b94c&amp;width=452&amp;height=227&amp;lang=ru_RU&amp;scroll=true"></script></span></p>-->
                        <p><strong>Map:</strong><span id="maps" style="width:452px; height:227px" class="map-block">
                        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&load=package.full" type="text/javascript"></script>
                        <script type="text/javascript">
                            var myMap;
                            ymaps.ready(init);
                            function init(){
                                ymaps.geocode('<?php echo getMeta('address_for_map_ru_contact_page'); ?>', {
                                        results: 1
                                }).then(
                                    function (res){
                                        var firstGeoObject = res.geoObjects.get(0),
                                        myMap = new ymaps.Map
                                        ("maps",{
                                            center: firstGeoObject.geometry.getCoordinates(),
                                            zoom: 15,
                                            controls: ["zoomControl", "fullscreenControl"]
                                            }
                                        );
                                        var myPlacemark = new ymaps.Placemark(
                                                firstGeoObject.geometry.getCoordinates(), {
                                                        iconContent: ''
                                                }, {
                                                        preset: 'twirl#blueStretchyIcon'
                                                }
                                        );
                                        myMap.geoObjects.add(myPlacemark);
                                        myMap.controls.add('typeSelector');
                                        myMap.behaviors.disable('scrollZoom');
                                    },
                                    function (err){
                                        alert(err.message);
                                    }
                                );
                            }
                        </script>
                        </span></p>
                    </div>
                </div>
                <div class="col-md-6 desctop-sidebar">
                    <div class="form">
                        <p class="title-form"><span>We will contact you within 24 hours</span> <a href="mailto:<?php echo getMeta('email_ru_contact_page'); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/feedback-icon-4.png" alt="">Email</a></p>
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
            </div>
        </div>
    </main>
    
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

<?php get_footer(); ?>