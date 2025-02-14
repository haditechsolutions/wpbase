(function($){


    $(document).ready(function(e){

        
        var mediaUploader;var $this;
		jQuery(document).on( 'click','.upload-image-button', function ( event ) {
			event.preventDefault();
			$this = jQuery( this ),
				current_parent = jQuery(this).closest('.admin-replay-message-aramis-ticket');
				media_holder = jQuery(current_parent).find('.avatar_image');
				// hd_image_id = jQuery(current_parent).find('.upload_image_id');

			// If the uploader object has already been created, reopen the dialog
			if (mediaUploader) {
				mediaUploader.open();
				return;
			}
           
			// Extend the wp.media object
			mediaUploader = wp.media.frames.file_frame = wp.media({
				title: 'انخاب تصویر',
				button: {
				text: 'انتخاب',
			    },
                multiple: true,
                // library: {
                //     type: 'image/jpeg'
                // }
            
            });

			// When a file is selected, grab the URL and set it as the text field's value
			mediaUploader.on('select', function() {
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
              
			});
			mediaUploader.open();
		});

        jQuery(document).on( 'click', '.remove-image-button', function( event ) {
            alert(321);
			event.preventDefault();
			var $this = jQuery( this );
			current_parent = $this.closest('.admin-replay-message-aramis-ticket');
			current_parent.find('.avatar_image').html( '' );
			current_parent.find('input[name="arms_uploaded[]"]').remove();
			$this.parent().find('.upload-image-button').removeClass('button button-default').html('بارگزاری مجدد');
			$this.parent().find('.upload-image-button').addClass('button button-primary').html('open sari');

			$this.parent().find('.remove-image-button').hide();
			$this.parent().find('.upload_image_id').val( 0 );
		} );

    });


})( jQuery );