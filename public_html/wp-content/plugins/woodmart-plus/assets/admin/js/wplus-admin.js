(function($){

    $(document).ready(function() {
        // $('.dashboard-menu').select2({
        //     placeholder: 'چند گزینه را انتخاب کنید'
        // });
    });

    $(".remove-field1").on("click", function() {
        var parentDiv = $(this).parent();
        parentDiv.slideUp(500, function() {
            parentDiv.remove();
        });
    });

    jQuery('.offer-items-rea,.notification-items-rea').repeater({
        isFirstItemUndeletable: false,
        initEmpty: false,
        show: function () {
            var currentTimeStamp = Math.floor(Date.now() / 1000);

            $(this).find('.date_notif_class').attr('value',currentTimeStamp);
            
            // $(this).append('<input name="notification_data[][date_create_notification]" type="hidden" value="'+currentTimeStamp+'" >');
            jQuery('.upload_image', this).html('');
            jQuery('.upload-image-button', this).removeClass('button button-default').html('Edit');
            jQuery('.upload-image-button', this).addClass('button button-primary').html('add image');
            jQuery('.remove-image-button', this).hide();
            jQuery(this).slideDown();
        },
        hide: function (deleteElement) {
            //if(confirm(pgs_woo_api.delete_msg)) {
                jQuery(this).slideUp(deleteElement);
            //}
        },
        ready: function (setIndexes) {
        }
    });

    $(document).ready(function(e){

        
        
        var mediaUploader;var $this;
		jQuery(document).on( 'click','.upload-image-button', function ( event ) {
            
			event.preventDefault();
			$this = jQuery( this ),
				current_parent = jQuery(this).closest('.repeater-sections-offer,.repeater-sections-notification,.factor_logo,.logo_login_register,.repeater-sections-slider-images,.image_background_login_register_section,.login_register_image');
				media_holder = jQuery(current_parent).find('.upload_image');
				hd_image_id = jQuery(current_parent).find('.upload_image_id');
                $multiple_uplaoder = $this.data('multiple');

                multiple = false;
                if( $multiple_uplaoder )
                {
                    multiple = true;
                    current_parent = jQuery(this).closest('.admin-replay-message-aramis-ticket');
				    media_holder = jQuery(current_parent).find('.avatar_image');
                }

                

			// If the uploader object has already been created, reopen the dialog
			if (mediaUploader) {
				mediaUploader.open();
				return;
			}
			// Extend the wp.media object
			mediaUploader = wp.media.frames.file_frame = wp.media({
				title: 'انتخاب تصویر',
				button: {
				text: 'تصویر را انتخاب کنید',
			    }, 
                multiple: multiple
            }
            );

			// When a file is selected, grab the URL and set it as the text field's value
			mediaUploader.on('select', function() {

                if( $multiple_uplaoder )
                {
                    var attachments = mediaUploader.state().get('selection').map( 

                        function( attachment ) {
        
                            attachment.toJSON();
                            return attachment;
        
                    });
                    
                    jQuery(current_parent).find('.upload-image-button').removeClass('button button-primary').addClass('remove-image-button').html('بارگزاری مجدد');
                    var $i;
                    for (i = 0; i < attachments.length; ++i) {
    
                        jQuery(media_holder).append('<img src="' + attachments[i].attributes.url + '" width="100px" alt="user avatar" />');
                        jQuery(media_holder).after('<input type="hidden" name="arms_ticket_admin_uploaded[]" value="'+attachments[i].id+'">');
                    }
                    
                    jQuery(current_parent).find('.remove-image-button').show();
                }else{

                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    jQuery(current_parent).find('.upload-image-button').html('ویرایش');
                    var img = '<img class="img-responsive" src="' + attachment.url + '" width="150px" height="150px" />';
                    jQuery(media_holder).html(img);
                    jQuery(hd_image_id).val( attachment.id );
                    jQuery(current_parent).find('.remove-image-button').show();
                }
			});
			// Open the uploader dialog
			mediaUploader.open();
		});

		//Remove image on click remove button
		jQuery(document).on( 'click', '.remove-image-button', function( event ) {
			event.preventDefault();
			var $this = jQuery( this );
			$this.parents('.suggestion-content,.logo_login_register,.image_background_login_register_section').find('.upload_image').html( '' );
			$this.parents('.suggestion-content,.logo_login_register,.image_background_login_register_section').find('.upload-image-button').html('آپلود');

			$this.parents('.suggestion-content,.logo_login_register,.image_background_login_register_section').find('.remove-image-button').hide();
			$this.parents('.suggestion-content,.logo_login_register,.image_background_login_register_section').find('.upload_image_id').val( 0 );
		} );

        jQuery('.color_picke').wpColorPicker();

    });


	$(document).ready(function () {

        $(".navbar-panel ul li").click(function () {

            $(".navbar-panel ul li").removeClass("active");

            $(this).addClass("active");

            var index = $(this).index();

            $(".content-navbar-panel .panel-items").removeClass("active");

            $(".content-navbar-panel .panel-items").eq(index).addClass("active");
			
        });
    });


	showFields($('.dropdown.select_operator').val());

    $('.dropdown_select').on('click','.dropdown .dropdown-menu-item',function(e){
        e.preventDefault();
        var $this = $(this);
        if( $this.hasClass('is-select') )
        {
            var selectedOperator = $this.data('value')
            showFields(selectedOperator);
        }
    });
    
        
    function showFields(operator) {
        
        $('.faraz_field,.sms_ir_field,.melipayamak_fiedl, .defualt_fields').hide();

        if (operator === 'default') {

            $('.defualt_fields').show();

        } else if (operator === 'faraz') {

            $('.faraz_field').show();

        } else if (operator === 'smsir') {
            
            $('.sms_ir_field').show();

        } else if (operator === 'melipayamak') {
            
            $('.melipayamak_fiedl').show();

        }
    }
   

})( jQuery );