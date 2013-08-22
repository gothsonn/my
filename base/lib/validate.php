<?php
/**
* @author Carlos Ritter 
*	// modified by Carlos Ritter
*/
class validate
{
	public $hora='00:00:00';
	public $df; //data formatada YYYY-mm-dd
	public $nf; // numero formatado ex: 1.111,11 para 1111.11
	public $dia;
	public $mes;
	public $ano;
	
	
	function __construct()
	{
		
	}

	
		// Validation class
		// Copyright (c) 1997-2006 Pierre-Alain Joye,Tomas V.V.Cox, Amir Saied
	 /**
     * Validate a number
     *
     * @param string $number  Number to validate
     * @param array  $options array where:
     *                          'decimal'  is the decimal char or false when decimal
     *                                     not allowed.
     *                                     i.e. ',.' to allow both ',' and '.'
     *                          'dec_prec' Number of allowed decimals
     *                          'min'      minimum value
     *                          'max'      maximum value
     *
     * @return boolean true if valid number, false if not
     *
     * @access public
     */
    public function number($number, $options = array())
    {
				$number = str_replace(".","",$number);
				$number = str_replace("%","",$number);
				$number = str_replace(",",".",$number);
				
        $decimal = $dec_prec = $min = $max = null;
        if (is_array($options)) {
            extract($options);
        }

				if ($decimal === null) {
					$decimal = ',';
				}
				
        $dec_prec  = $dec_prec ? "{1,$dec_prec}" : '+';
        $dec_regex = $decimal  ? "[$decimal][0-9]$dec_prec" : '';

        if (!preg_match("|^[-+]?\s*[0-9.]+($dec_regex)?\$|", $number)) {
            return false;
        }

				
				
        if ($min !== null && $min > $number) {
            return false;
        }

        if ($max !== null && $max < $number) {
            return false;
        }

				$this->nf=$number;

        return $number;
    }

		public function hora($hora){
			if(empty($hora) || !( ereg ("([0-9]{1,2}):([0-9]{1,2})", $hora, $h))){
				return false;
			}else if($h[1] > 23 || $h[2] < 0 || $h[2] > 59){
				return false;
			}
			return true;
		}
		
		
		/**
     * Validate a number
     *
     * @param string $number  Number to validate
     * @param array  $options array where:
     *                          'min'      minimum value
     *                          'max'      maximum value
     *
     * @return boolean true if valid number, false if not
     * @return data formatada, dia, mes, ano
     * 
     * @access public
     */
		
		function data($data,$options=array()){
			if(empty($data) || !( ereg ("([0-9]{1,2})/([0-9]{1,2})/([0-9]{4})", $data, $d))){
				return false;
			}
			
			if(!checkdate($d[2],$d[1],$d[3])){
				return false;
			}
			
			$min = $max = null;
			if (is_array($options)) {
          extract($options);
      }
			if (ereg ("([0-9]{1,2})/([0-9]{1,2})/([0-9]{4})", $min, $_dmin)) {
				$min=$_dmin[3].'-'.$_dmin[2].'-'.$_dmin[1];
			}
			if (ereg ("([0-9]{1,2})/([0-9]{1,2})/([0-9]{4})", $max, $_dmax)) {
				$max=$_dmax[3].'-'.$_dmax[2].'-'.$_dmax[1];
			}


			$this->df=$d[3].'-'.$d[2].'-'.$d[1];
			$this->dia=$d[1];
			$this->mes=$d[2];
			$this->ano=$d[3];

			$dunix=strtotime($this->df. " ".$this->hora);
			if ($min !== null && $dunix < strtotime($min)) {
				return false;
			}

			if ($max !== null && $dunix > strtotime($max)) {
				return false;
			}

			return $this->ano.$this->mes.$this->dia;
		}
		
		/**
     * Validate CNPJ
     * @access public
     */
		function valCnpj($Cnpj)	{
			if (empty($Cnpj)) {
				return false;
			}
			$RecebeCNPJ=${"Cnpj"};
			$s="";
			for ($x=1; $x<=strlen($RecebeCNPJ); $x=$x+1){
				$ch=substr($RecebeCNPJ,$x-1,1);
				if (ord($ch)>=48 && ord($ch)<=57){
					$s=$s.$ch;
				}
			}

			$RecebeCNPJ=$s;
			if ($RecebeCNPJ=="00000000000000"){
				//$then;
				return FALSE;
			}else{
				$Numero[1]=intval(substr($RecebeCNPJ,1-1,1));
				$Numero[2]=intval(substr($RecebeCNPJ,2-1,1));
				$Numero[3]=intval(substr($RecebeCNPJ,3-1,1));
				$Numero[4]=intval(substr($RecebeCNPJ,4-1,1));
				$Numero[5]=intval(substr($RecebeCNPJ,5-1,1));
				$Numero[6]=intval(substr($RecebeCNPJ,6-1,1));
				$Numero[7]=intval(substr($RecebeCNPJ,7-1,1));
				$Numero[8]=intval(substr($RecebeCNPJ,8-1,1));
				$Numero[9]=intval(substr($RecebeCNPJ,9-1,1));
				$Numero[10]=intval(substr($RecebeCNPJ,10-1,1));
				$Numero[11]=intval(substr($RecebeCNPJ,11-1,1));
				$Numero[12]=intval(substr($RecebeCNPJ,12-1,1));
				$Numero[13]=intval(substr($RecebeCNPJ,13-1,1));
				$Numero[14]=intval(substr($RecebeCNPJ,14-1,1));

				$soma=$Numero[1]*5+$Numero[2]*4+$Numero[3]*3+$Numero[4]*2+$Numero[5]*9+$Numero[6]*8+$Numero[7]*7+
				$Numero[8]*6+$Numero[9]*5+$Numero[10]*4+$Numero[11]*3+$Numero[12]*2;

				$soma=$soma-(11*(intval($soma/11)));

				if ($soma==0 || $soma==1){
					$resultado1=0;
				}else{
					$resultado1=11-$soma;
				}

				if ($resultado1==$Numero[13]){
					$soma=$Numero[1]*6+$Numero[2]*5+$Numero[3]*4+$Numero[4]*3+$Numero[5]*2+$Numero[6]*9+
					$Numero[7]*8+$Numero[8]*7+$Numero[9]*6+$Numero[10]*5+$Numero[11]*4+$Numero[12]*3+$Numero[13]*2;
					$soma=$soma-(11*(intval($soma/11)));
					if ($soma==0 || $soma==1){
						$resultado2=0;
					}else{
						$resultado2=11-$soma;
					}

					if ($resultado2==$Numero[14]){
						$Cnpj=str_replace(array('.','/','-'),'',$Cnpj);
						return $Cnpj;
					}else{
						return FALSE;
					}
				}else{
					return FALSE;
				}
			}
		}

		
}

?>