<?PHP
/**
*
*/
class index extends xajaxResponse
{
	private $smarty;
	private $data;
	private $con;
	private $idmenuacesso;
	private $cfg;
	private $class='index.cliente';

	function __construct($_cfg, $con, $smarty, $data,$data2)
	{
		$this->data         = $data;
		$this->data2        = $data2;
		$this->con          = $con;
		$this->smarty       = $smarty;
		$this->cfg         = $_cfg;
		$this->objVal		= new validate();
		$this->objDT		= new DBTransact($con);

		$this->smarty->assign('class',$this->class);
	}
	public function home ()
	{
		$this->smarty->assign('url_home',$this->cfg['url']);
		$this->smarty->assign('modulosel','cliente');
		$div= $this->smarty->fetch('cliente/fecharoc.tpl');
		$this->assign('geral','innerHTML',$div);
		$this->script($this->smarty->fetch('select_modulo.js'));
		$this->script($this->smarty->fetch('cliente/fecharoc.js'));
		$this->listar();
	}

	public function formrfid ()
	{
		try {
			$sql=sprintf("SELECT * FROM %srfi WHERE rfi_id='%s'", BDTP, (!empty($this->data2))?$this->data : $this->data['rfid']);
			if (!($rs=$this->con->Execute($sql))) {
				throw new Exception('Erro ao selecionar dados');
			}
			if(!empty($this->data2) && $rs->_numOfRows == 1){
				$rs->fields['edit']='1';
				$this->smarty->assign('dados',$rs->fields);
				$str= $this->smarty->fetch('cliente/formrfid.tpl');
				$this->assign('form_oc','innerHTML',$str);
				$this->script($this->smarty->fetch('cliente/formrfid.js'));
			}elseif ($rs->_numOfRows >= 1) {
				throw new Exception('RFID já cadastrado');
			}else{
				$this->smarty->assign('idrfid',$this->data['rfid']);
				$str= $this->smarty->fetch('cliente/formrfid.tpl');
				$this->assign('form_oc','innerHTML',$str);
				$this->script($this->smarty->fetch('cliente/formrfid.js'));
			}

		} catch (Exception $e) {
			$this->script("writeMessage('".addslashes($e->getMessage())."','e','form_oc')");
		}
	}
	public function listar()
	{
		$sql="SELECT rfi_id,
		'<a rel=\"%%s\" class=\"editar\"></a>' as '&nbsp;',
		rfi_id as 'Cód. RFID',
		rfi_os as 'Cód. OS',
		rfi_oc as 'Cód. OC',
		rfi_nf as 'Cód. NF',
		'<a rel=\"%%s\" class=\"deletar\"></a>' as 'Del.'
		FROM %srfi
		ORDER BY rfi_id";

		$sql = sprintf($sql, BDTP);

		if (!empty($this->data2) && is_numeric($this->data2)) {
			$pagina=$this->data2;
		}else{
			$pagina=1;
		}
		$objTR = new geraTabelaRelatorio($this->con, $sql, $pagina, true, 2);

		$objTR->setColumOcultar('rfi_id');
		$objTR->setColumValue('&nbsp;', 0);
		$objTR->setColumValue('Del.', 0);
		$objTR->setTableTRId('rfi_id');

		$str=$objTR->printTB();
		$this->assign('form_listar','innerHTML',$str);
		$this->script($this->smarty->fetch('cliente/listarfid.js'));
	}
	public function inserir()
	{
		try {
			$dados=$this->data;

			if (!is_numeric($dados['rfi_id'])) {
				throw new Exception('Valor do Campo RFID inválido!');
			}elseif (!is_numeric($dados['rfi_os'])) {
				throw new Exception('Valor do Campo OS inválido!');
			}elseif (!is_numeric($dados['rfi_oc'])) {
				throw new Exception('Valor do Campo OC inválido!');
			}elseif (!is_numeric($dados['rfi_nf'])) {
				throw new Exception('Valor do Campo NF inválido!');
			}
			if(isset($dados['edit'])){
				$dados['rfi_edit']=date("Y-m-d H:i:s");
			}else{
				$dados['rfi_create']=date("Y-m-d H:i:s");
			}

			if (!($this->objDT->save(BDTP.'rfi', 'rfi_id', $dados))) {
				$this->alert($this->objDT->insertSQL);
				throw new Exception('Erro ao salvar dados');
			}

			$this->script("writeMessage('Dados salvos com sucesso', 'c', 'form_oc', 3)");

			$this->listar();
		} catch (Exception $e) {
			$this->script("writeMessage('".addslashes($e->getMessage())."', 'e', 'form_oc')");
		}
	}
	public function deletar()
	{
		$sql="DELETE FROM %srfi WHERE `rfi_id`='$this->data'";
		$sql=sprintf($sql,BDTP);
		$this->con->Execute($sql);
		$this->listar();
	}
}
?>