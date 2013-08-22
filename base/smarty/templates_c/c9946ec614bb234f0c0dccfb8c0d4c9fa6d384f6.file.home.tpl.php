<?php /* Smarty version Smarty-3.0.7, created on 2013-08-21 18:19:56
         compiled from "smarty/templates/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1264179227521504cc1e6be5-38942113%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9946ec614bb234f0c0dccfb8c0d4c9fa6d384f6' => 
    array (
      0 => 'smarty/templates/home.tpl',
      1 => 1377109171,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1264179227521504cc1e6be5-38942113',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<div id="modulos">
	<div id="logo_scma">
		<img src="images/logo_fundo.jpg" width="300px"/>
	</div>
	<div id="clients" class="modulos" >
		<a href="javascript:void(0)" onclick="xcall('index.cliente', 'home');"><img src="images/clients.png" /><br/> <strong>Cliente</strong></a>
	</div>
	<div id="armazen" class="modulos" >
		<a href="javascript:void(0)" onclick="xcall('index.armazem', 'home');"><img src="images/armazen.png" /><br/> <strong>Armazém</strong></a>
	</div>
	<div id="enderecamento" class="modulos" >
		<a href="javascript:void(0)" onclick="xcall('index.cma', 'home');"><img src="images/enderecamento.png" /><br/> <strong>Estoque</strong></a>
	</div>
</div>