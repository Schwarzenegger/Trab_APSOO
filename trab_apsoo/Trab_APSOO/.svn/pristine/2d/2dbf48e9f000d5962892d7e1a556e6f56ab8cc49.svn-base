<?php

	class Reserva
	{
		var $id;
		var $cli_id;
		var $apt_id;
		var $datai;
		var $dataf;
		var $status;
		var $database;

		public function Reserva()
		{
			$this->database = new bancoClass();
		}


		public function getId() { return $this->id; }
		public function getCliente() { return $this->cli_id; }
		public function getApt() { return $this->apt_id; }
		public function getDataI() { return $this->datai; }
		public function getDataF() { return $this->dataf; }
		public function getStatus() { return $this->status; }

		public function getClientes()
		{
			$clientes = $this->database->getAllClientes();
			while($cliente = mysql_fetch_array($clientes,MYSQL_ASSOC))
			{
				echo "<option value='" .$cliente["id"]. "'>" .$cliente["cli_nome"]. "</option>";
			}
		}

		public function getApts()
		{
			$allapts = $this->database->getAllApt();
			while($apartamento = mysql_fetch_array($allapts,MYSQL_ASSOC))
			{
	
				echo "<option value='" .$apartamento["id"]. "'>" .$apartamento["apt_numero"]. "</option>";		
	  		}
		}

        public function checkDate()
        {
            $data = date("Y-m-d");
            if($data > $this->datai)
                return false;

            return true;
        }

        public function checkDateF()
        {
            if($this->datai > $this->dataf)
                return false;

            return true;
        }

		public function checkApt()
		{
			return $this->database->checkAptAvaDate($this->apt_id,$this->datai,$this->dataf);
		}


		public function loadReserva($cliente,$apt,$data_i,$data_f)
		{
			$this->cli_id = $cliente;
			$this->apt_id = $apt;
			$this->datai = $data_i;
			$this->dataf = $data_f;
		}

		public function saveReserva()
		{
			$this->database->setNewReserva($this->cli_id,$this->apt_id,$this->datai,$this->dataf);	
		}


	}


?>
