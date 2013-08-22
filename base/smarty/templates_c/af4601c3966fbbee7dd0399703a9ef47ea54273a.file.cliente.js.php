<?php /* Smarty version Smarty-3.0.7, created on 2013-08-22 11:55:49
         compiled from "smarty/templates/cliente/cliente.js" */ ?>
<?php /*%%SmartyHeaderCode:20801032155215fc45845f65-02647523%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af4601c3966fbbee7dd0399703a9ef47ea54273a' => 
    array (
      0 => 'smarty/templates/cliente/cliente.js',
      1 => 1377172536,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20801032155215fc45845f65-02647523',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
$(function(){
	$("form[name=rfid_form]").submit(function(){
		xcall('index.cliente', 'formrfid', xajax.getFormValues('rfid_form'));
		return false;
	})
	$("#crfid").submit(function(){
		return false;
	})
});