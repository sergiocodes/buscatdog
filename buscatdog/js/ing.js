(function() {
	'use strict';

	window.addEventListener('load', function() {
	  // Fetch all the forms we want to apply custom Bootstrap validation styles to
	  var forms = document.getElementsByClassName('form-signin');
	  // Loop over them and prevent submission
	  var validation = Array.prototype.filter.call(forms, function(form) {
	    form.addEventListener('submit', function(event) {
	      if (form.checkValidity() === false) {
	        event.preventDefault();
	        event.stopPropagation();
	        alert("false");
	      }
          if (form.checkValidity() === true) {
            event.preventDefault();
            envio_datos_login();
          }
	    }, false);
	  });
	}, false);
})();


$(document).ready(function(){
	// seccion del mensaje de error
	$("#error-msj").hide(); // ocultar el mensaje de error inicialmente
	 // darle capacidades de ERROR y un texto ejemplo
	// accion al realizar Click PERO hay que mejorar

});

function envio_datos() {
	// Esta es una ruta relativa que se considera desde donde esta el archivo html NO el js.
	var url = "./Controller/c_index.php";
	$.ajax({
		type: "post",
		url: url,
		dataType : "json",
		data: {nombre: $("#idnombre").val(), paterno: $("#idpaterno").val(), materno: $("#idmaterno").val(), email: $("#idemail").val(),funcion: 1},

		success: function(datos) {
			// alert(datos);
			if(datos == 1){ // login correcto va a su inicio
				$(location).attr('href','index.php');
			}
		},
		error: function(datos) {
			//alert(datos);
            alert("Error de BD y conexion");
        } 
	});
}