<?php 

function GuardaAltaAlumno()
{
	$nco = "'".$_POST["ncontrol"]."'";
	$nom = "'".$_POST["nombres"]."'";
	$app = "'".$_POST["apellidop"]."'";
	$apm = "'".$_POST["apellidom"]."'";
	$car = $_POST["carrera"];
	$sem = $_POST["semestre"];
	$pro = $_POST["promedio"];
	$est = "'".$_POST["estatus"]."'";
	$con = mysql_connect("localhost","root","");
	mysql_select_db("otrapw10");
	$consulta = sprintf("insert into alumnos values(%s,%s,%s,%s,%d,%d,%d,%s)",$nco,$nom,$app,$apm,$car,$sem,$pro,$est);
	mysql_query($consulta);
	$respuesta = false; //Enviar al JS.
	if(mysql_affected_rows()>0)
	{
		$respuesta = true;
	}
	//Enviamos los datos al JavaScript.
	$salidaJSON = array('respuesta' => $respuesta);
	print json_encode($salidaJSON);
}

function GuardaCambioAlumno()
{
	$nco = "'".$_POST["ncontrol"]."'";
	$nom = "'".$_POST["nombres"]."'";
	$app = "'".$_POST["apellidop"]."'";
	$apm = "'".$_POST["apellidom"]."'";
	$car = $_POST["carrera"];
	$sem = $_POST["semestre"];
	$pro = $_POST["promedio"];
	$est = "'".$_POST["estatus"]."'";
	$con = mysql_connect("localhost","root","");
	mysql_select_db("otrapw10");
	$consulta = sprintf("update alumnos set nombres=%s,apellidopaterno=%s,apellidomaterno=%s,clavecarrera=%d,semestre=%d,promedio=%d,estatus=%s where ncontrol=%s",$nom,$app,$apm,$car,$sem,$pro,$est,$nco);
	mysql_query($consulta);
	$respuesta = false; //Enviar al JS.
	if(mysql_affected_rows()>0)
	{
		$respuesta = true;
	}
	//Enviamos los datos al JavaScript.
	$salidaJSON = array('respuesta' => $respuesta);
	print json_encode($salidaJSON);
}

$orden = $_POST["orden"];
switch ($orden) {
	case 'GuardaAltaAlumno':
		GuardaAltaAlumno();
		break;
	case 'GuardaCambioAlumno':
		GuardaCambioAlumno();
		break;
	default:
		# code...
		break;
}
?>










