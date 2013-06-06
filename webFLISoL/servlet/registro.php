<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro de actividades mamalonas</title>
</head>

<body>
	<form action="" method="post">
    	<input name="user" type="text" placeholder="Nombre de usuario" /><br />
        <input name="pass" type="password" placeholder="Password"/><br />
        <input type="submit" value="Enviar" />
    </form>
    <?php if(!isset($a))
    {
		echo 'Date de alta como usuario<br>';
		echo 'Da de alta tu conferencia/taller<br>';
		echo'<form action="" method="post">
		<input name="evento" type="text" placeholder="Título del evento" maxlength="60" /><br>
		Taller <input name="taller" type="radio" value="1" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Conferencia <input name="taller" type="radio" value="0" /><br>
		<input name="aevento" type="text" maxlength="30" placeholder="Nombre corto de evento" /><br>
		Horario: De: <select name="fecha_i size="1">
						<option value="1000">10:00 A.M.</option>
						<option value="1030">10:30 A.M.</option>
						<option value="1100">11:00 A.M.</option>
						<option value="1130">10:30 A.M.</option>
						<option value="1200">12:00 P.M.</option>
						<option value="1230">12:30 P.M.</option>
						<option value="1300">1:00 P.M.</option>
						<option value="1330">1:30 P.M.</option>
						<option value="1400">2:00 P.M.</option>
						<option value="1430">2:30 P.M.</option>
						<option value="1500">3:00 P.M.</option>
						<option value="1530">3:30 P.M.</option>
						<option value="1600">4:00 P.M.</option>
						<option value="1630">4:30 P.M.</option>
						<option value="1700">5:00 P.M.</option>
						<option value="1730">5:30 P.M.</option>
						<option value="1800">6:00 P.M.</option>
					 </select>" 
					 a: <select name="fecha_f size="1">
						<option value="1100">11:00 A.M.</option>
						<option value="1130">11:30 A.M.</option>
						<option value="1200">12:00 P.M.</option>
						<option value="1230">12:30 P.M.</option>
						<option value="1300">1:00 P.M.</option>
						<option value="1330">1:30 P.M.</option>
						<option value="1400">2:00 P.M.</option>
						<option value="1430">2:30 P.M.</option>
						<option value="1500">3:00 P.M.</option>
						<option value="1530">3:30 P.M.</option>
						<option value="1600">4:00 P.M.</option>
						<option value="1630">4:30 P.M.</option>
						<option value="1700">5:00 P.M.</option>
						<option value="1730">5:30 P.M.</option>
						<option value="1800">6:00 P.M.</option>
						<option value="1830">6:30 P.M.</option>
						<option value="1900">7:00 P.M.</option>
					 </select><br>
		<input name="desc" type="text" maxlength="60" placeholder="Descripción rápida" /><br>
		<textarea name="conte" placeholder="Descripción detallada del evento"></textarea><br>
		Cupo: <input name="cupo" type="text" maxlength="3" /><br>
		<input name="envc" type="submit" value="Enviar" />
		</form>';
    }
	?>
     
</body>
</html>