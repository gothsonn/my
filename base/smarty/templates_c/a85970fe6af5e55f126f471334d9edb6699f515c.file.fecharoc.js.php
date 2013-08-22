<?php /* Smarty version Smarty-3.0.7, created on 2013-08-22 19:35:56
         compiled from "smarty/templates/cliente/fecharoc.js" */ ?>
<?php /*%%SmartyHeaderCode:9714258255216681c8fab13-01138113%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a85970fe6af5e55f126f471334d9edb6699f515c' => 
    array (
      0 => 'smarty/templates/cliente/fecharoc.js',
      1 => 1377200139,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9714258255216681c8fab13-01138113',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
$(function(){
	$("form[name=rfid_form]").submit(function(){
		if($("#rfid").val().length > 0){
			$("#div_message").remove();
			$("#form_oc").show();			
			xcall('index.cliente', 'formrfid', xajax.getFormValues('rfid_form'));
		}else{
			alert("O Campo RFID deve ser preenchido!");
		}
		return false;
	})
});