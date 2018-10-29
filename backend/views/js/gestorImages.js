
jQuery(document).ready(function($){

	Dropzone.options.myDrop = {
		uploadMultiple:true,
		maxFileSize: 3,
		acceptedFiles: 'images/*',
		init:function(){
			this.on('error', function(){
				alert("Error al subir los archivos");
			});
		}
	}

});