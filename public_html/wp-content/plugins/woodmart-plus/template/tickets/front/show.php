<?php 
defined( 'ABSPATH' ) || exit;

$date_format = get_option( 'date_format' );
$time_format = get_option( 'time_format' );

$slug = get_post_meta($ticket->ID,'wplus_ticket_departeman',true);
if( 'departeman_order' === $slug )
{
   $departeman = $object->get_name_departeman_by_slug($slug);
}else{
   $departeman = $object->get_name_departeman_by_id( $slug );
}

$status = get_post_meta($ticket->ID,'wplus_ticket_status',true);

wp_enqueue_script('aramis-media-core'); wp_enqueue_media();
?>
<div class="white_card--border_row edit-account">
   <div class="item">
      <div class="gap-x">
         <a href="<?php echo esc_url( wc_get_endpoint_url( 'tickets' ) ); ?>" class="btn link">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
               <path d="M5.25005 2.38L9.05338 6.18333C9.50255 6.6325 9.50255 7.36749 9.05338 7.81666L5.25005 11.62" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p><?php esc_html_e('Back','woodmartplus'); ?></p>
         </a>
      </div>
   </div>
   <div class="item gap-y-2">
      <div class="ticket_chat__header">
         <div class="ticket_chat__items">
            <div class="ticket_chat__item">
               <i class="fa-light fa-text text_gray"></i>
               <p><span class="text_gray"><?php esc_html_e('Subject','woodmartplus') ?>: </span> <?php echo esc_html($ticket->post_title); ?> </p>
            </div>
            <div class="vertical_seperator"></div>
            <div class="ticket_chat__item">
               <i class="fa-light fa-users-medical text_gray"></i>
               <p><span class="text_gray"><?php esc_html_e('Departman','woodmartplus') ?>: </span><?php echo esc_html($departeman); ?></p>
            </div>
            <div class="vertical_seperator"></div>
            <div class="ticket_chat__item">
               <i class="fa-light fa-hashtag text_gray"></i>
               <p><span class="text_gray"><?php esc_html_e('Ticket id','woodmartplus'); ?>:</span> <?php echo esc_html($ticket->ID) ?> </p>
            </div>
         </div>
         <div class="ticket_chat__items">
            <div class="ticket_chat__item">
               <i class="fa-light fa-calendar-days text_gray"></i>
               <p><span class="text_gray"><?php esc_html_e('Creation date','woodmartplus'); ?>:</span> </span> <?php echo esc_html(wplus_helper::date_to_garegorian(strtotime($ticket->post_date))); ?> </p>
            </div>
            <div class="vertical_seperator"></div>
            <div class="ticket_chat__item">
               <i class="fa-light fa-rotate text_gray"></i>
               <p><span class="text_gray"><?php esc_html_e('latest update','woodmartplus'); ?>: </span><?php echo esc_html(wplus_helper::date_to_garegorian(strtotime($ticket->post_modified))); ?></p>
            </div>
         </div>
      </div>
      <div class="ticket_seperator">
         <i class="fa-light fa-arrow-circle-down text_danger"></i>
         <hr />
      </div>
      <div class="ticket_chatbox__container">
        <?php foreach($messages as $key => $message):  ?>
            <?php if($message->woodmartplus_is_customer):
                $full_name = isset($first_name) && !empty($first_name) ? $first_name . ' ' . $last_name : __('Customer','woodmartplus');
                $photos = get_post_meta($message->ID,'wplus_ticket_customer_upload',true);
                $avatar = get_user_meta($message->post_author,'_acount_image',true);
                
                ?>
                <div class="ticket_chatbox send">
                    <div class="chatbox_avatar">
                        <?php if($avatar): ?>
                           <img src="<?php echo  esc_url(wp_get_attachment_url($avatar)); ?>" alt="user avatar" />
                        <?php else: ?>
                           <img src="<?php echo WOODPLUS_ASSET . 'img/user.svg' ?>" alt="user avatar" />
                        <?php endif; ?>
                    </div>
                    <div class="chat_container">
                    <div class="chat_message">
                        <p>
                            <?php echo esc_html($message->post_content); ?>
                        </p>
                        <?php if($photos): ?>
                        <div class="chat_attach__container">
                              <div class="chat_attach__item">
                              <?php foreach($photos as $photo): ?>
                                 <a href="<?php echo esc_url(wp_get_attachment_url($photo)); ?>" target="_blank">
                                    <div class="photo">
                                       <img src="<?php echo esc_url(wp_get_attachment_url($photo)); ?>" alt="product">
                                    </div>
                                 </a>
                              <?php endforeach; ?>
                              </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="chat_end">
                        <p class="chat_end__username"><?php echo esc_html($full_name); ?></p>
                        <div class="vertical_line"></div>
                        <p class="chat_end__date">
                            <?php echo wplus_helper::date_to_garegorian(strtotime($message->post_date) ,$date_format." ".$time_format) ;?>
                        </p>
                    </div>
                    </div>
                </div>
            <?php else:
                $full_name = isset($first_name) && !empty($first_name) ? $first_name . ' ' . $last_name : __('Customer','woodmartplus');
                $photos = get_post_meta($message->ID,'wplus_ticket_manager_uploader',true);
                ?>
                <div class="ticket_chatbox receive">
                    <div class="chatbox_avatar">
                    <img src="<?php echo WOODPLUS_ASSET . 'img/user.svg' ?>" alt="user avatar" />
                    </div>
                    <div class="chat_container">
                    <div class="chat_message">
                        <p>
                            <?php echo esc_html($message->post_content); ?>
                        </p>
                        <?php if($photos): ?>
                        <div class="chat_attach__container">
                              <div class="chat_attach__item">
                              <?php foreach($photos as $photo): ?>
                                 <a href="<?php echo esc_url(wp_get_attachment_url($photo)); ?>" target="_blank">
                                    <div class="photo">
                                       <img src="<?php echo esc_url(wp_get_attachment_url($photo)); ?>" alt="product">
                                    </div>
                                 </a>
                              <?php endforeach; ?>
                              </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="chat_end">
                        <p class="chat_end__username"><?php $full_name ?></p>
                        <div class="vertical_line" ></div>
                        <p class="chat_end__date">
                            <?php echo wplus_helper::date_to_garegorian(strtotime($message->post_date),$date_format." ".$time_format) ;?>
                        </p>
                    </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
      </div>
      <div class="ticket_seperator">
         <i class="fa-light fa-arrow-circle-down text_danger"></i>
         <hr />
      </div>
      <?php if($status !== 'wplus_ticket_clossed') : ?>
      <div class="gap-y-3">
         <p class="text_black"><?php esc_html_e('Replay ticket','woodmartplus'); ?></p>
         <form action="" class="add_ticket__form" method="POST">
            <div class="solid_input oneline">
               <label for="txtTicketDescription"><?php esc_html_e('Description','woodmartplus'); ?><span class="text_danger">*</span></label>
               <textarea rows="5" id="txtTicketDescription" name="customer_replay_message" placeholder="<?php esc_html_e('Your ticket description','woodmartplus'); ?>"></textarea>
            </div>
            <div class="ticket_images__uploaded">

               <div class="avatar_image">
                  
               </div>

            </div>
            <label for="imageUploader" class="upload_image__button">
               <button type="button" class="upload-image-button" data-multiple="true">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none"> <path d="M13.6997 7.91602C16.6997 8.17435 17.9247 9.71602 17.9247 13.091V13.1993C17.9247 16.9243 16.4331 18.416 12.7081 18.416H7.28307C3.55807 18.416 2.06641 16.9243 2.06641 13.1993V13.091C2.06641 9.74102 3.27474 8.19935 6.22474 7.92435" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path d="M10 13.0009V3.51758" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path d="M12.7913 5.37565L9.99967 2.58398L7.20801 5.37565" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>
                  <p><?php esc_html_e('Upload picture','woodmartplus'); ?></p>
               </button>
            </label>
            <div class="justify_end">
               <button type="submit" class="btn solid medium" name="customer_send_replay_message">
                  <?php esc_html_e('Send ticket','woodmartplus'); ?>
               </button>
            </div>
         </form>
      </div>
      <?php else: ?>
         <h3><?php esc_html_e('This ticket is closed and it is not possible to send a message again','woodmartplus'); ?></h3>
      <?php endif; ?>
   </div>
</div>
<script src="<?php echo WOODPLUS_ASSET ?>js/media-upload.js" ></script>