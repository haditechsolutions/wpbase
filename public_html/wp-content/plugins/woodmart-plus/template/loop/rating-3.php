<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! wc_review_ratings_enabled() ) {
	return;
}
$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

if($rating_count == 0)
{
	return;
}

?>
<div class="product_rating">
    <p>
        <?php echo sprintf(__('%s از 5','woodmartplus'),number_format($average)); ?>
    </p>
    <div class="stars_containner one">
        <i class="fa-solid fa-star"></i>
    </div>
</div>