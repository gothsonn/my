<?php /* Smarty version Smarty-3.0.7, created on 2013-08-20 17:14:19
         compiled from "smarty/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9874911655213a3eb71de21-08651168%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b06d19c646272078c10cfc04a699bd60ab3df33' => 
    array (
      0 => 'smarty/templates/index.tpl',
      1 => 1377018856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9874911655213a3eb71de21-08651168',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
	"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Sistema de Controle de Estoque com RFID</title>
	<?php echo $_smarty_tpl->getVariable('xajax_js')->value;?>

	<script src="lib/js/jquery.min.js" type="text/javascript"></script>
 	<script src="lib/js/jquery-ui.js" type="text/javascript"></script>
	<script src="lib/js/funcoes.js" type="text/javascript"></script>
	<link rel="stylesheet" href="css/cupertino/jquery-ui.css" type="text/css" />
	<link rel="stylesheet" href="css/geral.css" type="text/css" />
	<link rel="stylesheet" href="css/form.css" type="text/css" />
	<link rel="stylesheet" href="css/message.css" type="text/css" />
</head>
<body>
	<div id="dialog"></div>
	<div id="geral">
		<?php $_template = new Smarty_Internal_Template("home.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	</div>
</body>
</html>
