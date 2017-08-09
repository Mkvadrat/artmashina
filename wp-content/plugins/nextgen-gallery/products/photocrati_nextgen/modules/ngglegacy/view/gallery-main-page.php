<?php 
/**
Template Page for the gallery carousel

Follow variables are useable :

	$gallery     : Contain all about the gallery
	$images      : Contain all images, path, title
	$pagination  : Contain the pagination content
	$current     : Contain the selected image
	$prev/$next  : Contain link to the next/previous gallery page
	

 You can check the content when you insert the tag <?php var_dump($variable) ?>
 If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
**/
?>

<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?>

<?php if (!empty ($images)) : ?>
	<?php echo $image->size; ?>
	<div class="container galery-block">
        <div class="row">
            <div class="col-md-12">
                <p class="title-uppercase">Gallery</p>
		    <div class="owl-carousel owl-theme galery">
					<?php foreach ( $images as $image ) : ?>
					<div>
                        <a class="fancybox" rel="galery" href="<?php echo nextgen_esc_url($image->imageURL); ?>">
                           <img src="<?php echo nextgen_esc_url($image->thumbnailURL); ?>" alt="<?php echo esc_attr($image->alttext); ?>" <?php echo $image->size; ?>>
                        </a>
                    </div>
					<?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
	
<script>
    $(document).ready(function(){
        $('.galery').owlCarousel({
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
                items:4
            }
        }
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox();
    });
</script>
	
<?php endif; ?>