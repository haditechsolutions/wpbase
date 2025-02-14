(function($){

    $(document).ready(function(){

        $('.input_container').each(function(index,value){
            var $this = $(this),
                btn_clear = $this.find('.btn_clear'),
                input_form = $this.find('input');
                
            $(btn_clear).on('click',function(e){
                e.preventDefault();
                input_form.val("");
            });

        });
    });

    $(document).ready(function(){

        var swiperHomepage = new Swiper(".swiper_homepage", {
            slidesPerView: 1,
            loop: true,
            paginationClickable: true,
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
            pagination: {
              el: ".swiper-pagination",
            },
          });
          
    });

    
    $(document).ready(function(){

        showFields($('.select_departeman').val());

        $('.select_departeman').change(function(e){
            var selectedOperator = $(this).val();
            showFields(selectedOperator);
        });

        function showFields(operator) {
            
            $('.ticket_product_selected').hide();

            if (operator === 'default') {

              $('.defualt_fields').show();

            } else if (operator === 'departeman_order') {
              
              $('.ticket_product_selected').show();

            } 
        }

    });

  $(document).ready(function(){
        
      $('body').on('submit','form.aramis_login', function(e){

          e.preventDefault();
          var $this = $(this);
          var alert = $('body').find('.alert');
          var btn_sub = $(this).find('button');
          
          var $user_name = $(this).find('input[name="username"]').val();
          var $password = $(this).find('input[name="password"]').val();
          var $phone = $(this).find('input[name="phone_login"]').val();
          var $nonce = $(this).find('#nonce_login_register').val();
          var $checkRemember = $(this).find('#checkRemember').val();
          var verify_otp = $('body').find('.verify_otp_login');
          var $btn_form = $this.find('.aramis__login_btn');
              $btn_form.addClass('loading');
          var btn_text = $btn_form.html();

            $btn_form.empty();

          btn_sub.addClass('btn-loading');

          $.ajax({

              dataTye:'json',type:'post',url : optionarray.woodplus_url,

              data:{
                  action:'process_login',
                  user_name : $user_name,
                  password : $password,
                  phone : $phone,
                  nonce : $nonce,
                  checkRemember : $checkRemember
              },
              success:function(response)
              {
                
                  $btn_form.html(btn_text);
                  $btn_form.removeClass('loading');
                  var resendTime      = parseInt( optionarray.wating_time_resend_otp );
                  var $timer          = verify_otp.find('.time_resend');
                  btn_sub.removeClass('btn-loading');
                  if( resendTime > 0 ) {
                      // $resendLink.addClass('disabled');
                      var resendTimer;
                      clearInterval( resendTimer );
                      
                      resendTimer = setInterval(function(){

                          $timer.html('('+resendTime+') ثانیه');

                          if( resendTime <= 0 ){
                              clearInterval( resendTimer );
                              $timer.empty().append('<a href="#" class="resend_otp_sms">ارسال مجدد</a>');
                              // $resendLink.removeClass('disabled');
                              $timer.html('');
                              $timer.append('<a href="javascript:void(0);" class="resend_otp_sms">ارسال مجدد</a>');
                          }
                          resendTime--;

                      },1000);
                    }

                  if(response.login_with_number)
                  {
                      $this.closest('.parrent_aramis_login').hide();

                      verify_otp.show();
                      verify_otp.find('.phone_number').attr('data-phone_number',$phone);
                      verify_otp.find('.msg_detail_number').append(response.message);
                      return;
                  }

                  alert.addClass('badge_green--border');
                  alert.children().find('p').append(response.message);
                  alert.show();
                  btn_sub.removeClass('btn-loading');

                  
                  window.location.href = optionarray.WcPage.myacc;
              },
              error:function(error)
              {
                    $btn_form.html(btn_text);
                    $btn_form.removeClass('loading');

                  alert.addClass('badge_danger--border');
                  alert.children().find('p').append(error.responseJSON.message);
                  alert.show();
                  btn_sub.removeClass('btn-loading');
                  
                  setTimeout(function(){
                      alert.removeClass('badge_danger--border');
                      alert.children().find('p').empty();
                      alert.hide();
                  },3000);
              } 
          

          });
  
      });
      
  
  });

  // register
  $(document).ready(function(){

      $('body').on('submit','.aramis_register_form', function(e){
          e.preventDefault();

          var $this = $(this);
          var detail_register = $('body').find('.detail_register');
          var alert = $('body').find('.alert');
          var $phone = $(this).find('input[name="phone"]').val();
          var $nonce = $(this).find('#nonce_woodplus_register').val();
          var verify_form = $('body').find('.verify_otp');
          var btn_sub = $(this).find('button');

          var $username = $(this).find('input[name="username"]').val();
          var $password = $(this).find('input[name="password"]').val();
          var $email = $(this).find('input[name="email"]').val();
          var action = 'register_with_phone';

          var $form_btn = $this.find('.aramis__register_btn');
          var $form_btn_text = $form_btn.html();

              $form_btn.addClass('loading');
              $form_btn.empty();

          if( $(this).find('input[name="email"]').length)
          {
              action = '_woocmmerce_register';    
          }
          
          
          btn_sub.addClass('btn-loading');
          

          $.ajax({

              type:'post', dataType:'json', url: optionarray.woodplus_url,
              data:{
                  action: action,
                  phone_number: $phone,
                  nonce_register: $nonce,
                  email : $email,
                  password : $password,
                  username : $username,
                  role: 'customer'
                  
              },
              success: function(response)
              {
                $form_btn.removeClass('loading');
                $form_btn.html( $form_btn_text );
                  if(response.register)
                  {
                    
                      alert.children().find('p').append(response.msg);
                      alert.addClass('badge_green--border');
                      alert.show();
                      
                      setTimeout(function(){
                          window.location.href = optionarray.WcPage.myacc;
                      },1000)

                      return;
                  }
                  $this.hide();
                  detail_register.hide();
                  verify_form.show();
                  verify_form.children().find('.msg_detail_number').append(response.msg);
                  verify_form.find('.phone_number').attr('data-phone_number',$phone);
                  btn_sub.removeClass('btn-loading');
                  var resendTime      = parseInt( optionarray.wating_time_resend_otp );
                  var $timer          = verify_form.find('.time_resend');
                  
                  if( resendTime > 0 ) {
                      // $resendLink.addClass('disabled');
                      var resendTimer;
                      clearInterval( resendTimer );
                      $timer.addClass('disable');
                      resendTimer = setInterval(function(){

                          $timer.html('('+resendTime+') ثانیه');

                          if( resendTime <= 0 ){
                              clearInterval( resendTimer );
                              
                              $timer.removeClass('disable');
                              // $resendLink.removeClass('disabled');
                              $timer.html('');
                              $timer.append('<a href="javascript:void(0);" class="resend_otp_sms">ارسال مجدد</a>');
                          }
                          resendTime--;

                      },1000);
                  }

              },
              error: function(error)
              {

                $form_btn.removeClass('loading');
                $form_btn.html( $form_btn_text );
                 
                  btn_sub.removeClass('btn-loading');

                  if(error.responseJSON.user_exists)
                  {
                      alert.children().find('p').append(error.responseJSON.msg + '<a href="'+optionarray.WcPage.myacc+'" > '+error.responseJSON.msg_login+' </a>');

                  }else{

                      alert.children().find('p').append(error.responseJSON.msg);
                  }

                  alert.addClass('badge_danger--border');
                  alert.show();

                  setTimeout(function(){
                      alert.removeClass('badge_danger--border');
                      alert.children().find('p').empty();
                      alert.hide();
                  },3000);
              }

          });

      })
  });

  // verify_otp register
  $(document).ready(function(){

      $('body').on('submit', '.verify_otp', function(e){
          e.preventDefault();
          var $this = $(this);
          var otp = '';
          var $nonce = $(this).find('#nonce_verify_otp').val();
          var $phone = $(this).find('.phone_number').data('phone_number');
          var alert = $('body').find('.alert');
          var btn_sub = $(this).find('button');
          btn_sub.addClass('btn-loading');

          $this.find('.phone_validate').each( function( index, input ){
              otp += $(this).val();
          });



          $.ajax({
              dataType: 'json', type:'post', url: optionarray.woodplus_url,
              data:{
                  action: 'verify_otp',
                  otp_sended : otp,
                  phone : $phone,
                  nonce_verify_otp: $nonce
              },
              success:function(response)
              {
                  alert.addClass('badge_green--border');
                  alert.children().find('p').append(response.msg);
                  alert.show();
                  btn_sub.removeClass('btn-loading');

                  window.location.href = optionarray.WcPage.myacc;
              },

              error:function(error)
              {
                

                      alert.children().find('p').append(error.responseJSON.msg);

                  alert.addClass('badge_danger--border');
                  alert.show();
                  btn_sub.removeClass('btn-loading');
                  setTimeout(function(){
                      alert.removeClass('badge_danger--border');
                      alert.children().find('p').empty();
                      alert.hide();
                  },5000);
              }

          });
      });

  });

  // verify_otp login
  $(document).ready(function(){

      $('body').on('submit', '.verify_otp_login_form', function(e){
          e.preventDefault();
          var $this = $(this);
          var otp = '';
          var $nonce = $(this).find('#nonce_verify_otp_login').val();
          var $phone = $(this).find('.phone_number').data('phone_number');
          var alert = $('body').find('.alert');
          var btn_sub = $(this).find('button');
          btn_sub.addClass('btn-loading');
          $this.find('.phone_validate').each( function( index, input ){
              otp += $(this).val();
          });

          $.ajax({
              dataType: 'json', type:'post', url: optionarray.woodplus_url,
              data:{
                  action: 'verify_otp_login',
                  otp_sended : otp,
                  phone : $phone,
                  nonce_verify_otp: $nonce
              },
              success:function(response)
              {
                  alert.addClass('badge_green--border');
                  alert.children().find('p').append(response.msg);
                  alert.show();
                  btn_sub.removeClass('btn-loading');

                  window.location.href = optionarray.WcPage.myacc;
              },
              error:function(error)
              {
                  if(error.responseJSON.user_exists)
                  {
                      alert.children().find('p').append(error.responseJSON.msg + '<a href="'+optionarray.WcPage.myacc+'" > '+error.responseJSON.msg_login+' </a>');

                  }else{
                      alert.children().find('p').append(error.responseJSON.msg);
                  }

                  
                  alert.addClass('badge_danger--border');
                  alert.show();
                  btn_sub.removeClass('btn-loading');
                  
                  setTimeout(function(){
                      alert.removeClass('badge_danger--border');
                      alert.children().find('p').empty();
                      alert.hide();

                      if(error.responseJSON.redirect)
                      {
                          window.location.href = optionarray.WcPage.myacc;
                      }

                  },3000);

              }

          });
      });

  });

  //resend_otp_sms

  $(document).ready(function(){

      $('body').on('click','.resend_otp_sms',function(e){
          e.preventDefault();
          
          var parent = $(this).closest('.time_resend');
          var verify_form = $('body').find('.verify_otp_all,.login_register_otp,.login_register_otp_email');
          var alert = $('body').find('.alert');
          var alert_2 = $(this).parents('.login_register_otp_email,.login_register_otp');
          var type_value = $(this).data('type_value');
          
        alert_2 = alert_2.find('.login_register___text');
          
       
          parent.addClass('loading-resend');
          $.ajax({
              dataType:'json',type:'post',url:optionarray.woodplus_url,
              data:{
                  action:'action_resend_otp',
                  nonce_resend: optionarray.aramis_script_nonce,
                  type_value : type_value
              },
              success:function(response)
              {
                

                  var resendTime      = parseInt( optionarray.wating_time_resend_otp );
                  var $timer          = verify_form.find('.time_resend');
                  
                  if( resendTime > 0 ) {
                      var resendTimer;
                      clearInterval( resendTimer );
                      parent.removeClass('loading-resend');
                      resendTimer = setInterval(function(){

                          $timer.html('('+resendTime+')');

                          if( resendTime <= 0 ){
                              clearInterval( resendTimer );
                              $timer.html('');
                              $timer.append('<a href="javascript:void(0);" class="resend_otp_sms" data-type_value="'+type_value+'" >ارسال مجدد</a>');
                          }
                          resendTime--;
                      },1000);
                  }
                  if( alert_2.length  )
                  {
                    alert_2.after(show_alert_message( response.msg,'success' ));
                    
                    setTimeout(function(){
                        $('body').find('.alert_message').remove();
                    },3000);

                  }else{

                    alert.addClass('badge_green--border');
                    alert.children().find('p').append(response.msg);
                    alert.show();
                    setTimeout(function(){
                        alert.removeClass('badge_green--border');
                        alert.children().find('p').empty();
                        alert.hide();
                    },3000);

                  }
                  
              },
              error:function(error)
              {
                console.log(error);
                // if( 'error' === error.responseJSON.status )
                // {

                //     $this.find('.login_register___text').after(show_alert_message( error.responseJSON.msg,error.responseJSON.status ));

                //     setTimeout(function(e){
                //         $('body').find('.alert_message').remove();
                //     },3000);
                // }

                if( alert_2.length  )
                  {
                    alert_2.after(show_alert_message( error.responseJSON.msg,'error' ));
                    
                    setTimeout(function(){
                        $('body').find('.alert_message').remove();
                    },3000);

                  }else{
                        alert.addClass('badge_danger--border');
                        alert.show();
                        parent.removeClass('loading-resend');

                        alert.children().find('p').append(error.responseJSON.msg);
                        setTimeout(function(){

                            alert.removeClass('badge_danger--border');
                            alert.children().find('p').empty();
                            alert.hide();

                        },3000);
                  }
              }
              
          });

      });

  });

  // edit nummber section

  $(document).ready(function(){

      $('body').on('click','.edit_number', function(e){

          var parent = $(this).closest('.verify_otp_all');
          var detail_register = $('body').find('.detail_register');
          var register_form  = $('body').find('.aramis_register_form');
          var login_form = $('body').find('.parrent_aramis_login');
          var cod_for_phone = $('body').find('.msg_detail_number');

          var login_register_together = $(this).closest('.login_register_otp');

          var time_resend = login_register_together.find('.time_resend');

          var timerId = parseInt(time_resend.attr('data-timer_time'));
          
          clearInterval(timerId);
          
          cod_for_phone.empty();
          

          if( login_register_together.length )
          {
                login_register_together.hide();
                $('body').find('.form__login_register').show();
                return;
          }


          if(register_form.length)
          {
              register_form.css('display','flex');

              parent.css('display','none');

              detail_register.show();

              return;
          }

          if(login_form.length)
          {
              login_form.css('display','block');
              $('body').find('.verify_otp_login').css('display','none');
              return;
          }

      });

  });

  //login and register now

  $(document).ready(function(){

    
    $('body').on('submit','.form__login_register',function(e){
        e.preventDefault();
        var $this = $(this);
        var $value = $(this).find('input[name="username"]').val();
        var $nonce = $(this).find('#nonce_login_register').val();

        var captcha_val = false;
        
        var $captcha = $(this).find('textarea[name="g-recaptcha-response"]');

        if( optionarray.captcha_is_enable )
        {
            captcha_val = $captcha.val();
        }

        var $parents = $this.closest('.login_register__body,.login_register_smart');
        var btn = $this.find('.login_register__submitbtn');
            btn.addClass('loading');
        var text_btn = btn.html();
            btn.empty();
        
        $.ajax({
            type: 'POST',dataTye :'json', url: optionarray.woodplus_url,
            data:{
                action:'login_register_together',
                value : $value,
                captcha : captcha_val,
                nonce : $nonce
            },
            success: function(response)
            {
                $this.hide();
                btn.removeClass('loading');
                btn.html(text_btn);

                if( 'email_login' === response.status || 'account_login' === response.status )
                {
                    var $login_form = $parents.find('.form_login_email');
                    $login_form.find('.login_register__description').empty();
                    $login_form.find('.login_register__description').html( response.msg );
                    $login_form.show();
                    $login_form.append('<input name="username_sended" type="hidden" value="'+$value+'">');
                    
                }
                
                if( 'email_register' === response.status )
                {

                    var $register_otp_form = $parents.find('.login_register_otp_email');

                    $register_otp_form.find('.msg_detail_number').append(response.msg)
                    
                    var resendTime      = parseInt( optionarray.wating_time_resend_otp );
                    var $timer          = $register_otp_form.find('.time_resend');
                    
                    if( resendTime > 0 ) {
                        // $resendLink.addClass('disabled');
                        var resendTimer;
                        clearInterval( resendTimer );
                        
                        resendTimer = setInterval(function(){

                            $timer.html('('+resendTime+') ثانیه');
                            
                            if( resendTime <= 0 ){
                                clearInterval( resendTimer );
                                // $timer.empty().append('<a href="#" class="resend_otp_sms">ارسال مجدد</a>');
                                // $resendLink.removeClass('disabled');
                                $timer.html('');
                                $timer.append('<a href="javascript:void(0);" class="resend_otp_sms" data-type_value="email">ارسال مجدد</a>');
                            }
                            resendTime--;

                        },1000);
                        $timer.attr('data-timer_time',resendTimer);

                    }

                    $register_otp_form.show();
                    $register_otp_form.append('<input name="username_sended" type="hidden" value="'+$value+'">');
                }

                if( 'mobile' === response.status )
                {
                    var $form_otp = $parents.find('.login_register_otp');
                    $form_otp.find('.msg_detail_number').append(response.msg)
                    
                    var resendTime      = parseInt( optionarray.wating_time_resend_otp );
                    var $timer          = $form_otp.find('.time_resend');
                    
                    if( resendTime > 0 ) {
                        // $resendLink.addClass('disabled');
                        var resendTimer;
                        clearInterval( resendTimer );
                        
                        resendTimer = setInterval(function(){

                            $timer.html('('+resendTime+') ثانیه');
                            
                            if( resendTime <= 0 ){
                                clearInterval( resendTimer );
                                // $timer.empty().append('<a href="#" class="resend_otp_sms">ارسال مجدد</a>');
                                // $resendLink.removeClass('disabled');
                                $timer.html('');
                                $timer.append('<a href="javascript:void(0);" class="resend_otp_sms" data-type_value="mobile" >ارسال مجدد</a>');
                            }
                            resendTime--;

                        },1000);
                        $timer.attr('data-timer_time',resendTimer);

                    }

                    $form_otp.show();
                    $form_otp.append('<input name="username_sended" type="hidden" value="'+$value+'">');
                }
            },
            error:function( error )
            {
                btn.removeClass('loading');
                btn.html(text_btn);
                
                if( 'error' === error.responseJSON.status )
                {
                    $this.find('.login_register__description').after(show_alert_message( error.responseJSON.msg,error.responseJSON.status ));

                    setTimeout(function(e){
                        $('body').find('.alert_message').remove();
                    },3000);
                    
                    if ( optionarray.captcha_is_enable ) {
                        if (!window.grecaptcha) {
                        } else {
                            grecaptcha.reset();
                        }
                    }
                }
            }
        });
    });

    $('body').on('submit','.form_login_email',function(e){
        e.preventDefault();
        var $this = $(this);
        var $password = $this.find('input[name="password"]').val();
        var $nonce = $this.find('#nonce_login_email').val();
        var $value = $this.find('input[name="username_sended"]').val();

        var btn = $this.find('.login_register__submitbtn');
        btn.addClass('loading');
        var text_btn = btn.html();
        btn.empty();

        $.ajax({
            type: 'POST',dataTye :'json', url: optionarray.woodplus_url,
            data : {
                action : 'email_or_account_login',
                nonce : $nonce,
                value : $value,
                password : $password
            },
            success:function(response)
            {
                btn.removeClass('loading');
                btn.html(text_btn);
                if( 'success' === response.status )
                {
                    $this.find('.login_register__description').after(show_alert_message( response.msg,response.status ));
                    window.location.href = optionarray.WcPage.myacc;
                }
            },
            error:function( error )
            {
                btn.removeClass('loading');
                btn.html(text_btn);
                if( 'error' === error.responseJSON.status )
                {
                    $this.find('.login_register__description').after(show_alert_message( error.responseJSON.msg,error.responseJSON.status ));

                    setTimeout(function(e){
                        $('body').find('.alert_message').remove();
                    },3000);
                    
                }
            }
        });

    });

    $('body').on('submit','.form_register_email',function(e){
        e.preventDefault();
        var $this = $(this);
        var $password = $this.find('input[name="password"]').val();
        var $username = $this.find('input[name="username"]').val();
        var btn = $this.find('.login_register__submitbtn');
        btn.addClass('loading');
        var text_btn = btn.html();
        btn.empty();

        if( $password.length < 5 )
        {
            $this.find('.login_register__description').after(show_alert_message( 'رمزعبور نمی تواند کمتر از 6 حرف باشد','error' ));
            btn.removeClass('loading');
                btn.html(text_btn);
            setTimeout(function(e){
                $('body').find('.alert_message').remove();
            },2000);
            return;
        }
        
        var $email = $this.find('input[name="username_sended"]').val();
        var $nonce = $this.find('#nonce_register_email').val();
        $.ajax({
            type: 'POST',dataTye :'json', url: optionarray.woodplus_url,
            data : {
                action : 'email_register',
                nonce : $nonce,
                email : $email,
                password : $password,
                username : $username
            },
            success:function(response)
            {
                btn.removeClass('loading');
                btn.html(text_btn);

                if( 'success' === response.status )
                {
                    $this.find('.login_register__description').after(show_alert_message( response.msg,response.status ));
                    window.location.href = optionarray.WcPage.myacc;
                }
            },
            error:function( error )
            {
                btn.removeClass('loading');
                btn.html(text_btn);

                if( 'error' === error.responseJSON.status )
                {
                    $this.find('.login_register__description').after(show_alert_message( error.responseJSON.msg,error.responseJSON.status ));

                    setTimeout(function(e){
                        $('body').find('.alert_message').remove();
                    },3000);
                    
                }
            }
        });
    });

    $('body').on('submit','.login_register_otp',function(e){
        e.preventDefault();
        var $this = $(this);
        var $phone = $this.find('input[name="username_sended"]').val();
        var $nonce = $this.find('#nonce_verify_otp').val();
        var otp = '';
        var btn = $this.find('.login_register__submitbtn');
            btn.addClass('loading');
        var text_btn = btn.html();
            btn.empty();

        $this.find('.otp-input').each( function( index, input ){
            otp += $(this).val();
        });

        $.ajax({
            type: 'POST',dataTye :'json', url: optionarray.woodplus_url,
            data : {
                action : 'verify_otp_and_do_somting',
                nonce : $nonce,
                phone : $phone,
                otp   : otp 
            },
            success:function(response)
            {
                btn.removeClass('loading');
                btn.html(text_btn);
                if( 'success' === response.status )
                {
                    $this.find('.login_register___text').after(show_alert_message( response.msg,response.status ));
                    window.location.href = optionarray.WcPage.myacc;
                }
            },
            error:function(error)
            {
                btn.removeClass('loading');
                btn.html(text_btn);
                if( 'error' === error.responseJSON.status )
                {
                    $this.find('.login_register___text').after(show_alert_message( error.responseJSON.msg,error.responseJSON.status ));

                    setTimeout(function(e){
                        $('body').find('.alert_message').remove();
                    },3000);
                }
            }
        });
    });

    $('body').on('submit','.login_register_otp_email',function(e){

        e.preventDefault();
        var $this = $(this);
        var $parents = $this.closest('.login_register__body,.login_register_smart');
        var $email = $this.find('input[name="username_sended"]').val();
        var $nonce = $this.find('#nonce_verify_otp_email').val();
        var otp = '';
        var btn = $this.find('.login_register__submitbtn');
            btn.addClass('loading');
        var text_btn = btn.html();
            btn.empty();

        $this.find('.otp-input').each( function( index, input ){
            otp += $(this).val();
        });

        $.ajax({
            type: 'POST',dataTye :'json', url: optionarray.woodplus_url,
            data : {
                action : 'verify_otp_email_and_register',
                nonce : $nonce,
                email : $email,
                otp   : otp 
            },
            success:function(response)
            {
                btn.removeClass('loading');
                btn.html(text_btn);
                $this.hide();
                if( 'success' === response.status )
                {
                     var $register_form = $parents.find('.form_register_email');
                    $register_form.show();
                    $register_form.append('<input name="username_sended" type="hidden" value="'+$email+'">');
                    // $this.find('.login_register___text').after(show_alert_message( response.msg,response.status ));
                    
                }
            },
            error:function(error)
            {
                btn.removeClass('loading');
                btn.html(text_btn);
                if( 'error' === error.responseJSON.status )
                {
                    $this.find('.login_register___text').after(show_alert_message( error.responseJSON.msg,error.responseJSON.status ));

                    setTimeout(function(e){
                        $('body').find('.alert_message').remove();
                    },3000);
                }
            }
        });

    });
  });

  function show_alert_message( $msg , $class )
  {
     return $('<div class="alert_message '+$class+'"> <i class="fa-light fa-square-exclamation"></i> '+$msg+' </div>');
  }

  async function copyToClipboard(text) {
    if (text === "") return;
    try {
      await navigator.clipboard.writeText(text);
    } catch (err) {
      console.error("Failed to copy: ", err);
    }
  }

  const btn_copy__codes = document.querySelectorAll(".btn_copy__code");

  const tabbar_buttons_container = document.querySelector(
    ".tabbar_container__buttons"
  );

  const tabbar_contents_container = document.querySelector(
    ".tabbar_container__contents"
  );

  const accordion_containers = document.querySelectorAll(".accordion_container");
  
  if (tabbar_buttons_container && tabbar_contents_container) {
    const tabbar_buttons = Array.from(tabbar_buttons_container.children);
    const tabbar_contents = Array.from(tabbar_contents_container.children);
    tabbar_buttons.forEach((button, index) => {
      const selectedTab = tabbar_contents[index];
      button.addEventListener("click", () => {
        tabbar_buttons.forEach((item) => item.classList.remove("show"));
        tabbar_contents.forEach((item) => item.classList.remove("show"));
        button.classList.add("show");
        selectedTab.classList.add("show");
      });
    });
  }

  if (accordion_containers.length > 0) {
    accordion_containers.forEach((menu) => {
      const btn_open = menu.querySelector(".accordion_button");
      btn_open.addEventListener("click", () => {
        menu.classList.toggle("opened");
      });
    });
  }
  
  if (btn_copy__codes.length > 0) {
    btn_copy__codes.forEach((button) => {
        const content = button.querySelector(".content");
        const status = button.querySelector('.status');
        button.addEventListener("click", () => {
        copyToClipboard(content.innerHTML)
        status.innerHTML = "کپی شد"
        button.classList.add('active');
        setTimeout(() => {
            status.innerHTML = "کپی کردن"
            button.classList.remove('active');
        }, 5000);
        });
    });
 }

 $('.dashboard_sidebar__container .btn_toggle__sidebar').click(function() {
    $('.dashboard_sidebar__container').toggleClass('opened');
    $('.dashboard_sidebar__container').find(".blob").toggleClass('d-none');
 });


 $('.otp-input').on('input', function(e) {
    let key = e.which || e.keyCode;

    // Only allow number characters
    let inputValue = $(this).val();
    if (isNaN(inputValue)) {
      $(this).val("");
      return;
    }

    // Move to the next input when the field is full
    if (inputValue.length === this.maxLength && key !== 8) {
      $(this).parent('.otp_input__container').next('.otp_input__container').find('.otp-input').focus();
      return false;
    }
  });

})( jQuery );

function onloadCallbackCaptcha()
{
   if( optionarray.captcha_is_enable )
   {
       if (!window.grecaptcha) {
       } else {
           setTimeout(function(){
               var recaptchas = document.getElementsByClassName("ga-recaptcha");
               for(var i=0; i<recaptchas.length; i++) {
                   var recaptcha = recaptchas[i];
                   var sitekey = recaptcha.dataset.sitekey;

                   grecaptcha.render(recaptcha, {
                       'sitekey' : sitekey
                   });
               }
           }, 500);
       }
   }
}


function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
}
