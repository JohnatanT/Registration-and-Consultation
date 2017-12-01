<?php
/* Página de Logout da aplicação */

session_start();

session_destroy();// Destroi a Sessão

header("Location:index.php"); 