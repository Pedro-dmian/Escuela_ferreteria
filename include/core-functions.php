<?php

/* EXECUTE ANY QUERY FOR INSERT-UPDATE-DELETE */
	
	## EJECUTAR CONSULTA RETORNAR ID
	function executeQuery($query) {
		try {
		    $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
		    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $stmt = $conn->prepare($query);
			$stmt->execute();
			$id   = $conn->lastInsertId();
			return $id;
		} catch(Exception $e) {
		    echo "Query: " . $query ." /nError: ". $e->getMessage();
		    die();
		}

	}

	## EJECUTAR CONSULTA Y RETORNA DATOS
	function exeQuery($query) {
		try {
		    $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
		    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $stmt = $conn->prepare($query);
			$asnw = $stmt->execute();
			return $asnw;
		} catch(Exception $e) {
		    echo "Query: " . $query ." /nError: ". $e->getMessage();
		    die();
		}
	}

	## RETORNA LOS ROWS AFECTADAS
	function updateQuery($query) {
		try {
		    $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
		    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    /* Delete all rows from the FRUIT table */
			$stmt = $conn->prepare($query);
			$stmt->execute();
			return $stmt->rowCount();;
		} catch(Exception $e) {
		    echo "Query: " . $query ." /nError: ". $e->getMessage();
		    die();
		}
	}

/* SELECT AND RETURN */

	# SELECCION DE DATOS "REGRESAR"
	function fecthAllfromQuery($query) {
	    try {
	        $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
	        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $stmt = $conn->prepare($query);
	        $stmt->execute();

	        #set the resulting array to associative
	        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	        $resultado = $stmt->fetchAll();
	        return ($resultado);
	    } catch (PDOException $e) {
	        echo "Query: " . $query . " /nError: " . $e->getMessage();
	    }
	}

	## EJECUTAR CONSULTA RETORNAR ID
	function insertQuery($query, $vals) {
		try {
		    $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
		    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $stmt = $conn->prepare($query);
			$stmt->execute($vals);
			$id   = $conn->lastInsertId();
			return $id;
		} catch(Exception $e) {
		    echo "Query: " . $query ." /nError: ". $e->getMessage();
		    die();
		}

	}
	# SELECCION DE DATOS "REGRESAR"
	function fecthfromQuery($query, $vals) {
	    try {
	        $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
	        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $stmt = $conn->prepare($query);
	        $stmt->execute($vals);
	        #set the resulting array to associative
	        $res 	= $stmt->setFetchMode(PDO::FETCH_ASSOC);
	        $rest 	= $stmt->fetchAll();
	        return ($rest);
	    } catch (PDOException $e) {
			echo "Query: " . $query . " /nError: " . $e->getMessage();
	    }
	}


/*  FETCH ALL */

	function fecthFromID($query, $id) {
	    try {
	        $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
	        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $stmt = $conn->prepare($query);
	        $stmt->bindParam(':id', $id);
	        $stmt->execute();            // set the resulting array to associative
	        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	        $resultado = $stmt->fetchAll();
	        return ($resultado[0]);
	    } catch (PDOException $e) {
	        echo "Query: " . $query . " /nError: " . $e->getMessage();
	    }
	}

	
	## BUSCAR TODO 
	function doesQueryExist($query) {
	    try {
	        $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
	        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
	        $stmt = $conn->prepare($query);
	        $stmt->execute();
		    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		    $resultado = $stmt->fetchColumn(0);
			return ($resultado);
		} catch(Exception $e) {
		    echo "Query: ".$query." Error: ".$e->getMessage();
		    die();
		}
	}

	
/* RETURN ALL FROM TABLE */
	## DEVOLVER DATOS DE TABLA
	function fecthAllfromTable($table) {
        
        $query = "SELECT * FROM " . $table;

	    try {
	        $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
	        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $stmt = $conn->prepare($query);
	        $stmt->execute();

	        #set the resulting array to associative
	        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	        $resultado = $stmt->fetchAll();
	        return ($resultado);

	    } catch (PDOException $e) {
	        echo "Query: " . $query . " /nError: " . $e->getMessage();
	    }
	}

	function fecthAllActivesFromTable($table) {
		$query = "SELECT * FROM " . $table . " WHERE active = 1";

	    try {
	        $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
	        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $stmt = $conn->prepare($query);
	        $stmt->execute();

	        #set the resulting array to associative
	        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	        $resultado = $stmt->fetchAll();
	        return ($resultado);

	    } catch (PDOException $e) {
	        echo "Query: " . $query . " /nError: " . $e->getMessage();
	    }
	}

/* RETURN ALL FROM TABLE WHERE THE VALUE IS EQUAL TO THE COLUMN */
	## DEVUELVA TODO DE LA TABLA SI LOS VALORES SON IGUALES
	function fecthAllWhere($table,$table_id,$id_val) {
		try {		
		    $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $query = "SELECT * FROM ".$table." WHERE ".$table_id." = '".$id_val."'";
		    $stmt  = $conn->prepare($query); 
		    $stmt->execute();
		    #set the resulting array to associative
		    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		    $resultado = $stmt->fetchAll();
			return ($resultado);

		} catch(Exception $e) {
		    echo "Query: " . $query ." /nError: ". $e->getMessage();
		    die();
		}
	}

	function getRegisterFromTableWhere($table,$table_id,$id_val) {
		try {		
		    $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $query = "SELECT * FROM ".$table." WHERE ".$table_id." = '".$id_val."'";
		    $stmt  = $conn->prepare($query); 
		    $stmt->execute();
		    #set the resulting array to associative
		    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		    $resultado = $stmt->fetchAll();
		    if (!empty($resultado))
				return ($resultado[0]);
			else
				return false;
		} catch(Exception $e) {
		    echo "Query: " . $query ." /nError: ". $e->getMessage();
		    die();
		}
	}

	function fecthActiveAllWhere($table,$table_id,$id_val) {
		try {		
		    $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $query = "SELECT * FROM ".$table." WHERE ".$table_id." = '".$id_val."' AND active = 1";
		    $stmt  = $conn->prepare($query); 
		    $stmt->execute();
		    #set the resulting array to associative
		    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		    $resultado = $stmt->fetchAll();
			return ($resultado);

		} catch(Exception $e) {
		    echo "Query: " . $query ." /nError: ". $e->getMessage();
		    die();
		}
	}

/* RETURN VALUE FROM TABLE WHERE THE IDVAL IS EQUAL TO THE COLUMN */
	function fetchColumnWhere($table,$column,$table_id,$id_val) {
		
		try {		
		    $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $query = "SELECT ".$column." FROM ".$table." WHERE ".$table_id." = '".$id_val."'";
		    $stmt  = $conn->prepare($query); 
		    $stmt->execute();

		    #set the resulting array to associative
		    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		    $resultado = $stmt->fetchColumn(0);
			return ($resultado);

		}
		catch(PDOException $e) {
		    echo "Query: " . $query ." /nError: ".$e->getMessage();
		}

		$conn = null;

	}


/* RETURN FILTER FROM TABLE */
	function fetchFromTable($table,$filter) {
		
		try {		
		    $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $query = "SELECT * FROM ".$table." WHERE ".$filter;
		    $stmt  = $conn->prepare($query); 
		    $stmt->execute();

		    #set the resulting array to associative
		    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		    $result = $stmt->fetchAll();
			return ($result);
		}
		catch(PDOException $e) {
		    echo "Query: " . $query ." /nError: ".$e->getMessage();
		}

		$conn = null;

	}

/* RETURN COLUM FROM TABLE */
	function fetchColumnFromTable($table,$column,$filter) {
		
		try {		
		    $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $query = "SELECT ".$column." FROM ".$table." WHERE ".$filter;
		    $stmt  = $conn->prepare($query); 
		    $stmt->execute();

		    #set the resulting array to associative
		    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		    $resultado = $stmt->fetchColumn(0);
			return ($resultado);

		}
		catch(PDOException $e) {
		    echo "Query: " . $query ." /nError: ".$e->getMessage();
		}

		$conn = null;

	}


/* CHECK IF EXIST */
	## COMPROVACION DE EXISTENCIA DE ALGUN DATO CON CUALQUIER REQUERIMIENTO
	function doesExist($table,$table_id,$id_val) {

		$query = 'SELECT COUNT(*) FROM '.$table. ' WHERE '.$table_id.' = "'.$id_val.'" LIMIT 1';
		
		try {
		    $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
		    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
	        $stmt = $conn->prepare($query);
	        $stmt->execute();
		    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		    $resultado = $stmt->fetchColumn(0);
			return ($resultado);

		} catch(Exception $e) {
		    echo "Query: ".$query." Error: ".$e->getMessage();
		    die();
		}
	}

	## CODIGO DE VERIFICACION
	function verificationCode($username,$hash) {
		try {
		    $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
		    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        
			$query = 'SELECT * FROM st_users WHERE username = "'.$username.'" AND activation_code = "'.$hash.'"';
			
	        $stmt = $conn->prepare($query);
	        $stmt->execute();
	      	$coun = $stmt->rowCount();
	        return ($coun);


		} catch(Exception $e) {
		    echo "Query: ".$query." Error: ".$e->getMessage();
		    die();
		}
	}

	## CHEQUE DE VERIFICCION
	function verificationHash($email,$hash) {
		try {
		    $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
		    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        
			$query = 'SELECT * FROM ri_users WHERE email = "'.$email.'" AND hash_pass = "'.$hash.'"';
			
	        $stmt = $conn->prepare($query);
	        $stmt->execute();
	      	$coun = $stmt->rowCount();
	        return ($coun);


		} catch(Exception $e) {
		    echo "Query: ".$query." Error: ".$e->getMessage();
		    die();
		}
	}

	## EL USUARIO ESTA ACTIVO o no ENVIO POR EMAIL TAMBIEN
	function userIsActive($username) {

		try {
		    $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
		    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        
			$query = "SELECT * FROM st_users WHERE username = '".$username."' AND activation_code IS NULL";

			/*[24/08/2017] NUEVA AGREGADA VERIFICA SI ESTA ACTIVA POR INGRESANDO EL USERNAME O EMAIL "MODIFICAR EL FOMULARIO DE LOGIN SI ES NECESARIO QUITARLO"*/ 
			/*$query = "SELECT * FROM ri_users WHERE username = '".$username."' or email = '".$username."' AND activation_code IS NULL";*/
			
	        $stmt = $conn->prepare($query);
	        $stmt-> execute();
	      	$coun = $stmt->rowCount();
	        return ($coun);


		} catch(Exception $e) {
		    echo "Query: ".$query." Error: ".$e->getMessage();
		    die();
		}
	}

	## OBTENER EL NOMBRE COMPLETO
	function getFullNameOf($id_user) {

		$name 		= fetchColumnWhere(DB_PREFIX.'_users','name','id_user',$id_user);
		$lastname 	= fetchColumnWhere(DB_PREFIX.'_users','lastname','id_user',$id_user); 

		$fullname = $name.' '.$lastname;

		return $fullname;

	}

/* LOGS */
## INSERTAR REGISTRO
function insertLog($archive, $event, $comment, $color, $code = ''){

	$id_user = 1;#$_SESSION['id_user'];

	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	    $IP = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	    $IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
	    $IP = $_SERVER['REMOTE_ADDR'];
	}

	$queryLog 	= 'INSERT INTO rider_logs (IP, event, on_archive, comment, color, code, id_user) VALUES (:ip, :event, :archive, :comment, :color, :code, :id_user)';
	$valsLog  	= array('ip' => $IP, 'event' => $event, 'archive' => $archive, 'comment' => $comment, 'color' => $color, 'code' => $code, 'id_user' => $id_user);
	$id_log 	= insertQuery($queryLog, $valsLog);

	return $id_log;
}


/* NOTIFICATIONS */

/* type_to can be: general, shop, profile <- this decide where the notification takes the user */

## INSERTAR NOTIFICACIONES
	function insertNotification($id_user, $notification){

		$message = $notification['message'];
		$type_of = $notification['type'];

		if ($type_of == "" ) $type_of = 'general';

		$insert_notification = ("INSERT INTO ri_notifications (id_user, type_of, notification) VALUES ('".$id_user."', '".$type_of."', '".$message."')");

		executeQuery($insert_notification);

	}
## INSERTAR NOTIFICACION ROL
	function insertNotificationRol($id_user, $notification, $rol){

		$message = $notification['message'];
		$type_of = $notification['type'];

		if ($type_of == "" ) $type_of = 'general';

		$insert_notification = ("INSERT INTO ri_notifications (id_user, type_of, notification, rol) VALUES ('".$id_user."', '".$type_of."', '".$message."', '".$rol."')");

		exeQuery($insert_notification);

	}
	
## OBTENER NOTIFICACIONES DESACTIVADAS
	function getNotificationsOf($user){

		$query = "SELECT * FROM ri_notifications WHERE active = 1 AND rol = 4 AND id_user = ".$user;

		try {
		    $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $stmt = $conn->prepare($query); 
		    $stmt->execute();
		    #set the resulting array to associative
		    $result 	= $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		    $resultado 	= $stmt->fetchAll();
			return ($resultado);
		} catch(Exception $e) {
		    echo "Query: " . $query ." /nError: ". $e->getMessage();
		    die();
		}

	}
# OBTENER NOTIFICACIONES DE ROL
	function getNotificationsOfRol($rol){

		$query = "SELECT * FROM ri_notifications WHERE active = 1 AND rol = ".$rol;

		try {
		    $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $stmt = $conn->prepare($query); 
		    $stmt->execute();
		    #set the resulting array to associative
		    $result 	= $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		    $resultado 	= $stmt->fetchAll();
			return ($resultado);
		} catch(Exception $e) {
		    echo "Query: " . $query ." /nError: ". $e->getMessage();
		    die();
		}

	}

# OBTENER TODAS LAS NOTIFICAIONES DESACTIVADAS
	function getAllNotificationsOf($user){

		$query = "SELECT * FROM ri_notifications WHERE rol = 4 AND id_user = ".$user;

		try {
		    $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $stmt = $conn->prepare($query); 
		    $stmt->execute();
		    #set the resulting array to associative
		    $result 	= $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		    $resultado 	= $stmt->fetchAll();
			return ($resultado);
		} catch(Exception $e) {
		    echo "Query: " . $query ." /nError: ". $e->getMessage();
		    die();
		}

	}

# DESACTIVAR NOTIFICACIONES
	function deactivateNotification($id_user, $type_of){
		$deactivate_notfications = "UPDATE ri_notifications SET active = 0 WHERE id_user = '".$id_user."' AND type_of = '".$type_of."'";
		exeQuery($deactivate_notfications);
	}

# DESACTIVAR NOTIFICACIONES BY ROL
	function deactivateNotificationByRol($rol, $type_of){
		$deactivate_notfications = "UPDATE ri_notifications SET active = 0 WHERE rol = '".$rol."' AND type_of = '".$type_of."'";
		exeQuery($deactivate_notfications);
	}

# DEL NOTIFICACIONES
	function delNotifications(){
		$delefete_notifications = "DELETE FROM ri_notifications WHERE active = 0";
		executeQuery($delefete_notifications);
	}



/* PASSWORD & AUTENTICATION*/
	## INICIAR SESION
	function logIn($username, $password){

		$hashPass 	= fetchColumnWhere('st_users','password','username',$username);

		if (verifyUser($password, $hashPass)){

			$banned = fetchColumnWhere('st_users','banned','username',$username);

			if ($banned == 0){

				if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				    $ip = $_SERVER['HTTP_CLIENT_IP'];
				} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				} else {
				    $ip = $_SERVER['REMOTE_ADDR'];
				}
				
				$last_login = date('Y-m-d H:i:s');

				$insert_last_login = "UPDATE st_users SET last_login = '".$last_login."', last_ip = '".$ip."' WHERE username = '".$username."'";

				$update_user = exeQuery($insert_last_login);

				if($update_user){
					
					session_start();
					$_SESSION['username'] 	= $username;
					
					return [
					    'logged' => [
					        'error' => false,
					        'msg' => 'Sesión iniciada.'
					    ],
					];

				}else{
					return [
					    'logged' => [
					        'error' => true,
					        'msg' => $update_user
					    ],
					];
				}

			}else{

				return [
				    'logged' => [
				        'error' => true,
				        'msg' => 'Su usuario se encuentra deshabilitado. <br>Favor de hablar con su administrador.'
				    ],
				];

			}		

		} else {
			return [
			    'logged' => [
			        'error' => true,
			        'msg' => 'Nombre de usuario o contraseña incorrecta.'
			    ],
			];
		}
	}

	function getUserData($username) {
		
	}

	## CERRAR SESION
	function logOut(){
		
		session_start();

		$_SESSION['username'] 	= "";
		$_SESSION['id_user'] 	= "";
		
		session_destroy();
	}

	## GENERAR HASH
	function generateHash($password) {
	    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
	        $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
	        return crypt($password, $salt);
	    }
	}

	## VERIFICAR USUARIO
	function verifyUser($password, $hashedPassword) {
	    return crypt($password, $hashedPassword) == $hashedPassword;
	}

	## ACTIVAR CUENTA 
	function activateUsername($username,$hash){
		if (verificationCode($username,$hash) > 0){
			$query = "UPDATE st_users SET activation_code = NULL WHERE username = '".$username."'";
			executeQuery($query);		
			return true;
		}else{
			return false;
		}
	}

	## VERIFICAR PERMISO DEL ROL EN EL MÓDULO

	function checkPermission($user_role, $module_key) {
		$id_module = fetchColumnWhere('ri_modules','id_module','key_module',$module_key);

		try {		
		    $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $query = "SELECT permission FROM ri_permissions WHERE id_module = '".$id_module."' AND id_role = '".$user_role."'";
		    $stmt  = $conn->prepare($query); 
		    $stmt->execute();

		    #set the resulting array to associative
		    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		    $resultado = $stmt->fetchColumn(0);
			return ($resultado);

		}
		catch(PDOException $e) {
		    echo "Query: " . $query ." /nError: ".$e->getMessage();
		}

		$conn = null;
	}

	function getPermission($id_module,$id_role) {
		
		try {		
		    $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $query = "SELECT * FROM ".DB_PREFIX."_permissions WHERE id_role = ".$id_role." AND id_module = '".$id_module."'";
		    $stmt  = $conn->prepare($query); 
		    $stmt->execute();
		    #set the resulting array to associative
		    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		    $resultado = $stmt->fetchAll();
			return ($resultado[0]);

		} catch(Exception $e) {
		    echo "Query: " . $query ." /nError: ". $e->getMessage();
		    die();
		}
	}


	## RESTABLECER CONTRASEÑA
	function resetPassword($email,$hash){
		if (verificationHash($email,$hash) > 0){
			$username 	= fetchColumnWhere('st_users','username','email',$email);
			$newpass 	= fetchColumnWhere('st_users','newpass','username',$username);
			if ($newpass != ""){
				$query 		= "UPDATE st_users SET newpass = NULL, hash_pass = NULL, password = '".$newpass."' WHERE username = '".$username."'";
				executeQuery($query);		
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	# CARDS
	function ccHash($cc) {
	    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
	        $salt = '$2y$12$' . substr(md5(uniqid(rand(), true)), 0, 22);
	        return crypt($cc, $salt);
	    }
	}

	function returnCC($hashedCC) {
	    return crypt($cc, $hashedCC) == $hashedCC;
	}

	function verifyCC($cc, $hashedCC) {
	    return crypt($cc, $hashedCC) == $hashedCC;
	}

	function ccMasking($cc, $maskingCharacter = 'X') {
	    return substr($cc, 0, 4) . str_repeat($maskingCharacter, strlen($cc) - 8) . substr($cc, -4);
	}


	# OBTENER FICHA DIF
	function getDateDiff($date,$next_date){

	    $date_one    = new DateTime($date);
	    $date_two    = new DateTime($next_date);
	    $diff        = date_diff($date_one,$date_two);
	    
	    $days        = $diff->format("%R%d");
	    return $days;
	}


	## Mnadar fecha y hora en español desde timestamp
	
	function getDateTime($timestamp){

		$dias = array("domingo","lunes","martes","miércoles","jueves","viernes","sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		 
		return  ($dias[date('w', strtotime($timestamp))]." ".date('d', strtotime($timestamp))." de ".$meses[date('n', strtotime($timestamp))-1]. " de ".date('Y', strtotime($timestamp))) ;	 

	}

	function toAlpha($n, $case = 'upper'){

	    $alphabet   = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	    
	    if($n <= 26){
	        $alpha =  $alphabet[$n-1];
	    } elseif($n > 26) {
	        $dividend   = ($n);
	        $alpha      = '';
	        $modulo;
	        while($dividend > 0){
	            $modulo     = ($dividend - 1) % 26;
	            $alpha      = $alphabet[$modulo].$alpha;
	            $dividend   = floor((($dividend - $modulo) / 26));
	        }
	    }

	    if($case=='lower'){
	        $alpha = strtolower($alpha);
	    }
	    return $alpha;

	}

	function scape_string($inp) {
	    if(is_array($inp))
	        return array_map(__METHOD__, $inp);

	    if(!empty($inp) && is_string($inp)) {
	        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
	    }

	    return $inp;
	} 

	function GetBetween($var1 = '', $var2 = '', $pool){
			$temp1 	= strpos($pool,$var1)+strlen($var1);
			$result = substr($pool,$temp1,strlen($pool));
			$dd 	=strpos($result,$var2);
			
			if($dd == 0){
			$dd = strlen($result);
		}

		return substr($result,0,$dd);
	}

	function getWelcome($lang){
		$Hour 		= date('G');
		if ( $Hour >= 5 && $Hour <= 11 ) {
		    return ($lang == "es") ? "Buenos días" : "Good Morning";
		} else if ( $Hour >= 12 && $Hour <= 18 ) {
		    return ($lang == "es") ? "Buenas tardes" : "Good afternoon";
		} else if ( $Hour >= 19 || $Hour <= 4 ) {
		    return ($lang == "es") ? "Buenas noches" : "Goodnight";
		}else{
			return false;
		}
	}

	function hasAccess($username,$password){
	    $form = array();
	    $form['username'] = $username;
	    $form['password'] = $password;

	    $securityDAO = $this->getDAO('SecurityDAO');
	    $result = $securityDAO->hasAccess($form);

	    //Write action to txt log
	    $log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
	            "Attempt: ".($result[0]['success']=='1'?'Success':'Failed').PHP_EOL.
	            "User: ".$username.PHP_EOL.
	            "-------------------------".PHP_EOL;
	    //-
	    file_put_contents('./log_'.date("j.n.Y").'.txt', $log, FILE_APPEND);

	    if($result[0]['success']=='1'){
	        $this->Session->add('user_id', $result[0]['id']);
	        //$this->Session->add('username', $result[0]['username']);
	        //$this->Session->add('roleid', $result[0]['roleid']);
	        return $this->status(0,true,'auth.success',$result);
	    }else{
	        return $this->status(0,false,'auth.failed',$result);
	    }
	}

	function ReduceArray($array){
		if (count($array) > 0)
			return array_reduce($array, 'array_merge', array());
		else
			return 0;
	}	