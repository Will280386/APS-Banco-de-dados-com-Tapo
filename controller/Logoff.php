<?php
require_once (dirname(__FILE__).'\..\config.php');
session_start();
unset($_SESSION['autenticado']);
header("Location: ".HOME_URL."\login");
