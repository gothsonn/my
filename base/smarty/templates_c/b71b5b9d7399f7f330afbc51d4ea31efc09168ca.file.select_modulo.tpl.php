<?php /* Smarty version Smarty-3.0.7, created on 2013-08-21 18:21:06
         compiled from "smarty/templates/select_modulo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18827868675215051224dc09-24746989%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b71b5b9d7399f7f330afbc51d4ea31efc09168ca' => 
    array (
      0 => 'smarty/templates/select_modulo.tpl',
      1 => 1377109156,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18827868675215051224dc09-24746989',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="sel_modulo">Alterar Módulo:
	<select name="modulo" id="modulo" >
		<option value="0"><strong>Selecione o módulo</strong></option>
		<option value="cliente"
		<?php if ($_smarty_tpl->getVariable('modulosel')->value=="cliente"){?>
		selected='selected'
		<?php }?>
		><strjong>Cliente</strong></option>
		<option value="armazem"
		<?php if ($_smarty_tpl->getVariable('modulosel')->value=="armazem"){?>
		selected='selected'
		<?php }?>
		><strjong>Armazém</strong></option>
		<option value="enderecamento"
		<?php if ($_smarty_tpl->getVariable('modulosel')->value=="enderecamento"){?>
		selected='selected'
		<?php }?>
		><strjong>Endereçamento</strong></option>
	</select>
</div>