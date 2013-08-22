<?php
/**
* Gera uma tabela passando apenas a consulta em SQL e a conexao com o ADODB
*/
class geraTabelaRelatorio
{
	private $con;
	private $sql;
	private $pagina;
	private $paginacao;
	private $resultPorPagina=10;
	private $table_colums=array();
	public $set_colum_ocultar=array();
	private $set_colum_ocultar_export=array();
	private $columPHPFunction=array();
	private $tableTRID;
	public  $erro;
	public $tableStyle;
	public $navPage='';
	public $numOfRows;
	public $set_Title_Thead=array();
	
	function __construct($con,$sql,$pagina,$paginacao=true,$resultPorPagina=10)
	{
		$this->con=$con;
		$this->sql=$sql;
		$this->pagina=$pagina;
		$this->paginacao=$paginacao;
		$this->resultPorPagina=$resultPorPagina;
		
		if ($this->paginacao) {
			$this->paginacao();
		}else{
			$this->res=$this->con->Execute($sql);
			$this->numOfRows=$this->res->_numOfRows;
		}
	}
	

	
	public function printTB() {
		

		
		$this->tableColums();
		
		$str = $this->mainTableTop();
		$str .= $this->printTableBody();
		$str .= $this->mainTableBottom();
		
		return $str;
	}
	
	
	private function printTableBody(){
		$html='<tbody>';

		if ($this->res){
			if($this->res->_numOfRows > 0){
				$i=0;

				while(!$this->res->EOF){
					$id='';$valor='&nbsp;';
					if (isset($this->res->fields[$this->tableTRID])) {
						$id='id="trid_'.$this->res->fields[$this->tableTRID].'"';
					}
					
					$html.= '<tr class="'.($i%2==0 ? 'odd' : 'even').'" '.$id.'>';
					$_c=0;
					foreach($this->table_colums as $k => $colum){
						$v=$this->res->fields[$colum];
						
						if(!array_key_exists($colum,$this->set_colum_ocultar)){
								if(array_key_exists($colum,$this->columPHPFunction)){
									$funct_arg=$this->columPHPFunction[$colum]['argumts'];
									array_unshift($funct_arg,$v);
									$valor=call_user_func_array($this->columPHPFunction[$colum]['function'], $funct_arg);
									//$valor=print_r(array($v,'2',',','.'),true).'<br/>';
									//$valor.=print_r($funct_arg,true);
								}else if (array_key_exists($colum,$this->columValue)){
									//
									$_p=strpos($v,"%s");
									if ($_p!==false) {
										$valor=sprintf($v,$this->res->fields[$this->columValue[$colum]]);
									}else{
										$valor='&nbsp;-';
									}
						
								}else{
									$valor=($v!=''?$v:'&nbsp;');//no IE 6 nao pode ser vazio senao nao aplica classe ao td
								}
						
							$html.='<td class="colunaTD_'.$_c.'">'. $valor.'</td>';
						
							//$html .= '<td>'.$v.'</td>';
							$_c++;
						}
						
						
						
					}
					
					$html .= '</tr>';
					$i++;

					$this->res->MoveNext();
				}
			}else{
				$html='<tr><td colspan="'.count($this->table_colums).'">Nenhuma informa&ccedil;&atilde;o encontrada</td></tr>';
			}
		}else{
			$html='Erro gerando tabela';
			$this->erro=$this->con->ErrorMsg();
		}
		
		$html .= '</tbody>';
		
		return $html;
	}
	
	private function mainTableTop(){
		
		$str='<table border="0" cellspacing="0" cellpadding="0" class="geraTabelaRelatorio" '.$this->tableStyle.'>';
		$str.='<thead>';
			
		if ($this->navPage !='') {
			$str.='<tr>';
				$str.='<td class="divNavPage" colspan="'.count($this->table_colums).'">';
					$str.='<div class="top"><div></div></div>';
					$str.='<div class="middle">';
					$str.=$this->navPage;
					$str.='</div>';
				$str.='</td>';
			$str.='</tr>';
		}
				
			
		$str.='<tr>';

		foreach($this->table_colums as $col){
			if(!array_key_exists($col,$this->set_colum_ocultar)){
				$t='';
				if (array_key_exists($col,$this->set_Title_Thead)) {
					$t=' title="'.$this->set_Title_Thead[$col].'" class="vtip"';
				}
				
				$str .=	'<th '.$t.'>'.$col.'</th>';
			}
			
		}

		$str.='</tr>';
		$str.='</thead>';

		return $str;
	}
	
	private function mainTableBottom(){
		$str='</table>';
		return $str;
	}
	
	private function tableColums(){
		if($this->res){
			
			for($i=0; $i < $this->res->_numOfFields; $i++){
				//$this->erro++;
				$m=$this->res->FetchField($i);
				$this->table_colums[]=$m->name;
			}
		}

	}
	
	private function paginacao() {

		$navPage='';
		$this->res=$this->con->PageExecute($this->sql, $this->resultPorPagina, $this->pagina);
		$this->numOfRows=$this->res->_numOfRows;
		if ($this->res) {
	      //if ($this->res->_numOfRows > 0) {
       $totalP = $this->res->_lastPageNo;
       $totalN  = $this->res->_maxRecordCount;
       $primeira = 1;
       $ultima  = max(0, $totalP);
       $anterior  = max($primeira, $this->pagina - 1);
       $proxima  = min($ultima, $this->pagina + 1);

        $navPage="Total:".$totalN."&nbsp; P&aacute;gina ".$this->pagina." de ".$ultima."&nbsp;&nbsp;&nbsp;";

				if ($totalP > 1 && $this->pagina > 1) {
					$navPage .= '<a href="javascript:void(0)" id="btnNavFirst" rel="1" /><img title="Primeira p&aacute;gina" src="images/first.gif" align="absmiddle"/></a>&nbsp;&nbsp;';
				}

				if ($this->pagina>1) {
          $navPage.="<a href=\"javascript:void(0)\" id=\"btnNavBward\"  rel=\"".($anterior)."\" /><img title=\"P&aacute;gina anterior\" src=\"images/bward.gif\" align=\"absmiddle\"/></a>&nbsp;&nbsp;&nbsp;";
        }
        if ($this->pagina!=$totalP) {
          $navPage.="<a href=\"javascript:void(0)\" id=\"btnNavFward\" rel=\"".($proxima)."\" /><img title=\"Pr&oacute;xima p&aacute;gina\" src=\"images/fward.gif\" align=\"absmiddle\"/></a>";
        }

				if ($ultima > 0 && $this->pagina != $ultima) {
					$navPage .= '&nbsp;&nbsp;<a href="javascript:void(0)" id="btnNavLast" rel="'.($ultima).'" /><img title="&Uacute;ltima p&aacute;gina" src="images/last.gif" align="absmiddle"/></a>';
				}


			if($this->res->_numOfRows>0)	{	
				$this->navPage=$navPage;
			}
		}
	}
	
	 /**
     * Atribui uma funcao php ao valor da coluna
     *
     * @param string $colum  Nome da coluna
     * @param string $function da função em php ex: number_format
     * @param array $argumts onde: os argumentos da funcao serao passados como array
     *
     * @access public
     */
	public function setPHPFunction($colum, $function, $argumts=array()){
		$this->columPHPFunction[$colum]['function']=$function;
		$this->columPHPFunction[$colum]['argumts']=$argumts;
	}
	
	 /**
    * Atribui um valor a uma coluna comparando com um valor de referencia
    *
    * @param string $colum  Nome da coluna
    * @param array $array_values onde: val = ex: <a onclick="funcao('valor','%s')">vai</a> onde %s será substituido pelo valor 
    * 																columSprintf = coluna q será usada como valor para substituir (sprintf do PHP)
    * 																valTest = 'Valor de comparacao se verdadeiro ex: if($colum==1)'
    * 
    * @access public
    */
	public function setColumValue($colum,$array_values){
		$this->columValue[$colum]=$array_values;
	}
	
	public function setColumOcultar($colum){
		$this->set_colum_ocultar[$colum]=false;
	}
	
	public function setTableTRId($colum){
		$this->tableTRID=$colum;
	}
	
	public function setTitleThead($colum,$title){
		$this->set_Title_Thead[$colum]=$title;
	}
	//retirar	// 
		// public function setColumOcultarExport(){
		// 	
		// }
		// public function exportExcel(){
		// 	
		// }

}
