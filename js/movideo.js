(function($){
	$(document).ready(function(){

		var iframe = jQuery('<iframe frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>');
		var dialog = jQuery("<div></div>").append(iframe).appendTo("body").dialog({
				autoOpen: false,
				modal: true,
				resizable: true,
				width: 900,
				height: "auto",
				close: function () {
						iframe.attr("src", "");
				},
				buttons: {
						'Submit': function(){
								$(this).dialog('close');
								//alert(iframe.contents().find('#result-video-id').val());
								if(iframe.contents().find('#result-video-type').val()=='video'){
									var key = iframe.contents().find('#result-video-key').val();
									$('#edit-field-media-id-und-' + key + '-movideo-media-id').val(iframe.contents().find('#result-video-id').val());
								}else{
										$('#edit-field-playlist-id-und-0-value').val(iframe.contents().find('#result-video-id').val());
								}

						},
						'Close': function(){
								$(this).dialog('close');
								//callback(false);
						}
				}
		});
		jQuery(".movideo-browse").on("click", function (e) {
				e.preventDefault();
				var src = jQuery(this).attr("href");
				iframe.attr({
						width: 900,
						height: 400,
						src: src
				});
				dialog.dialog("option", "title", 'Movideo Search').dialog("open");
		});

		//build player widget
		$('.movideo-player').each(function() {
			var movideo_api = this.getAttribute("data-apikey");
			var movideo_ios_alias = this.getAttribute("data-iosappalias");
			var movideo_flash_alias = this.getAttribute("data-flashappalias");
			var movideo_mId = this.getAttribute("data-media-id");
			$('.movideo-player').player({
				apiKey: movideo_api,
				iosAppAlias: movideo_ios_alias,
				flashAppAlias: movideo_flash_alias,
				mediaId: movideo_mId,
			});
		});

	});
})(jQuery);
