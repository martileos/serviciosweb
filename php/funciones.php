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

function consultas()
{
	$con = mysql_connect("localhost","root","");
	mysql_select_db("otrapw10");
	$consulta = sprintf("select * from alumnos");
	$resultado = mysql_query($consulta);
	$renglones = "<tr>";
	$renglones.= "<th>Num.Control</th><th>Nombre(s)</th>";
	$renglones.= "</tr>";
	$respuesta = false;
	while ($registro = mysql_fetch_array($resultado)) 
	{
		$respuesta = true;
		$renglones.= "<tr>";
		$renglones.="<td>".$registro["ncontrol"]."</td><td>".$registro["nombres"]."</td>";
		$renglones.= "</tr>";
	}
	$salidaJSON  = array('respuesta' => $respuesta, 'renglones'=>$renglones);
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
	case 'consultas':
		consultas();
		break;
	default:
		# code...
		break;
}
?>










