<?php
/*
Template name: Search page
Theme Name: Artmashina
Theme URI: http://artmashina.ru/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://geotechru.com/
Version: 1.0
*/

get_header(); 
?>

	<!-- START MAIN-OBJECT-LIST -->
    <?php /*$search = getSearch('OKO-3 GPR with control processing unit', '', '', 'ASC' );
    foreach($search as $value){
		var_dump($value->post_title);
	}*/
    
    ?>
    <main class="main-search">

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
                    <aside>
                        <p><strong>Search Criteria</strong></p>
                        <p><label>Keywords:</label><input type="text" id="search" class="input_enter" placeholder="Type keywords"></p>
                        <p>
                            <label><input type="checkbox" id="search_in_descr">Search in product descriptions</label>
                        </p>

                         <p><label>Sort By:</label>
                            <select id="sort_by">
                                <option value="ASC">Name (A - Z)</option>
                                <option value="DESC">Name (Z - A)</option>
                            </select>
                        </p>
						 
                        <p><a class="more" onclick="getSearch();">search</a></p>
                    </aside>
                </div>

                <div class="col-md-9">
                    <p class="title-uppercase">Search items: <span id="search_name"></span></p>

					<div id="results"></div>
                </div>
            </div>
        </div>

    </main>

    <!-- END MAIN-OBJECT-LISTT -->

<script type="text/javascript">
$(document).ready(function() {
$(".input_enter").keypress(function(e){
	if(e.keyCode==13){
		getSearch();
		return false;
	}
});
});

$(document).ready(function() {
	$(window).load(function () {
		var formData = new FormData();
		
		formData.append('search', $("#search").val());
		formData.append('sort_by', $("#sort_by").val());
		formData.append('action', 'getSearch');
	
		$.ajax({
			url:'http://' + location.host + '/wp-admin/admin-ajax.php',
			data: formData,
			type:'POST',
			datatype: "json",
			contentType: false,
			processData: false,
			success:function(data){
				
				if(data.error){
					html = '<div class="error-warning">' + data.error + '</div>';
				}else{
					html = '<ul class="object-list">';
						
					$.each(data, function(item, file) {
						html += '<li>';
						html += file.image;
						html += '<p class="small-title-bold">'+ file.title +'</p>';
						html += '<p>' + file.descr + '</p>';
						html += '<p><a class="more" href="' + file.link + '">More description</a></p>';
						html += '</li>';
					});
					
					html += '</ul">';
							
					$('#results').replaceWith('<div id="results">' + html + '</div>');
				}
			}
		});
	});
});

function getSearch() {
	var formData = new FormData();
	
	formData.append('search', $("#search").val());
	formData.append('sort_by', $("#sort_by").val());
	
	if($("#search_in_descr").is(':checked')){
		formData.append('search_in_descr', $("#search_in_descr").val());
		//console.log('1');
	}
	
	formData.append('action', 'getSearch');
	
	$.ajax({
		url:'http://' + location.host + '/wp-admin/admin-ajax.php',
		data: formData,
		type:'POST',
		datatype: "json",
		contentType: false,
        processData: false,
		success:function(data){
			if(data.error){
				html = '<div class="error-warning">' + data.error + '</div>';
			}else{
				html = '<ul class="object-list">';
				
				$.each(data, function(item, file) {
					html += '<li>';
					html += file.image;
					html += '<p class="small-title-bold">'+ file.title +'</p>';
					html += '<p>' + file.descr + '</p>';
                    html += '<p><a class="more" href="' + file.link + '">More description</a></p>';
					html += '</li>';
				});
				
				html += '</ul">';
			}
				$('#search_name').replaceWith('<span id="search_name">' + $("#search").val() + '</span>');
				$('#results').replaceWith('<div id="results">' + html + '</div>');
		}
	});
};
</script>

<?php get_footer(); ?>