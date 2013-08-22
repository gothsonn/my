<?php
session_start();
$_SESSION['sistfg']['usuario']= 'Usuario';

require 'includes/config.php';

require 'includes/libLoader.php';


$smarty->display('index.tpl');
