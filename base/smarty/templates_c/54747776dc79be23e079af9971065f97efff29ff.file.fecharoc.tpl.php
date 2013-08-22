<?php /* Smarty version Smarty-3.0.7, created on 2013-08-22 12:21:37
         compiled from "smarty/templates/cliente/fecharoc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2011137173521602518b52c7-39332029%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54747776dc79be23e079af9971065f97efff29ff' => 
    array (
      0 => 'smarty/templates/cliente/fecharoc.tpl',
      1 => 1377174038,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2011137173521602518b52c7-39332029',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="menu_rfid">
	<div id="menu_modulo">
		<div id="logo"><a href="<?php echo $_smarty_tpl->getVariable('url_home')->value;?>
"><img src='images/scma_logo.png'/></a></div>
		<?php $_template = new Smarty_Internal_Template("select_modulo.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
		<div id="div_rfid">
			<form name="rfid_form" id="rfid_form" action="#" method="get" accept-charset="utf-8">
				<label for="rfid">Código do rfid: </label><input type="text" name="rfid" value="" id="rfid">
				<input type="submit" name ="Prosseguir" value="Prosseguir">
			</form>
		</div>
	</div>
	<div class="clear">&nbsp;</div>
	<div id="form_oc">&nbsp;</div>
	<div id="form_listar">&nbsp;</div>
</div>