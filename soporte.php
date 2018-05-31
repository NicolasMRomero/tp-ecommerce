<?php
	require_once 'class/auth.php';
	require_once 'class/validar.php';
	require_once 'class/dbJSON.php';
	require_once 'class/dbMYSQL.php';


	$auth = new Auth();
	$validar = new Validate();

	$typeDB = 'mysql';

	switch ($typeDB) {
		case 'json':
			$db = new dbJSON();
			break;
		case 'mysql':
			$db = new dbMYSQL();
			break;
		default:
			$db = NULL;
			break;
	}
