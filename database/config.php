<?php 

    // ? Definimos la zona en que inscrito el contenido "Formato"
	date_default_timezone_set('America/Mexico_City');    

    // ? nombre de base de datos
    $dbname = 'ferreteria';

	defined('DB_DNS')       || define('DB_DNS',         'mysql:host=localhost;dbname='.$dbname.';charset=utf8mb4_unicode_ci');
    defined('DB_USER')      || define('DB_USER',        'root');
    defined('DB_PASS')      || define('DB_PASS',        '');
    defined('DB_PROFIX')    || define('DB_PREFIX',      'ti');
	defined('SERVER_HOST')	|| define('SERVER_HOST',	'https://ferreteria.test/');
    defined('METAS')        || define('METAS',          '../../_metas/');