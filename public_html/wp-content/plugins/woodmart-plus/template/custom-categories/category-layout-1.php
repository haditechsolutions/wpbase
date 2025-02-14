<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<?php $i = 0; foreach( $categories as $category ): if($i > 0) break; ?>
        <div class="product_tag"><?php echo esc_html( $category->cat_name ); ?></div>
<?php $i++; endforeach; ?>