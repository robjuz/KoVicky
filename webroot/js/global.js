$(document).ready(function(){

	$("div#problem-dropzone").dropzone({ 
			url: $("div#problem-dropzone").data('action'),
		}).addClass('dropzone');
	

	tinymce.init({
	    selector: '.wysiwyg',
	    height: 300,
        menubar: false,
        toolbar: 'undo redo | styleselect | bullist numlist outdent indent | link image',
	});

  $("#image-upload").PictureCut({
	    InputOfImageDirectory	: "photo",
	    PluginFolderOnServer    : "/ko_vicky/js/picturecut/",
	    FolderOnServer          : "/uploads/",
	    EnableCrop              : true,
	    CropWindowStyle         : "Bootstrap",
	    CropModes				: {
						            widescreen: true,
						            letterbox: false,
						            free   : false
						        },
		CropOrientation : false,
		DefaultImageButton : $("#image-upload").data('image-url'),
		ImageButtonCSS : {
			              	border:"1px #CCC solid",
			              	width : '100%',
			              	height: 300,
			            }
  });

  $('.select2').select2();
                  
});