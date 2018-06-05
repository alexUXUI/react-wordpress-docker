var builderio_file_frame;

jQuery(function($){
  ////////////////////////////////

      // Uploads

      jQuery(document).on('click', 'input.select-img', function( event ){

        var $this = $(this);

        event.preventDefault();

        var BuilderioImage = wp.media.controller.Library.extend({
            defaults :  _.defaults({
                    id:        'builderio-insert-image',
                    title:      $this.data( 'uploader_title' ),
                    allowLocalEdits: false,
                    displaySettings: true,
                    displayUserSettings: false,
                    multiple : false,
                    library: wp.media.query( { type: 'image' } )
              }, wp.media.controller.Library.prototype.defaults )
        });

        // Create the media frame.
        builderio_file_frame = wp.media.frames.builderio_file_frame = wp.media({
          button: {
            text: jQuery( this ).data( 'uploader_button_text' )
          },
          state : 'builderio-insert-image',
              states : [
                  new BuilderioImage()
              ],
          multiple: false  // Set to true to allow multiple files to be selected
        });

        // When an image is selected, run a callback.
        builderio_file_frame.on( 'select', function() {

          var state = builderio_file_frame.state('builderio-insert-image');
          var selection = state.get('selection');
          var display = state.display( selection.first() ).toJSON();
          var obj_attachment = selection.first().toJSON();
          display = wp.media.string.props( display, obj_attachment );

          var image_field = $this.siblings('.img');
          var imgurl = display.src;

          // Copy image URL
          image_field.val(imgurl);
          image_field.trigger('change');
          // Show in preview.
          var image_preview_wrap = $this.siblings('.builderio-preview-wrap');
          var image_html = '<img src="' + imgurl+ '" alt="" style="max-width:100%;max-height:150px;" />';
          image_preview_wrap.html( image_html );
          // Show Remove button.
          var image_remove_button = $this.siblings('.btn-image-remove');
          image_remove_button.css('display','inline-block');

        });

        // Finally, open the modal
        builderio_file_frame.open();
      });

      // Remove image.
      jQuery(document).on('click', 'input.btn-image-remove', function( e ) {

        e.preventDefault();
        var $this = $(this);
        var image_field = $this.siblings('.img');
        image_field.val('');
        var image_preview_wrap = $this.siblings('.builderio-preview-wrap');
        image_preview_wrap.html('');
        $this.css('display','none');
        image_field.trigger('change');

      });
	  
	  if($('.cover-image .builderio-upload-btn').length){
		  $(".builderio-upload-btn").css({ 'margin-top': "10px" });
		}
		if($('.cover-image .builderio-remove-btn').length){
		  $(".builderio-remove-btn").css({ 'margin-top': "10px" });
		}
	
  ////////////////////////////////
});