//Función inicial
var inicioApp = function()
{
	var altas = function()
	{
		$("#secAltaAlumnos").show("slow");
	}

	var GuardaAltaAlumno = function()
	{
		var ncontrol  = $("#txtNControl").val();
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
		$.ajax({
			
		});

	}

	//Cuando damos clic en el botón btnAltas
	//se dispara la función: altas.
	$("#btnAltas").on("click",altas);
	$("#frmAltaAlumnos").on("submit",GuardaAltaAlumno);
}
//Al estar listo el documento dispara
//la función inicial.
$(document).on("ready",inicioApp);


