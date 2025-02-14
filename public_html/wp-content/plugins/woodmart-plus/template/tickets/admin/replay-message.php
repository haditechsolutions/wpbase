<?php
wp_enqueue_script('wplus-admin-media'); 
wp_enqueue_media();

wp_nonce_field('woodmartplus_admin_replay_ticket','woodmartplus_admin_action');

wp_editor( "", 'reply_message', array(
    'wpautop'       => true,
    'media_buttons' => false,
    'textarea_name' => 'wplus_ticket_reply_message',
    'textarea_rows' => 10,
    'teeny'         => true
) );
?>
<div class="admin-replay-message-aramis-ticket">
<div class="ticket_images__uploaded">

    <div class="avatar_image">
        
    </div>

</div>
<label for="imageUploader" class="upload_image__button">
    <button type="button" class="upload-image-button" data-multiple="true" >
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none"> <path d="M13.6997 7.91602C16.6997 8.17435 17.9247 9.71602 17.9247 13.091V13.1993C17.9247 16.9243 16.4331 18.416 12.7081 18.416H7.28307C3.55807 18.416 2.06641 16.9243 2.06641 13.1993V13.091C2.06641 9.74102 3.27474 8.19935 6.22474 7.92435" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path d="M10 13.0009V3.51758" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path d="M12.7913 5.37565L9.99967 2.58398L7.20801 5.37565" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>
        <p>آپلود فایل</p>
    </button>
</label>
</div>