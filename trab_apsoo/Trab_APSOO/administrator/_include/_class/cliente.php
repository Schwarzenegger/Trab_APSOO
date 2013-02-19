<?php
	class Cliente
	{
		var $id;
		var $nome;
		var $cpf;
		var $endereco;
		var $cidade;
		var $telefone;
		var $database;

		public function Cliente()
		{
			$this->database = new bancoClass();
		}
		

		public function getId() { return $this->id; }
		public function getNome() { return $this->nome; }
		public function getCPF() { return $this->cpf; }
		public function getEndereco() { return $this->endereco; }
		public function getCidade() { return $this->cidade; }
		public function getTelefone() { return $this->telefone; }

		public function loadCliente($nome,$cpf,$endereco,$cidade,$telefone)
		{
			$this->nome = $nome;
			$this->cpf = $cpf;
			$this->endereco = $endereco;
			$this->cidade = $cidade;
			$this->telefone = $telefone;		
		}
	
		public function verifyNome()
		{
			$lenght = strlen($this->nome);
			if($lenght < 7)
				return false;

			if(!strstr($this->nome," "))
				return false;
		
			return true;
		}

		public function checkCPF()
		{
			return $this->database->checkCPF($this->cpf);
		}		

		public function verifyCPF()
       		{
            		if( !(is_numeric($this->cpf)) )
            		{
                		return false;
            		}

			/*
           
             		if( ($this->cpf == '11111111111') ||
                 	($this->cpf == '22222222222') ||
                     	($this->cpf == '33333333333') ||
                 	($this->cpf == '44444444444') ||
		        ($this->cpf == '55555555555') ||
		        ($this->cpf == '66666666666') ||
		        ($this->cpf == '77777777777') ||
		        ($this->cpf == '88888888888') ||
		        ($this->cpf == '99999999999') ||
		        ($this->cpf == '00000000000')
		        )
                 	{
                   		return false;
               		}
			*/

		   	//PEGA O DIGITO VERIFIACADOR
		       $dv_informado = substr($this->cpf, 9,2);

		       for($i=0; $i<=8; $i++)
		       {
		            $digito[$i] = substr($this->cpf, $i,1);
		       }

		       //CALCULA O VALOR DO 10º DIGITO DE VERIFICAÃ‡Ã‚O
		       $posicao = 10;
		       $soma = 0;

		       for($i=0; $i<=8; $i++)
		       {
		            $soma = $soma + $digito[$i] * $posicao;
		            $posicao = $posicao - 1;
		       }

		       $digito[9] = $soma % 11;

		       if($digito[9] < 2)
		       {
		            $digito[9] = 0;
		       }
		       else
		       {
		            $digito[9] = 11 - $digito[9];
		       }

		       //CALCULA O VALOR DO 11º DIGITO DE VERIFICAÃ‡ÃƒO
		       $posicao = 11;
		       $soma = 0;

		       for ($i=0; $i<=9; $i++)
		       {
		            $soma = $soma + $digito[$i] * $posicao;
		            $posicao = $posicao - 1;
		       }

		       $digito[10] = $soma % 11;

		       if ($digito[10] < 2)
		       {
		            $digito[10] = 0;
		       }
		       else
		       {
		            $digito[10] = 11 - $digito[10];
		       }

		      //VERIFICA SE O DV CALCULADO é IGUAL AO INFORMADO
		      $dv = $digito[9] * 10 + $digito[10];
		      if ($dv != $dv_informado)
		      {
		           return false;
		      }
		      else
		           return true;
		}

		public function verifyEndereco()
		{
			$lenght = strlen($this->endereco);

			if($lenght < 10)
				return false;

			return true;
		}
		
		public function verifyCidade()
		{
			$lenght = strlen($this->cidade);
			
			if($lenght < 4)
				return false;
			
			return true;
		}

		public function verifyTelefone()
		{
			if(!is_numeric($this->telefone))
			{
				return false;
			}

			$lenght = strlen($this->telefone);
			
			if($lenght != 8)
				return false;

			return true;
		}

		public function saveCliente()
		{
			$this->database->setNewCliente($this->nome,$this->cpf,$this->endereco,$this->cidade,$this->telefone);
		}


	}

?>
