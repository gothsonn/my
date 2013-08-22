<?php

$_cfg['url'] = 'http://'.$_SERVER['HTTP_HOST'].'/base/';

define('SMARTY_DIR', $root.'lib/smarty/');

// Banco de dados
$_cfg['mysql']=array(
  'host'=>'localhost',
  'user'=>'root',
  'pass'=>'',
  'db'=>'cma',
  );

$_cfg['bd_tableprefix']='scma_';

$_cfg['typeAdoDB_connect']='mysqlt';

define("BD", $_cfg['bd_nome']);

define("BDTP",$_cfg['bd_tableprefix']);

//arquivos dos usuário
$_cfg['userdata']='userdata/';

//arquivos da etapa do fornecedor na manutencao de componente
$_cfg['userdata_etF']=$_cfg['userdata'].'etF/';

//tipo de acesso do menu
$_cfg['tipoAcessoMenu']['r']['desc']='Somente lista informa&ccedil;&otilde;es';
$_cfg['tipoAcessoMenu']['r']['img']='r.gif';
$_cfg['tipoAcessoMenu']['rw']['desc']='Lista e insere informa&ccedil;&otilde;es';
$_cfg['tipoAcessoMenu']['rw']['img']='rw.png';
$_cfg['tipoAcessoMenu']['adm']['desc']='Supervisor - Listar, inserir, editar e apagar informa&ccedil;&otilde;es';
$_cfg['tipoAcessoMenu']['adm']['img']='adm.png';
