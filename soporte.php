<?php
	require_once 'class/auth.php';
	require_once 'class/validar.php';
	require_once 'class/dbJSON.php';


	$auth = new Auth();
	$validar = new Validate();

	$typeDB = 'json';

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
