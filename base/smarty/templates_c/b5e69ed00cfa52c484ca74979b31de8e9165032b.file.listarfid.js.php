<?php /* Smarty version Smarty-3.0.7, created on 2013-08-22 19:35:25
         compiled from "smarty/templates/cliente/listarfid.js" */ ?>
<?php /*%%SmartyHeaderCode:674545066521667fd3058f9-37830027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5e69ed00cfa52c484ca74979b31de8e9165032b' => 
    array (
      0 => 'smarty/templates/cliente/listarfid.js',
      1 => 1377200121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '674545066521667fd3058f9-37830027',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
$(function(){
	$('#form_listar .geraTabelaRelatorio .editar').each(function(){
		$(this).append('<img src="images/btn/edit.png"/>');
		var _id = $(this).attr('rel');
		$(this).click(function(){
			$("#form_oc").show();
			xcall('index.cliente','formrfid', _id,_id);
		})
	});
	$('#form_listar .geraTabelaRelatorio .deletar').each(function(){
		$(this).append('<img src="images/btn/close2.png"/>').css("cursor", "pointer");
		var _id = $(this).attr('rel');
		$(this).click(function(){
			if(confirm("Deseja Realmente Apagar o RFID de Número "+_id+" ?")){
				xcall('index.cliente','deletar', _id);
				alert("RFID excluido com sucesso!");
			}
		})
	});
	$('#btnNavFirst, #btnNavBward, #btnNavFward, #btnNavLast').unbind('click').click(function() {
		xcall('<?php echo $_smarty_tpl->getVariable('class')->value;?>
', 'listar', '', $(this).attr('rel'), { 'ajaxloader': true, 'idajaxloader': $(this) });
	});

})