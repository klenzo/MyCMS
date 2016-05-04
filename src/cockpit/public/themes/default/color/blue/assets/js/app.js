tinymce.init({
	selector: '.myTinyMCE',
	menubar: false,
	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
});

tinymce.activeEditor.uploadImages(function(success) {
	$.post('/../ajax/post-image.php', tinymce.activeEditor.getContent()).done(function() {
		alert("Uploaded images and posted content as an ajax request.");
	});
});

$(function(){

	$('.liAside').click(function(e){
		// e.preventDefault();
		$(this + ' > .subAside').slideToggle();
	});

	$('form.form-ajax').submit(function(e) {
		e.preventDefault();
		alert(e);
		console.log(e);
		var tourl = $(this).attr('action');
		var method = $(this).attr('method');
		var datas = $(this).serialize();

		// $.ajax({
		// 	url: tourl,
		// 	method: method,
		// 	data: { datas }
		// }).done(function( msg ) {
		// 	alert( "Data Saved: " + msg );
		// });
	});

});