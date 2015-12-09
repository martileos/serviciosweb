//Función inicial
var inicioApp = function()
{
	var altas = function()
	{
		$("body > section").hide("slow");
		$("#secAltaAlumnos").show("slow");
	}

	var GuardaAltaAlumno = function()
	{
		var ncontrol  = $("#txtNumControl").val();
		var nombres   = $("#txtNombres").val();
		var apellidop = $("#txtApellidoPat").val();
		var apellidom = $("#txtApellidoMat").val();
		var carrera   = $("#txtClaveCarrera").val();
		var semestre  = $("#txtSemestre").val();
		var promedio  = $("#txtPromedio").val();
		var estatus   = $("#txtEstatus").val();
		var parametros = "orden=GuardaAltaAlumno"+
						 "&ncontrol="+ncontrol+
						 "&nombres="+nombres+
						 "&apellidop="+apellidop+
						 "&apellidom="+apellidom+
						 "&carrera="+carrera+
						 "&semestre="+semestre+
						 "&promedio="+promedio+
						 "&estatus="+estatus;
		//Conexión con el PHP.
		$.ajax({
			cache: false, 
			type: "POST",
			dataType: "json",
			url: "php/funciones.php",
			data: parametros,
			success: function(response){
				if(response.respuesta == true)
				{
					alert("Registro guardado");
				}
				else
					alert("No se pudo guardar");
			},
			error: function(xhr,ajaxOptions,thrownError){
				console.log("Ocurre un error");
			}
		});

	}
	var cambios = function()
	{
		$("body > section").hide("slow");
		$("#secCambioAlumnos").show("slow");
	}

	var GuardaCambioAlumno = function()
	{
		var ncontrol  = $("#txtNumControl2").val();
		var nombres   = $("#txtNombres2").val();
		var apellidop = $("#txtApellidoPat2").val();
		var apellidom = $("#txtApellidoMat2").val();
		var carrera   = $("#txtClaveCarrera2").val();
		var semestre  = $("#txtSemestre2").val();
		var promedio  = $("#txtPromedio2").val();
		var estatus   = $("#txtEstatus2").val();
		var parametros = "orden=GuardaCambioAlumno"+
						 "&ncontrol="+ncontrol+
						 "&nombres="+nombres+
						 "&apellidop="+apellidop+
						 "&apellidom="+apellidom+
						 "&carrera="+carrera+
						 "&semestre="+semestre+
						 "&promedio="+promedio+
						 "&estatus="+estatus;
		//Conexión con el PHP.
		$.ajax({
			cache: false, 
			type: "POST",
			dataType: "json",
			url: "php/funciones.php",
			data: parametros,
			success: function(response){
				if(response.respuesta == true)
				{
					alert("Registro actualizado");
				}
				else
					alert("No se pudo actualizar");
			},
			error: function(xhr,ajaxOptions,thrownError){
				console.log("Ocurre un error");
			}
		});

	}

	//Cuando damos clic en el botón btnAltas
	//se dispara la función: altas.
	$("#btnAltas").on("click",altas);
	$("#frmAltaAlumnos").on("submit",GuardaAltaAlumno);
	$("#btnCambios").on("click",cambios);
	$("#frmCambioAlumnos").on("submit",GuardaCambioAlumno);

}
//Al estar listo el documento dispara
//la función inicial.
$(document).on("ready",inicioApp);








