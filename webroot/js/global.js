$(document).ready(function(){
	$('.select2').select2({ width: '100%'});

	$("div#solution-dropzone").dropzone({ 
			url: $("div#solution-dropzone").data('action'),
		}).addClass('dropzone');
	

	tinymce.init({
	    selector: '.wysiwyg',
	    height: 300,
        menubar: false,
        toolbar: 'undo redo | styleselect | bullist numlist outdent indent | link image',
	});
});