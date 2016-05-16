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
		onSelect: setCoords,
        onChange: setCoords
	});
  });

  $('#crop_btn').click( sendCropping );
                  
});

function setCoords(c) {
	$(' #cropping_img').data(c);
}

var sendCropping = function() {
	var data = $('#cropping_img').data();
	data.Jcrop.destroy();
	data.image = $(' #cropping_img').attr('src');

	$.post( "/ko-vicky/admin/mediafiles/thumb", data).done( function( data ) {
	  $( ".result" ).html( data );
	  $('#croppingModal').modal('hide');
	});
}