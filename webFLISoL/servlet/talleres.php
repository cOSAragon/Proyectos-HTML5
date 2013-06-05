<?php
/*
	Operaciones con talleres del FLISoL 2013
	----------------------------------------

	?sol=listar devuelve información básica de los talleres existentes, haya cupo o no
	?sol=info devuelve todos los datos registrados de un taller, en caso de requerir mayor información del mismo
	?sol=registrar guarda la información de un taller para su posterior inscripción
	?sol=inscribir reserva un lugar para el taller y el usuario indicado
	?sol=cupo devuelve información indicando el cupo utilizado y disponible de un taller indicado

	El parámetro *sol* debe mandarse como GET pero los demás datos deben ser POST por privacidad.
	Este script JAMÁS debe ser llamado por sí solo. NO ES AMIGABLE AL USUARIO FINAL.
*/

	@require_once('bases.php');
	if (!conectar())
		echo json_encode(array('coderror' => 1, 'coderrdesc' => 'No pudimos conectarte a la base de datos. Prueba nuevamente.'));

	switch ($_GET['sol']) {
		case 'listar':
			ListarEventos();
			break;

		case 'info':
			InfoTaller($_POST['id']);
			break;

		case 'registrar':
			NuevoTaller();
			break;

		case 'inscribir':

			break;

		case 'cupo':

			break;

		default:
			echo json_encode(array('coderror' => 2, 'coderrdesc' => 'La opción es incorrecta. Prueba nuevamente con otros parámetros.'));

	}

	function ListarEventos() {
		$query = mysql_query('SELECT id, nombre, descripcion, ponente FROM eventos');
		if ($query !== false)
			echo json_encode(array('coderror' => 0, 'coderrdesc' => 'Operación satisfactoria.', 'content' => mysql_fetch_array($query)));
		else
			echo json_encode(array('coderror' => 3, 'coderrdesc' => 'La selección de eventos falló. Prueba nuevamente.'));
	}

	function InfoTaller($tallerid) {
		$query = mysql_query('SELECT * FROM eventos WHERE id = $tallerid');
		if ($query !== false)
			echo json_encode(array('coderror' => 0, 'coderrdesc' => 'Operación satisfactoria.', 'content' => mysql_fetch_array($query)));
		else
			echo json_encode(array('coderror' => 3, 'coderrdesc' => 'La selección de evento falló. Prueba nuevamente.'));
	}

	function InscribirUsuario($usuarioid) {

	}

	function NuevoTaller() {
		$usuario = 'ponencias13';
		$contraseña = 'FlIsOl!130429';

		// Si el inicio de sesión fue correcto, anexar la información a la base de datos
		if ($_POST['user'] === $usuario && $_POST['pass'] === $contraseña) {
			
			// Verificar si el alias del usuario ya existe
			$qexiste = mysql_query("SELECT * FROM usuarios WHERE alias = '{$_POST['ausuario']}'");
			if (mysql_num_rows($qexiste) > 0) {
				echo json_encode(array('coderror' => 2, 'coderrdesc' => 'El alias ya existe. Elige otro.'));
				return;
			}

			// Añadir usuario como ponente a la lista
			$qusuario = mysql_query("INSERT INTO usuarios (nombre, alias, correo, escuela, ponente) VALUES ({$_POST['usuario']}, {$_POST['ausuario']}, {$_POST['correo']}, {$_POST['escuela']}, 1)");

			if ($qusuario) {
				// Buscar al usuario recién añadido para obtener su id
				$idponente = mysql_query("SELECT id FROM usuarios WHERE alias = {$_POST['ausuario']}");

				// Registrarle al usuario su ponencia con los datos ya validados
				$qevento = mysql_query("INSERT INTO eventos (nombre, ponente, taller, alias, fecha, descripcion, contenido, cupo) VALUES ({$_POST['nombre']}, $idponente, {$_POST['taller']}, {$_POST['aevento']}, {$_POST['fecha_i']}" . "{$_POST['fecha_f']}, {$_POST['desc']}, {$_POST['conte']}, {$_POST['cupo']})");
				if ($qevento) {
					echo json_encode(array('coderror' => 0, 'coderrdesc' => 'Usuario y ponencias registrados. ¡Bienvenido al FLISoL Aragón!'));
				}
				else {
					echo json_encode(array('coderror' => 5, 'coderrdesc'=> 'Usuario registrado, evento no registrado. Prueba nuevamente.'));
				}

			}
			else {
				echo json_encode(array('coderror' => 4, 'coderrdesc'=> 'Un error ha evitado que se registre tu usuario. Prueba nuevamente.'));
			}
		}

		else {
			echo json_encode(array('coderror' => 3, 'coderrdesc' => '¿Seguro que eres ponente? Tus credenciales no me lo aseguran.'));
		}
	}


	function AunHayCupo($tallerid) {
		
	}

	function ObtenerID($arreglodatos) {

	}
?>