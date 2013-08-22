<?php /* Smarty version Smarty-3.0.7, created on 2013-08-22 19:01:36
         compiled from "smarty/templates/cliente/formrfid.js" */ ?>
<?php /*%%SmartyHeaderCode:1855532197521660105e51b0-86177869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4557a99f407576e288b4e608d66bf70ea3dee6c' => 
    array (
      0 => 'smarty/templates/cliente/formrfid.js',
      1 => 1377198054,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1855532197521660105e51b0-86177869',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
$(function(){
	$("form[id=crfid]").submit(function(){
		xcall('index.cliente', 'inserir', xajax.getFormValues('crfid'));
		setTimeout( function(){
			$("#form_oc").hide();
		}, 3000);
		return false;
	})
});