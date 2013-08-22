<?php /* Smarty version Smarty-3.0.7, created on 2013-08-22 18:51:54
         compiled from "smarty/templates/cliente/formrfid.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131459808252165dcadb7512-71229448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '386f7cb39c405a513f8f6c761bd579f006408eff' => 
    array (
      0 => 'smarty/templates/cliente/formrfid.tpl',
      1 => 1377197311,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131459808252165dcadb7512-71229448',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<br />
<form  id="crfid" action="#" method="post" accept-charset="utf-8">
	<input type="<?php if (isset($_smarty_tpl->getVariable('dados',null,true,false)->value)){?>text<?php }else{ ?>hidden<?php }?>" name="rfi_id" <?php if (isset($_smarty_tpl->getVariable('dados',null,true,false)->value)){?>readonly=""<?php }?> value="<?php if (isset($_smarty_tpl->getVariable('dados',null,true,false)->value)){?><?php echo $_smarty_tpl->getVariable('dados')->value['rfi_id'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('idrfid')->value;?>
<?php }?>" id="rfi_id">
	<label for="rfi_os">OS: </label><input type="text" name="rfi_os" value="<?php if (isset($_smarty_tpl->getVariable('dados',null,true,false)->value)){?><?php echo $_smarty_tpl->getVariable('dados')->value['rfi_os'];?>
<?php }?>" id="rfi_os">
	<label for="rfi_oc">OC: </label><input type="text" name="rfi_oc" value="<?php if (isset($_smarty_tpl->getVariable('dados',null,true,false)->value)){?><?php echo $_smarty_tpl->getVariable('dados')->value['rfi_oc'];?>
<?php }?>" id="rfi_oc">
	<label for="rfi_nf">NF: </label><input type="text" name="rfi_nf" value="<?php if (isset($_smarty_tpl->getVariable('dados',null,true,false)->value)){?><?php echo $_smarty_tpl->getVariable('dados')->value['rfi_nf'];?>
<?php }?>" id="rfi_nf">
	<?php if (isset($_smarty_tpl->getVariable('dados',null,true,false)->value)){?>	<input type="hidden" name="edit" value="edit" id="edit"><?php }?>
	<input type="submit" value="Salvar">
</form>
<br />