(function($){

	
    $(document).ready(function(e){

        
        var mediaUploader;var $this;
		jQuery(document).on( 'click','.upload-image-button', function ( event ) {
			
			event.preventDefault();
			$this = jQuery( this ),
				current_parent = jQuery(this).closest('.edit-account');
				media_holder = jQuery(current_parent).find('.avatar_image');
				hd_image_id = jQuery(current_parent).find('.upload_image_id');
				$multiple_uplaoder = $this.data('multiple');
			multiple = false;
			if( $multiple_uplaoder )
			{
				multiple = true;
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
                multiple: multiple,
                // library: {
                //     type: 'image/jpeg'
                // }
            
            });

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
						jQuery(media_holder).after('<input type="hidden" name="arms_uploaded[]" value="'+attachments[i].id+'">');
					}
					
					jQuery(current_parent).find('.remove-image-button').show();

				}else{

					var attachment = mediaUploader.state().get('selection').first().toJSON();
					jQuery(current_parent).find('.upload-image-button').removeClass('button button-primary').addClass('button button-default').html('Edit');
					var img = '<img src="' + attachment.url + '" width="100px" alt="user avatar" />';
					jQuery(media_holder).html(img);
					jQuery(hd_image_id).val( attachment.id );
					jQuery(current_parent).find('.remove-image-button').show();
				}

                // if (attachment.mime && attachment.mime.indexOf('image/jpeg') !== -1) {
                //     jQuery(current_parent).find('.upload-image-button').removeClass('button button-primary').addClass('button button-default').html('Edit');
                //     var img = '<img src="' + attachment.url + '" width="100px" alt="user avatar" />';
                //     jQuery(media_holder).html(img);
                //     jQuery(hd_image_id).val( attachment.id );
                //     jQuery(current_parent).find('.remove-image-button').show();
                // } else {
                //     alert('لطفاً تصویر با فرمت JPEG آپلود کنید.');
                // }
			});
			// Open the uploader dialog
			mediaUploader.open();
		});

        jQuery(document).on( 'click', '.remove-image-button', function( event ) {
			event.preventDefault();
			var $this = jQuery( this );
			$this.parent().find('.upload_image').html( '' );
			$this.parent().find('.upload-image-button').removeClass('button button-default').html('Edit');
			$this.parent().find('.upload-image-button').addClass('button button-primary').html('open sari');

			$this.parent().find('.remove-image-button').hide();
			$this.parent().find('.upload_image_id').val( 0 );
		} );

    });


})( jQuery );