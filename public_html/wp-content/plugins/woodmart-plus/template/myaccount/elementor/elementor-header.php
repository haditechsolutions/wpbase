<div class="white_card" style="
   margin: 26px 16px 30px 16px;
   background-color: #787878;
   /* border-bottom: 2px solid rgba(0, 0, 0, 0.5); */
   color: white;
   border-radius: 0px;
   margin: 0;
   padding: 9px;
   margin-bottom: 20px;
   ">
   <div class="main_dashboard__head">
      <ul>
         <li  onclick="  window.open('<?php echo home_url();  ?>', '_blank');"  style="cursor: pointer;float:right;padding-left:10px" class="iconlysitehome">
         </li>
         <li onclick="  window.open('<?php echo wc_get_endpoint_url('notifications') ? wc_get_endpoint_url('notifications') : "#";   ?>', '_blank');" style="cursor: pointer;float:right;border-left:1px solid white;padding-left:10px" class="iconlysite">
         </li>
         <li style="cursor: pointer;float:right;padding-right:10px;" class="icondate">
            امروز : <?php echo wplus_helper::date_to_garegorian(time()); ?>
         </li>
      </ul>
      <p style="
         border-bottom: 1px solid white;
         padding-bottom: 5px;
         "><?php echo wplus_helper::get_setting('title_page_dashboard'); ?></p>
      <?php
         $first_name = get_user_meta( get_current_user_id() , 'first_name',true );
         $last_name = get_user_meta( get_current_user_id() , 'last_name',true );
         
         ?>
      <div class="dropdown">
         <button onclick="myFunction()" class="dropbtn" style="
            background: var(--main-color);
            font-size: 13px;
            /* background-color: transparent; */
            border-radius: 35px;
            color: white;
            "><i class="fa-regular fa-info-circle" style="
            font-family: 'iconly';
            "></i>سلام : <?php echo $first_name ? $first_name. ' ' .$last_name : '' ?>
         </button>
         <div id="myDropdown" class="dropdown-content" style="
            z-index: 100000;
            margin-top: 1px;
            left: 0;
            transition: 1s;
            border-radius: 8px;
            border: 3px solid #e6e6e6;
            -webkit-box-shadow: 3px 0px 15px 4px rgba(38,52,45,0.31);
            box-shadow: 3px 0px 15px 4px rgba(38,52,45,0.31);
            ">
            <a href="<?php echo wc_get_endpoint_url('my-account'); ?>">داشبورد</a>
            <a href="<?php echo wc_get_endpoint_url('orders'); ?>">سفارشات</a>
            <a href="<?php echo wc_logout_url(); ?>">خروج</a>
         </div>
      </div>
   </div>
</div>