
<?php

$images = wplus_helper::get_setting('slider_image');

if( !$images )
    return;

if( count( $images ) <= 1 )
    return;



if( wplus_helper::get_setting('slider_image_enable') ):
?>
<div class="section_container_slider" style="width:100%">
    <div class="swiper swiper_homepage bottom">
        <div class="swiper-wrapper">
            <?php foreach( $images as $image_id ): ?>
                <?php  $image = wp_get_attachment_image_src( $image_id['image'],'full' );  ?>
                    <div class="swiper-slide">
                        <a href="<?php echo esc_url( $image_id['url'] ); ?>" style="width:100%">
                            <img src="<?php echo $image[0] ? $image[0] : '#'; ?>"  />
                        </a>
                    </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper_control">
            <div class="swiper_control__navigation">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
<?php endif; ?>