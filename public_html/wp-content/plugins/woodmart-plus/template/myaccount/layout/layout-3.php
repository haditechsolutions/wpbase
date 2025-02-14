<?php
$image_detial = wplus_helper::get_background_img_color_login('logo_login_register_layout_3') ? 'style="background-image:url(' . esc_url(wplus_helper::get_background_img_color_login('logo_login_register_layout_3')) . ')"' : '';
$attribute =  wplus_helper::get_setting('setting_recaptcha_enable') ? 'style="height:37rem"' : '';
?>
<div class="background-wrapper">

    <div class="container_login_register_layout2">

        <div class="wplus-row">
            <div class="close__section layout-2">
                <a class="close__section___btn" href="<?php echo esc_url(home_url()); ?>">
                <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

<g id="SVGRepo_bgCarrier" stroke-width="0"/>

<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

<g id="SVGRepo_iconCarrier"> <path opacity="0.5" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" fill="#1C274C"/> <path d="M8.96967 8.96967C9.26256 8.67678 9.73744 8.67678 10.0303 8.96967L12 10.9394L13.9697 8.96969C14.2626 8.6768 14.7374 8.6768 15.0303 8.96969C15.3232 9.26258 15.3232 9.73746 15.0303 10.0304L13.0607 12L15.0303 13.9696C15.3232 14.2625 15.3232 14.7374 15.0303 15.0303C14.7374 15.3232 14.2625 15.3232 13.9696 15.0303L12 13.0607L10.0304 15.0303C9.73746 15.3232 9.26258 15.3232 8.96969 15.0303C8.6768 14.7374 8.6768 14.2626 8.96969 13.9697L10.9394 12L8.96967 10.0303C8.67678 9.73744 8.67678 9.26256 8.96967 8.96967Z" fill="#1C274C"/> </g>

</svg>
                </a>
            </div>
            <div class="wplus__top_row">
                <div class="right__section__register layout-2">
                    <div class="logo__section layout-2">
                        <img src="<?php echo wplus_helper::get_logo_login_register(WOODPLUS_ASSET . 'img/default-logo.png'); ?>" alt="logo">
                    </div>


                    <div class="login_register__body" <?php echo  $attribute; ?>>

                        <form class="form__login_register" method="POST">
                            <p class="login_register___text"> <?php echo esc_html(wplus_helper::get_setting('title_login_register')); ?></p>
                            <p class="login_register__description"><?php echo esc_html(wplus_helper::get_setting('after_title_text')); ?></p>

                            <div class="login_register__input">

                                <input type="text" name="username" placeholder="<?php echo wplus_helper::get_setting('first_placeholder', 'ایمیل / موبایل / نام کاربری') ?>">

                                <svg fill="#5e5e5b" width="18px" height="18px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<circle cx="12" cy="6" r="4" stroke="#1C274C" stroke-width="1.5"></circle>
<path d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z" stroke="#1C274C" stroke-width="1.5"></path>
</svg>
                            </div>
                            <button type="submit" class="login_register__submitbtn">
                            <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

<g id="SVGRepo_bgCarrier" stroke-width="0"></g>

<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>

<g id="SVGRepo_iconCarrier"> <path d="M15 16.5V19C15 20.1046 14.1046 21 13 21H6C4.89543 21 4 20.1046 4 19V5C4 3.89543 4.89543 3 6 3H13C14.1046 3 15 3.89543 15 5V8.0625M20 12L9 12M9 12L11.5 14.5M9 12L11.5 9.5" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g>

</svg>
                                <?php echo wplus_helper::get_setting('first_btn_text', 'ثبت نام / ورود') ?>
                            </button>

                            <?php if (woodplus_Recaptcha::is_recaptcha_enabled() && wplus_helper::get_setting('setting_recaptcha_enable')) { ?>
                                <div id="recaptcha-contact-form" class="ga-recaptcha" data-sitekey="<?php echo esc_attr(wplus_helper::get_setting('google_recaptcha_site_key')); ?>"></div>
                            <?php } ?>

                            <p class="login_register__description_after_btn">
                                <?php echo wplus_helper::generate_terms_condition(); ?>
                            </p>
                            <p class="login_register__description_after_btn">
                                <a href="<?php echo esc_url(wp_lostpassword_url()); ?>" class="text_blue">
                                    <?php echo wplus_helper::get_setting('first_text_forgetpassword', __('Lost your password?', 'woodmartplus')) ?>
                                </a>
                            </p>
                            <?php
                            wp_nonce_field('form_login_register', 'nonce_login_register');
                            ?>

                        </form>

                        <form class="form_login_email" style="display: none;">

                            <p class="login_register___text"> <?php echo esc_html(wplus_helper::get_setting('title_login_register', 'ثبت نام / ورود ')); ?> </p>
                            <p class="login_register__description"><?php echo wplus_helper::get_setting('two_title_text', 'رمزعبور ایمیل خود را وارد کنید') ?></p>
                            <div class="login_register__input">
                                <input type="password" name="password" placeholder="<?php echo wplus_helper::get_setting('two_placeholder_text', 'رمز عبور') ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="18px" height="18px" viewBox="0 0 32 32" id="icon">
  <defs>
    <style>
      .cls-1 {
        fill: none;
      }
    </style>
  </defs>
  <path d="M21,2a8.9977,8.9977,0,0,0-8.6119,11.6118L2,24v6H8L18.3881,19.6118A9,9,0,1,0,21,2Zm0,16a7.0125,7.0125,0,0,1-2.0322-.3022L17.821,17.35l-.8472.8472-3.1811,3.1812L12.4141,20,11,21.4141l1.3787,1.3786-1.5859,1.586L9.4141,23,8,24.4141l1.3787,1.3786L7.1716,28H4V24.8284l9.8023-9.8023.8472-.8474-.3473-1.1467A7,7,0,1,1,21,18Z"></path>
  <circle cx="22" cy="10" r="2"></circle>
  <rect id="_Transparent_Rectangle_" data-name="<Transparent Rectangle>" class="cls-1" width="32" height="32"></rect>
</svg>
                            </div>
                            <button type="submit" class="login_register__submitbtn">
                            <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

<g id="SVGRepo_bgCarrier" stroke-width="0"></g>

<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>

<g id="SVGRepo_iconCarrier"> <path d="M15 16.5V19C15 20.1046 14.1046 21 13 21H6C4.89543 21 4 20.1046 4 19V5C4 3.89543 4.89543 3 6 3H13C14.1046 3 15 3.89543 15 5V8.0625M20 12L9 12M9 12L11.5 14.5M9 12L11.5 9.5" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g>

</svg>
                                <?php echo wplus_helper::get_setting('two_btn_text', 'ورود') ?>
                            </button>
                            <p class="login_register__description_after_btn">
                                <?php echo wplus_helper::generate_terms_condition(); ?>
                            </p>
                            <?php
                            wp_nonce_field('form_login_with_email', 'nonce_login_email');
                            ?>
                        </form>

                        <form class="form_register_email" style="display: none;">

                            <p class="login_register___text"> <?php echo esc_html(wplus_helper::get_setting('title_login_register', 'ثبت نام / ورود ')); ?> </p>
                            <p class="login_register__description"><?php echo esc_html(wplus_helper::get_setting('after_title_text')); ?></p>

                            <div class="login_register__input">
                                <input type="text" name="username" placeholder="<?php echo wplus_helper::get_setting('three_placeholder_username', 'نام‌کاربری') ?>">
                                <svg fill="#5e5e5b" width="18px" height="18px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<circle cx="12" cy="6" r="4" stroke="#1C274C" stroke-width="1.5"></circle>
<path d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z" stroke="#1C274C" stroke-width="1.5"></path>
</svg>
                            </div>

                            <div class="login_register__input">
                                <input type="password" name="password" placeholder="<?php echo wplus_helper::get_setting('three_placeholder_password', 'رمزعبور') ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="18px" height="18px" viewBox="0 0 32 32" id="icon">
  <defs>
    <style>
      .cls-1 {
        fill: none;
      }
    </style>
  </defs>
  <path d="M21,2a8.9977,8.9977,0,0,0-8.6119,11.6118L2,24v6H8L18.3881,19.6118A9,9,0,1,0,21,2Zm0,16a7.0125,7.0125,0,0,1-2.0322-.3022L17.821,17.35l-.8472.8472-3.1811,3.1812L12.4141,20,11,21.4141l1.3787,1.3786-1.5859,1.586L9.4141,23,8,24.4141l1.3787,1.3786L7.1716,28H4V24.8284l9.8023-9.8023.8472-.8474-.3473-1.1467A7,7,0,1,1,21,18Z"></path>
  <circle cx="22" cy="10" r="2"></circle>
  <rect id="_Transparent_Rectangle_" data-name="<Transparent Rectangle>" class="cls-1" width="32" height="32"></rect>
</svg>
                            </div>

                            <button type="submit" class="login_register__submitbtn">
                            <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

<g id="SVGRepo_bgCarrier" stroke-width="0"></g>

<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>

<g id="SVGRepo_iconCarrier"> <path d="M15 16.5V19C15 20.1046 14.1046 21 13 21H6C4.89543 21 4 20.1046 4 19V5C4 3.89543 4.89543 3 6 3H13C14.1046 3 15 3.89543 15 5V8.0625M20 12L9 12M9 12L11.5 14.5M9 12L11.5 9.5" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g>

</svg>
                                <?php echo wplus_helper::get_setting('three_btn_text', 'ثبت نام') ?>
                            </button>
                            <p class="login_register__description_after_btn">
                                <?php echo wplus_helper::generate_terms_condition(); ?>
                            </p>
                            <?php
                            wp_nonce_field('form_register_with_email', 'nonce_register_email');
                            ?>
                        </form>

                        <form class="login_register_otp" style="display: none;">

                            <p class="login_register___text"> <?php echo esc_html(wplus_helper::get_setting('title_login_register', 'ثبت نام / ورود ')); ?> </p>

                            <div class="gap-x">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                    <path d="M6.375 14.25H6C3 14.25 1.5 13.5 1.5 9.75V6C1.5 3 3 1.5 6 1.5H12C15 1.5 16.5 3 16.5 6V9.75C16.5 12.75 15 14.25 12 14.25H11.625C11.3925 14.25 11.1675 14.3625 11.025 14.55L9.9 16.05C9.405 16.71 8.595 16.71 8.1 16.05L6.975 14.55C6.855 14.385 6.5775 14.25 6.375 14.25Z" stroke="#5E5E5E" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.9973 8.25H12.0041" stroke="#5E5E5E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M8.99661 8.25H9.00335" stroke="#5E5E5E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M5.99588 8.25H6.00262" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <p class="msg_detail_number"> </p>
                            </div>

                            <div class="otp_input__grid" dir="ltr">
                                <?php for ($i = 0; $i < $number_digits; $i++): ?>
                                    <div class="otp_input__container solid_input">
                                        <input type="text" class="otp-input" maxlength="1" dir="ltr">
                                    </div>
                                <?php endfor; ?>
                            </div>
                            <div class="space_between">
                                <p><?php echo wplus_helper::get_setting('four_timeup_text', 'زمان باقی مانده:') ?><span class="time_resend"></span></p>
                                <button type="button" class="text_blue edit_number">
                                    <?php echo wplus_helper::get_setting('four_editnumber', 'ویرایش شماره') ?>
                                </button>
                            </div>
                            <button type="submit" class="login_register__submitbtn">
                            <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

<g id="SVGRepo_bgCarrier" stroke-width="0"></g>

<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>

<g id="SVGRepo_iconCarrier"> <path d="M15 16.5V19C15 20.1046 14.1046 21 13 21H6C4.89543 21 4 20.1046 4 19V5C4 3.89543 4.89543 3 6 3H13C14.1046 3 15 3.89543 15 5V8.0625M20 12L9 12M9 12L11.5 14.5M9 12L11.5 9.5" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g>

</svg>
                                <?php echo wplus_helper::get_setting('four_btn_text', 'تایید موبایل') ?>
                            </button>
                            <p class="login_register__description_after_btn">
                                <?php echo wplus_helper::generate_terms_condition(); ?>
                            </p>
                            <?php
                            wp_nonce_field('form_verify_otp', 'nonce_verify_otp');
                            ?>
                        </form>

                        <form class="login_register_otp_email" style="display: none;">

                            <p class="login_register___text"> <?php echo esc_html(wplus_helper::get_setting('title_login_register', 'ثبت نام / ورود ')); ?> </p>

                            <div class="gap-x">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                    <path d="M6.375 14.25H6C3 14.25 1.5 13.5 1.5 9.75V6C1.5 3 3 1.5 6 1.5H12C15 1.5 16.5 3 16.5 6V9.75C16.5 12.75 15 14.25 12 14.25H11.625C11.3925 14.25 11.1675 14.3625 11.025 14.55L9.9 16.05C9.405 16.71 8.595 16.71 8.1 16.05L6.975 14.55C6.855 14.385 6.5775 14.25 6.375 14.25Z" stroke="#5E5E5E" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M11.9973 8.25H12.0041" stroke="#5E5E5E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M8.99661 8.25H9.00335" stroke="#5E5E5E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M5.99588 8.25H6.00262" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <p class="msg_detail_number"> </p>
                            </div>

                            <div class="otp_input__grid" dir="ltr">
                                <?php for ($i = 0; $i < $number_digits; $i++): ?>
                                    <div class="otp_input__container solid_input">
                                        <input type="text" class="otp-input" maxlength="1" dir="ltr">
                                    </div>
                                <?php endfor; ?>
                            </div>
                            <div class="space_between">
                                <p><?php echo wplus_helper::get_setting('five_timeup_text', 'زمان باقی مانده:') ?><span class="time_resend"></span></p>
                            </div>
                            <button type="submit" class="login_register__submitbtn">
                            <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

<g id="SVGRepo_bgCarrier" stroke-width="0"></g>

<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>

<g id="SVGRepo_iconCarrier"> <path d="M15 16.5V19C15 20.1046 14.1046 21 13 21H6C4.89543 21 4 20.1046 4 19V5C4 3.89543 4.89543 3 6 3H13C14.1046 3 15 3.89543 15 5V8.0625M20 12L9 12M9 12L11.5 14.5M9 12L11.5 9.5" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g>

</svg>
                                <?php echo wplus_helper::get_setting('five_btn_text', 'تایید ایمیل') ?>
                            </button>
                            <p class="login_register__description_after_btn">
                                <?php echo wplus_helper::generate_terms_condition(); ?>
                            </p>
                            <?php
                            wp_nonce_field('form_verify_otp_email', 'nonce_verify_otp_email');
                            ?>
                        </form>

                    </div>
                </div>
                <div class="left__section layout-2" <?php echo $image_detial; ?>>
                </div>
            </div>

            <?php if (wplus_helper::get_setting('more_description_login_register')): ?>
                <div class="wplus__bottom_row">
                    <p>
                        <?php echo esc_html(wplus_helper::get_setting('more_description_login_register')); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>

    </div>

</div>