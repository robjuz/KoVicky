$(document).ready(function(){
	$('.select2').select2({ width: '100%'});
	
	tinymce.init({
	  selector: '.wysiwyg',
	  height: 300,
	  plugins: [
	    'advlist autolink lists link image imagetools charmap print anchor',
	    'searchreplace visualblocks fullscreen',
	    'insertdatetime media table contextmenu paste jbimages'
	  ],
	  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages',
	  imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
	  content_css: [
	    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
	    '//www.tinymce.com/css/codepen.min.css'
	  ],
	});
});