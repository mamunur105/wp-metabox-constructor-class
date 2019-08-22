(function($){
	'use strict';
	$(document).ready(function(){

		var frame;
		// console.log('oK');
		$(".gallery_upload_images").on("click",function() {

			var $this = $(this).parent().parent();
			// $this.find('.images-container').css({'color':"red"});
			// e.preventDefault();
			// alert('Clicked');
			if (frame) {
				frame.open();
				return false;
			}
			frame = wp.media({
				title:"Upload Images",
				button:{
					text:"Select Images"
				},
				multiple:'add'

			});
			frame.on('select',function(){
				var attacment_images = frame.state().get('selection').toJSON();

				$this.find('.images-container').html('');
				var image_ids = [],
					images_urls =[];
				for (var i in attacment_images) {
					var image = attacment_images[i];
					image_ids.push(image.id);
					images_urls.push(image.url);
					$this.find('.images-container').append('<img style="max-width:200px;padding:10px;float:left;" src="'+image.sizes.thumbnail.url+'" />'); 
				}

				
				$this.find('.omb_images_url').val(images_urls.join(";"));

				// console.log(attacment_images);
			});
			frame.open();
		return false; 
		});


		var image_frame;

		$('.mcc-box__field-container').on('click', '.js-mcc-box-image-upload-button', function(e){
			e.preventDefault();

			image_frame = wp.media.frames.image_frame = wp.media({library: {type: 'image'}});
			image_frame.open();

			var id = $(this).data('hidden-input').replace(/(\[|\])/g, '\\$1');
			console.log(id);

			image_frame.on('select', function() {
				var attachment = image_frame.state().get('selection').first().toJSON();
				console.log(id);
				$('#image-'+id).val(attachment.url);

				$('#js-'+id+'-image-preview').removeClass('is-hidden').attr('src', attachment.url);

				$('.js-mcc-box-image-upload-button').text('Change Image');

				$('#'+id).css({background: 'red'});
			});

			image_frame.open();

		});

		$('.mcc-box__field-container').on('click', '.mcc-box-repeated-header', function(){
			$(this).siblings('.mcc-box__repeated-content').toggleClass('is-hidden');
		});

		$('.mcc-box__repeated-blocks').on('click', '.mcc-box__remove', function() {
			$(this).closest('.mcc-box__repeated').remove();
			return false;
		});

		$('.mcc-box__repeated-blocks').sortable({
			opacity: 0.6, 
			revert: true, 
			cursor: 'move', 
			handle: '.js-mcc-box-sort'
		});

	});



})(jQuery);
