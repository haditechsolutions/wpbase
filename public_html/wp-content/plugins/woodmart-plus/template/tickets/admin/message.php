<?php 
$date_format = get_option( 'date_format' );
$time_format = get_option( 'time_format' );


$departeman = get_post_meta($detail_ticket->ID,'wplus_ticket_departeman',true);
$photo = get_post_meta($detail_ticket->ID,'aramis_ticket_upload',true);
?>
<div class="aramis_ticket_chat_box_container">

    <div class="ticket_chat__header">
              <div class="ticket_chat__items">
                <div class="ticket_chat__item">
                  <i class="fa-light fa-text text_gray"></i>
                  <p><span class="text_gray"><?php esc_html_e('Subject','woodmartplus') ?>:</span> <?php echo esc_html($detail_ticket->post_title); ?> </p>
                </div>
                <div class="vertical_seperator"></div>
                <div class="ticket_chat__item">
                  <i class="fa-light fa-users-medical text_gray"></i>
                  <p><span class="text_gray"><?php esc_html_e('Departman','woodmartplus') ?>:</span><?php echo esc_html($departeman); ?></p>
                </div>
                <div class="vertical_seperator"></div>
                <div class="ticket_chat__item">
                  <i class="fa-light fa-hashtag text_gray"></i>
                  <p><span class="text_gray">شناسه:</span> <?php echo esc_html($detail_ticket->ID) ?></p>
                </div>
              </div>
              <div class="ticket_chat__items">
                <div class="ticket_chat__item">
                  <i class="fa-light fa-calendar-days text_gray"></i>
                  <p><span class="text_gray">تاریخ ایجاد: </span> <?php echo esc_html(wplus_helper::date_to_garegorian(strtotime($detail_ticket->post_date))); ?></p>
                </div>
                <div class="vertical_seperator"></div>
                <div class="ticket_chat__item">
                  <i class="fa-light fa-rotate text_gray"></i>
                  <p><span class="text_gray">آخرین به روز رسانی: </span><?php echo esc_html(wplus_helper::date_to_garegorian(strtotime($detail_ticket->post_modified))); ?></p>
                </div>
              </div>
    </div>

    <?php foreach($messages as $key => $message): 

        // $user_detail = get_userdata($message->post_author);
        $first_name = get_user_meta($message->post_author,'first_name',true);
        $last_name = get_user_meta($message->post_author,'last_name',true);
        

        ?>
        <?php if($message->woodmartplus_is_customer):
            $full_name = isset($first_name) && !empty($first_name) ? $first_name . ' ' . $last_name : __('Customer','woodmartplus');
            $photos = get_post_meta($message->ID,'wplus_ticket_customer_upload',true);
            $avatar = get_user_meta($message->post_author,'_acount_image',true);
            ?>
            <div class="aramis_ticket_sended_message">
                <div class="ticket_avatar">
                    <?php if($avatar): ?>
                        <img src="<?php echo esc_url(wp_get_attachment_url( $avatar )); ?>" alt="">
                    <?php else: ?>
                        <img src="<?php echo WOODPLUS_ASSET . 'img/user.svg' ?>" alt="">
                    <?php endif; ?>
                </div>
                <div class="chat_container">
                    <div class="chat_message_sende">
                        <p>
                            <?php echo esc_html($message->post_content); ?>
                        </p>
                        <?php if($photos): ?>
                        <div class="chat_attach__container">
                            <div class="chat_attach__item">
                                <?php foreach($photos as $photo): ?>
                                    <a href="<?php echo wp_get_attachment_url($photo); ?>" target="_blank">
                                        <div class="photo">
                                                <img src="<?php echo wp_get_attachment_url($photo); ?>" alt="product">
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="chat_detail">
                        <p class="chat_customer_name"><?php echo esc_html($full_name); ?></p>
                        <p class="chat_customer_date">
                            <?php echo wplus_helper::date_to_garegorian(strtotime($message->post_date),$date_format." ".$time_format) ;?>
                        </p>
                    </div>
                </div>
            </div>
        <?php else: 
            $full_name = isset($first_name) && !empty($first_name) ? $first_name . ' ' . $last_name : __('Manager','woodmartplus');
            $photos = get_post_meta($message->ID,'wplus_ticket_manager_uploader',true);
            ?>

            <div class="aramis_ticket_replay_message">
                <div class="ticket_avatar">
                    <img src="<?php echo WOODPLUS_ASSET . 'img/user.svg' ?>" alt="">
                </div>
                <div class="chat_container" style="align-items: flex-end;">
                    <div class="chat_message_sende chat_replay_message">
                        <p>
                            <?php echo esc_html($message->post_content); ?>
                        </p>
                        <?php if($photos): ?>
                        <div class="chat_attach__container">
                            <div class="chat_attach__item">
                                <?php foreach($photos as $photo): ?>
                                    <a href="<?php echo wp_get_attachment_url($photo); ?>" target="_blank">
                                        <div class="photo">
                                                <img src="<?php echo wp_get_attachment_url($photo); ?>" alt="product">
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="chat_detail">
                        <p class="chat_customer_name"><?php echo esc_html($full_name); ?></p>
                        <p class="chat_customer_date">
                        <?php echo wplus_helper::date_to_garegorian(strtotime($message->post_date),$date_format." ".$time_format) ;?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
    <?php endforeach; ?>
</div>