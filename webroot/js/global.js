$(document).ready(function(){
	$('.select2').select2({ width: '100%'});
	
	tinymce.init({
	    selector: '.wysiwyg',
	    height: 300,
        menubar: false,
        toolbar: 'undo redo | styleselect | bullist numlist outdent indent | link image',
	});
});