<?php

    class Despesa
    {
        var $reserva;
        var $servico;
        var $database;

        public function Despesa()
        {
            $this->database = new bancoClass();
        }

        public function loadDespesa($reserva,$servico)
        {
            $this->reserva = $reserva;
            $this->servico = $servico;
        }

        public function saveDespesa()
        {
            $this->database->setNewDespesa($this->reserva,$this->servico);
        }

        public function getReservasAtivas()
        {
            return $this->database->getActiveApt();
        }

        public function getServicos()
        {
            return $this->database->getAllServico();
        }
    }

?>
