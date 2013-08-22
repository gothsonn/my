<?php /* Smarty version Smarty-3.0.7, created on 2013-08-22 11:13:03
         compiled from "smarty/templates/select_modulo.js" */ ?>
<?php /*%%SmartyHeaderCode:7741865395215f23f248211-16534365%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02c15ca27052923e150872d3edd424a44fbcdc77' => 
    array (
      0 => 'smarty/templates/select_modulo.js',
      1 => 1377169953,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7741865395215f23f248211-16534365',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
$(function(){
	$("select[name=modulo] option").each(function(){
		$(this).click(function(){
			var modulo= $(this).val();
			if(modulo ==0){
				alert('Selecione um módulo válido');
			}else if(modulo =='cliente'){
				xcall('index.cliente', 'home');
			}else if(modulo =='armazem'){

			}else if(modulo =='enderecamento'){

			}

		})
	})
});