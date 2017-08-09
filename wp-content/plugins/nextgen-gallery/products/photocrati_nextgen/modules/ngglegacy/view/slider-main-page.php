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

	<div class="owl-carousel owl-theme top-slider">
		<?php foreach ( $images as $image ) : ?>
        <div>
            <img src="<?php echo nextgen_esc_url($image->imageURL); ?>" alt="<?php echo esc_attr($image->alttext); ?>">
            <div class="description">
                <p class="title-slider"><?php echo esc_attr($image->alttext); ?></p>
                <p class="paragraph-slider"><?php echo esc_attr($image->description); ?></p>
            </div>
        </div>
		<?php endforeach; ?>
    </div>

<script>
    $(document).ready(function(){
        $('.top-slider').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        autoplay:false,
        smartSpeed:1000,
        autoplayTimeout:5000,
        dots:true,
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
	
<?php endif; ?>