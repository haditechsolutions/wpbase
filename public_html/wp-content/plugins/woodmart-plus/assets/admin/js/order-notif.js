(function($){

    $('.postbox').on('change','select[name="order_status"]',function(e){
        
        var $this = $(this);

        if( $this.hasClass('ajax_start') )
        {
            return;
        }

        var $loder =  '<div class="lds-dual-ring laos"></div>';

        var $parrent = $this.closest('.wc-order-status');
        var $order_id = $('body').find('#post_ID').val();
        var $current_status = $('body').find('#original_order_status').val();

        $parrent.append( $loder );
        // var $section_send_customer = $('body').find('.send_message_order_customer');

        if( $parrent.find('.sms_generate_order_status').length )
        {
            $parrent.find('.sms_generate_order_status').remove();
            $parrent.find('label[for="sms_resend"]').remove();
        }

        $.ajax({
            dataType:'json',type:'POST',url :ajaxurl,
            data:{
                action:'generate_text_order_sms',
                order_id : $order_id,
                current_status : $current_status,
                change_status : $this.val(),
            },
            beforeSend : function(params) {
                $this.addClass('ajax_start');
                if( $parrent.find('.sms_generate_order_status').length )
                {
                    $parrent.find('.sms_generate_order_status').remove();
                    $parrent.find('label[for="sms_resend"]').remove();
                }
            },
            success:function(response)
            {
                $this.removeClass('ajax_start');
                $parrent.find( '.laos' ).remove();
                $parrent.append('<textarea rows="5" class="sms_generate_order_status" name="new_message_order_sms">'+response.msg+'</textarea>');
                $parrent.append('<label for="sms_resend"> ارسال مجدد انجام شود؟ <input style="width:5%" id="sms_resend" type="checkbox" name="re_send_sms_order" > </label>')// $section_send_customer.append( '<textarea rows="5" class="sms_generate_order_status" name="new_message_order_sms">'+response.msg+'</textarea>' );
                // $section_send_customer.append('<label for="sms_resend"> ارسال مجدد انجام شود؟ <input style="width:5%" id="sms_resend" type="checkbox" name="re_send_sms_order" > </label>')
                // if( $section_send_customer.find('.sms_generate_order_status').length )
                // {
                //     $section_send_customer.find('.sms_generate_order_status').append('خیلی عالی');
                // }
                // $(document).trigger('re_init_sms_notification');
            },
            error: function(error)
            {

            }
        });
    });

})( jQuery );