<?php
	require_once 'usuario.php';

	abstract class DB {
		public abstract function existeMail($email);
		public abstract function traerTodos();
		public abstract function guardarUsuario(Usuario $usuario, DB $db);
	}
