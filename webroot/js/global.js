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

  $('#croppingModal').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget);
	  var source = button.data('src');
	  var modal = $(this);
	  modal.find('.modal-body #cropping_img').attr('src',source);
	  modal.find('.modal-body #cropping_img').Jcrop({
		aspectRatio: 1.6,
		keySupport: false,
		onSelect: showCoords,
        onChange: showCoords
	});
  });
                  
});

function showCoords(c) {
 console.dir(c);
}

function sendCropping() {
	
}