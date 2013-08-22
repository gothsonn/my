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
	private $CFG;
	private $class='index.cliente';

	function __construct($_cfg, $con, $smarty, $data,$data2)
	{
		$this->data         = $data;
		$this->data2        = $data2;
		$this->con          = $con;
		$this->smarty       = $smarty;
		$this->_cfg         = $_cfg;
		$this->objVal		= new validate();
		$this->objDT		= new DBTransact($con);

		$this->smarty->assign('class',$this->class);
	}
	public function home ()
	{
		$this->smarty->assign('modulosel','cliente');
		$div= $this->smarty->fetch('cliente/fecharoc.tpl');
		$this->assign('geral','innerHTML',$div);
		$this->script($this->smarty->fetch('select_modulo.js'));
	}
}
?>