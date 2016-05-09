$(document).ready(function(){

	$("div#solution-dropzone").dropzone({ 
			url: $("div#solution-dropzone").data('action'),
		}).addClass('dropzone');
	

	tinymce.init({
	    selector: '.wysiwyg',
	    height: 300,
        menubar: false,
        toolbar: 'undo redo | styleselect | bullist numlist outdent indent | link image',
	});

	var cropperOptions = {
			zoomFactor:10,
			doubleZoomControls:false,
			rotateControls:false,
			processInline:true,
			outputUrlId:'photo-url',
			cropUrl:'/ko-vicky/admin/problems/save-image',
			onBeforeImgUpload: function(){$('#image-upload img').remove();}
		}
		
		var cropperHeader = new Croppic('image-upload', cropperOptions);
});