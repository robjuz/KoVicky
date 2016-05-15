$(document).ready(function(){

	$("div#problem-dropzone").dropzone({ 
			url: $("div#problem-dropzone").data('action'),
	}).addClass('dropzone');

	$("div#problem-image-dropzone").dropzone({ 
			url: $("div#problem-image-dropzone").data('action'),
	}).addClass('dropzone');
	

	tinymce.init({
	    selector: '.wysiwyg',
	    height: 300,
        menubar: false,
        toolbar: 'undo redo | styleselect | bullist numlist outdent indent | link image',
	});

  $('.select2').select2();
                  
});