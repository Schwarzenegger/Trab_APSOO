<?php

   class Servico
   {
	var $id;
	var $nome;
	var $valor;
	var $database;

	public function getId() { return $this->id; }
	public function getNome() { return $this->nome; }
	public function getValor() { return $this->valor; }

	public function Servico()
	{
		$this->database = new bancoClass();
	}
	
	public function getServicos()
	{
		return $this->database->getAllServico();
	}

	public function loadServicoById($id)
	{
		$servico_result = $this->database->getServicoById($id);
		if($servico = mysql_fetch_array($servico_result))
		{
			$this->id = $servico["id"];
			$this->nome = $servico["srv_nome"];
			$this->valor = $servico["srv_valor"];
		}
		else
		{
			return false;
		}
	}

	public function loadServico($nome, $valor)
	{
		$this->nome = $nome;
		$this->valor = $valor;		
	}

	public function verifyNome()
	{
		$lenght = strlen($this->nome);
		if($lenght < 3)
		   return false;
		
		return true;
	}

	public function verifyValor()
	{
		if(!is_numeric($this->valor))
		   return false;

		if($this->valor <= 0)
		   return false;

		return true;
	}

	public function saveServico()
	{
		$this->database->setNewServico($this->nome,$this->valor);
	}
	
	public function updateServico()
	{
		$this->database->updateService($this->id,$this->nome,$this->valor);
	}
	
	public function deletarServico()
	{
		$this->database->deleteServico($this->id);
	}

       
   }

?>
