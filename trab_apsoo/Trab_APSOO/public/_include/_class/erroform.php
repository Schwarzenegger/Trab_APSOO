<?php 

	class ErroForm 
	{
		var $erro;
		var $erroList;
		
		public function getWrong() { return $this->erro; }
		public function setWrong($bool) { $this->erro = $bool; }
		

		public function ErroForm()
		{
			$this->erro = false;
			$this->erroList = ";";
		}
		
		public function addError($new_error)
		{
			$this->erroList = $this->erroList . $new_error . ";";
		}
		
		public function clearErroList()
		{
			$this->erroList = ";";
		}
		
		public function displayError($campo,$mensagem)
		{
			if( strstr($this->erroList,$campo) )
			{
				echo "<tr><td></td><td class='alert'>" .$mensagem. "</td></tr>";
			}
		}
		
}


?>