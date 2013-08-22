<?php
//===================[CRIANDO CLASSE]
class DBTransact {
	private $conn;
	public $insertSQL;
	public $sql;
	public $erro;
	public $_sql;
	public $_dados=array();
	
	public function __construct($conn){
		$this->conn=$conn;
	}

	public function save($tabela, $campo,$form_fields){
		
		if (!$this->conn) {
			$this->erro='Conexao Invalida';
			return false;
		}

		$this->__sql($campo,$form_fields);
		
		$sql=sprintf("select * from %s where %s",$tabela,$this->_sql);
		
	//	$this->insertSQL=$sql.'|'.print_r($this->_dados,true);
	//	return false;
		$this->conn->Prepare($sql);
		$rs = &$this->conn->Execute($sql,$this->_dados);
		if (!$rs) {
			return false;
		}

		
		ADOdb_Active_Record::SetDatabaseAdapter($this->conn);
		$ar=new ADODB_Active_Record($tabela);
		$table_fields=	$ar->GetAttributeNames();

		if (!is_array($table_fields)) {
			return false;
		}

		//===================[VARRERE OS CAMPOS DO FORM PARA PEGAR OS DADOS PARA O INSERT E ELIMINA OS Q NAO FOREM CORREPOSNDENTES AOS CAMPOS DA TABELA]
		foreach ($form_fields as $key => $var){
			if (!in_array($key,$table_fields)){
				unset($form_fields[$key]);
			}
		}


		if($rs->_numOfRows<1){
			//===================[GERANDO SQL DE INSERT]
			$this->insertSQL = $this->conn->GetInsertSQL($rs, $form_fields);

			//===================[EXECUNTANDO SQL DE INSERT]
			$rs2 = &$this->conn->Execute($this->insertSQL);
			if($rs2)
				return true;
			else 	
				return false;

		}else {
			
			
			//===================[GERANDO SQL DE UPDATE]
			$this->insertSQL = $this->conn->GetUpdateSQL($rs, $form_fields);
			
			//entao nao ha campos para atualizar
			if($this->insertSQL==false){
				return true;
			}
//				return false;
			//===================[EXECUNTANDO SQL DE INSERT]
			$rs2 = &$this->conn->Execute($this->insertSQL);
			//precisa encontrar uma forma de retornar se o update deu certo ou diferenciar entre nao a dados para atualizar e um erro
			if(!$this->conn->ErrorMsg()){
				return true;
			}else{ 
				//$this->insertSQL=$rs->_numOfRows;
				return false;
			}
		}
		//}
	}

	public function delete($tabela, $campo, $id){
		$_dados=array();$_sql='';
		if (is_array($campo)) {
			$i=0;
			foreach ($campo as $k => $v) {
				$_sql .= $v."=?";
				$_sql .= ((count($campo)-1)!=$i ? ' AND ' : '');
				$_dados[]=$form_fields[$v];
				$i++;
			}
		}else{
			$_sql=$campo."=?";
			$_dados[]=$form_fields[$campo];
		}
		
		$sql=sprintf("DELETE FROM %s WHERE %s",$tabela,$_sql);
		
		$this->conn->Prepare($sql);
		$rs = &$this->conn->Execute($sql,$_dados);
		if($rs)
				return true;
			else 	
				return false;	
	}
	
	public function checkExist($tabela, $campo,$form_fields) {
		$this->__sql($campo,$form_fields);
		
		$rows=-1;//se der erro entao -1
		
		$sql=sprintf("select * from %s where %s",$tabela,$this->_sql);
		
		
		$this->conn->Prepare($sql);
		$this->sql=$sql;
		
		$rs = &$this->conn->Execute($sql,$this->_dados);
		if ($rs) {
			$rows=$rs->_numOfRows;
		}
		
		return $rows;
	}
	
	private function __sql($campo,$form_fields){
		$_dados=array();$_sql='';
		
		if (is_array($campo)) {
			$i=0;
			foreach ($campo as $k => $v) {
				$_sql .= $v."=?";
				$_sql .= ((count($campo)-1)!=$i ? ' AND ' : '');
				$_dados[]=(isset($form_fields[$v.'_ref']) && !empty($form_fields[$v.'_ref']) ? $form_fields[$v.'_ref'] : $form_fields[$v]);
				$i++;
			}
		}else{
			$_sql=$campo."=?";
			$_dados[]=(isset($form_fields[$campo.'_ref']) && !empty($form_fields[$campo.'_ref']) ? $form_fields[$campo.'_ref'] : $form_fields[$campo]);
		}
		
		
		$this->_sql=$_sql;
		$this->_dados=$_dados;
	}
}
?>