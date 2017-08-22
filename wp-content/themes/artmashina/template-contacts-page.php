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
                    <p class="title-uppercase">КОНТАКТЫ</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="border-block" itemscope itemtype="http://schema.org/Organization">
                        <p class="small-title-bold">Москва</p>
						<meta itemprop="name" content="Артмашина">
                        <p><strong>Телефон:</strong> <a href="tel:<?php echo getMeta('phone_fax_ru_contact_page'); ?>" itemprop="telephone"><?php echo getMeta('phone_fax_ru_contact_page'); ?> </a></p>
                        <p><strong>E-mail: </strong> <a href="email:<?php echo getMeta('email_ru_contact_page'); ?>" itemprop="email"><?php echo getMeta('email_ru_contact_page'); ?></a></p>
                        <address><p><strong>Адрес:</strong><span itemprop="address"><?php echo getMeta('address_ru_contact_page'); ?></span></p></address>
                        <!--<p><strong>Map:</strong><span class="map-block"><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Abfdc430a9db8db875b2cf507ccbbc0c368b1b875552b71093790d846ebd0b94c&amp;width=452&amp;height=227&amp;lang=ru_RU&amp;scroll=true"></script></span></p>-->
                        <p><strong>Карта:</strong><span id="maps" style="width:452px; height:227px" class="map-block">
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
                        <p class="title-form"><span>Оставьте сообщение и мы ответим Вам в течении 24 часов</span> <a href="mailto:<?php echo getMeta('email_ru_contact_page'); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/feedback-icon-4.png" alt="">Email</a></p>
                        <p><label>* Имя:</label><input type="text" id="name" placeholder="Введите Ваше имя"><label>* E-mail:</label><input type="text" id="email" placeholder="Ваш e-mail"></p>
                        <p><label>* Город:</label><input type="text" id="country" placeholder="Выберите город">

                            <label>* Телефон:</label><input type="text" id="phone" placeholder="Номер телефона">
                        </p>
                        <p>
                            <label>* Сообщение:</label>
                            <span class="boxtextarea">
                                <textarea placeholder="Введите Ваше сообщение" id="comment"></textarea>
                                <label><input type="checkbox" id="checkbox">Да, я согласен на обработку личных данных.</label>
                                <input type="submit" value="ОТПРАВИТЬ" onclick="SendForm();">
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