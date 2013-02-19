<?php

class bancoClass
{

   var $host = "localhost";
   var $user = "schwarzenegger";
   var $pass = "191088";
   var $database = "schwarzenegger";
   var $connection;



    /**
    *Construtor
    */
   public function bancoClass(){
      $this->connection = mysql_pconnect($this->host,$this->user,$this->pass);
      if(!($this->connection)){
         echo("<H1>Problema ao abrir conex&atilde;o com o MySQL!</H1>");
         exit;
      }
      if (!mysql_select_db($this->database,$this->connection)){
         echo("<H1>Problema com a abertura do Banco de Dados!</H1>");
         exit;
      }
      mysql_query("SET NAMES UTF8");

   }

   /**
    *Abre uma nova conexao
    * @return <type>
    */
   private function abriConexao(){
      $this->connection = mysql_pconnect($this->host,$this->user,$this->pass);
      if(!($this->connection)){
         echo("<H1>Problema ao abrir conex&atilde;o com o MySQL!</H1>");
         exit;
      }
      if (!mysql_select_db($this->database,$this->connection)){
         echo("<H1>Problema com a abertura do Banco de Dados!</H1>");
         exit;
      }
      mysql_query("SET NAMES UTF8");
      $conexao = $this->connection;
      return $conexao;

   }

   /**
    * Fecha uma conexao
    */
   public function fecharConexao(){
      $this->abriConexao();
      mysql_close($this->connection)
         or die("Erro ao fechar conexao: ".mysql_error());

   }

   /**
    *Cria uma nova reserva
    * @param <type> $cli_id
    * @param <type> $aptid
    * @param <type> $datai
    * @param <type> $dataf
    */
   public function setNewReserva($cli_id,$aptid,$datai,$dataf){
      $this->abriConexao();
      $query = "INSERT INTO res_reserva(cli_id, apt_id,res_datai,res_dataf,res_status)
                 VALUES ('$cli_id','$aptid','$datai','$dataf','1')";

      $query_cadastra = mysql_query($query)
         or die("Erro ao adicionar reserva cliente: ".mysql_error());

   }

   /**
    *Cancela uma Reserva
    * @param <type> $id
    */
   public function cancelReserva($id)
   {
        $this->abriConexao();
		$query = "UPDATE res_reserva SET res_status = '0' WHERE id = '$id'";

        $query_update = mysql_query($query)
          or die("Erro update mudar status para cancelado: ".mysql_error());
       
   }

   /**
    *Torna uma reserva valida
    * @param <type> $id
    */
   public function validateReserva($id)
   {
        $this->abriConexao();
		$query = "UPDATE res_reserva SET res_status = '2' WHERE id = '$id'";

        $query_update = mysql_query($query)
          or die("Erro update mudar status para valido: ".mysql_error());

   }


   /**
    *Fecha uma reserva
    * @param <type> $id
    */
   public function closeReserva($id)
   {
        $this->abriConexao();
		$query = "UPDATE res_reserva SET res_status = '3' WHERE id = '$id'";

        $query_update = mysql_query($query)
          or die("Erro update mudar status para fechado: ".mysql_error());

   }

   /**
    *Pega todas as reservas Ativas
    * @return <type> 
    */
   public function getActiveReservas()
   {
      $this->abriConexao();
      $query = "SELECT res.id, cli.cli_nome, apt.apt_numero, res.res_datai, res.res_dataf
                FROM res_reserva as res, cli_cliente as cli, apt_apartamentos as apt
                WHERE res.cli_id = cli.id AND res.apt_id = apt.id AND res.res_status = '2'";

      return mysql_query($query);

   }
   /**
    *Pega todas as reservas em espera
    * @return <type>
    */
   public function getInWaitReservas()
   {
      $this->abriConexao();
      $query = "SELECT res.id, cli.cli_nome, apt.apt_numero, res.res_datai, res.res_dataf
                FROM res_reserva as res, cli_cliente as cli, apt_apartamentos as apt
                WHERE res.cli_id = cli.id AND res.apt_id = apt.id AND res.res_status = '1'";

      return mysql_query($query);

   }

   /**
    *Pega todas as reservas concluidas
    * @return <type>
    */
   public function getConcludedReservas()
   {
      $this->abriConexao();
      $query = "SELECT res.id, cli.cli_nome, apt.apt_numero, res.res_datai, res.res_dataf
                FROM res_reserva as res, cli_cliente as cli, apt_apartamentos as apt
                WHERE res.cli_id = cli.id AND res.apt_id = apt.id AND res.res_status = '3'";

      return mysql_query($query);

   }

   /**
    *Pega todas as reservas Canceladas
    * @return <type>
    */
   public function getCanceledReservas()
   {
      $this->abriConexao();
      $query = "SELECT res.id, cli.cli_nome, apt.apt_numero, res.res_datai, res.res_dataf
                FROM res_reserva as res, cli_cliente as cli, apt_apartamentos as apt
                WHERE res.cli_id = cli.id AND res.apt_id = apt.id AND res.res_status = '0'";

      return mysql_query($query);

   }

   /**
    *Pega os demais dados da reserva a partir da sua ID
    * @param <type> $id
    */
   public function getReservasById($id)
   {
      $this->abriConexao();
      $query = "SELECT cli.cli_nome, apt.apt_numero,res.res_datai,res.res_dataf,res.res_status
      FROM res_reserva as res, cli_cliente as cli, apt_apartamentos as apt
      WHERE res.cli_id = cli.id AND res.apt_id = apt.id AND res.id = '$id' ";
      return $select_query = mysql_query($query);
   }

   /**
    *Cria um novo cliente
    * @param <type> $nome
    * @param <type> $cpf
    * @param <type> $endereco
    * @param <type> $cidade
    * @param <type> $telefone
    */
   public function setNewCliente($nome,$cpf,$endereco,$cidade,$telefone){
      $this->abriConexao();
      $query = "INSERT INTO cli_cliente(cli_nome, cli_cpf, cli_endereco, cli_cidade, cli_telefone)
                 VALUES ('$nome','$cpf','$endereco','$cidade','$telefone')";

      $query_cadastra = mysql_query($query)
        or die("Erro ao cadastrar cliente: ".mysql_error());

   }
   
   /**
    *Checa se o Cpf ja existe no banco
    * @param <type> $cpf
    * @return <type>
    */
   public function checkCPF($cpf){

      $this->abriConexao();

      $query = "SELECT * FROM cli_cliente WHERE cli_cpf = '$cpf'";
      $query_check = mysql_query($query)
        or die("Erro ao checar cpf: ".mysql_error());
        if (!mysql_num_rows($query_check)> 0){
         return true;
        }
        else{
        return false;
        }
      }
   
   /**
    *Checa se o nome do cliente e valido
    * @param <type> $nome
    * @return <type>
    */
   public function checkNome($nome){
      $this->abriConexao();
      $query = "SELECT * FROM cli_cliente WHERE cli_nome = '$nome'";
      $query_check = mysql_query($query)
        or die("Erro ao cadastrar cliente: ".mysql_error());
        if (mysql_num_rows($query_check)> 0){
         return true;
        }
        else{
        return false;
        }
      }


   /**
    *Pega o Id do cliente a partir do seu nome
    * @param <type> $cli_nome
    * @return <type>
    */
   public function getClienteId($cli_nome){
      $this->abriConexao();
      $query = "SELECT cli_id FROM cli_cliente WHERE cli_nome = '$cli_nome' ";
      return mysql_query($query);
      // or die ("Erro ao tentar pegar o id do cliente".mysql_error());


   }

   /**
    *Pega as informacoes do cliente a partir do seu ID
    * @param <type> $id
    */
   public function getCliente($id){
      $this->abriConexao();
      $query = "SELECT cli_nome,cli_cpf,cli_endereco,cli_cidade,cli_telefone FROM cli_cliente WHERE cli_id = '$id' ";
      return $select_query = mysql_query($query);
      //or die ("Erro ao tentar pegar o cliente".mysql_error());

   }

   /**
    *Pega todos os clientes
    * @return <type>
    */
   public function getAllClientes(){
      $this->abriConexao();
       $query = "SELECT *  FROM cli_cliente ";
      // return $query;
      return mysql_query($query);
      //  or die ("Erro ao tentar pegar todos os Clientes".mysql_error());

      
   }

   /**
    *Cria um Novo Servico
    * @param <type> $nome
    * @param <type> $valor
    */
   public function setNewServico($nome, $valor){
      $this->abriConexao();
      $query = "INSERT INTO srv_servico(srv_nome, srv_valor)
                 VALUES ('$nome','$valor')";

      $query_cadastra = mysql_query($query)
       or die("Erro ao cadastrar servico: ".mysql_error());

   }

   /**
    *Pega todos os servicos
    * @return <type>
    */
   public function getAllServico(){
      $this->abriConexao();
      $query = "SELECT * FROM srv_servico";

      return mysql_query($query);
      // or die ("Erro ao tentar pegar os servicos".mysql_error());

   }

   /**
    *Pega o Id do servico a partir do nome
    * @param <type> $nome
    */

   public function getIdServico($nome){
      $this->abriConexao();
      $query = "SELECT id FROM srv_valor WHERE srv_nome = '$nome'";
      $select_query = mysql_query($query);
      // or die ("Erro ao tentar o id servico".mysql_error());


   }
   
   /**
    *Pega um servico a partir do seu ID
    * @param <type> $id
    * @return <type>
    */
   public function getServicoById($id){
      $this->abriConexao();
      $query = "SELECT * FROM srv_servico WHERE id = '$id'";
      $select_query = mysql_query($query);
	  return $select_query;
      // or die ("Erro ao tentar o id servico".mysql_error());


   }

   /**
    *Deleta um servico do banco
    * @param <type> $id
    */
   public function deleteServico($id){
      $this->abriConexao();
      $query = "DELETE FROM srv_servico WHERE id = '$id'";
      $select_query = mysql_query($query)
       or die ("Erro ao tentar deletar o servico".mysql_error());
   }

   /**
    *Checa se o nome do servico esta disponivel
    * @param <type> $srv_name
    * @return <type>
    */
   public function checkSerName($srv_name){
      $this->abriConexao();
      $query = "SELECT * FROM srv_servico WHERE srv_nome = '$srv_name'";
      $query_check = mysql_query($query)
        or die("Erro ao checar Nome: ".mysql_error());
      if (mysql_num_rows($query_check)> 0){
        return true;
      }
      else{
        return false;
      }
   }

   /**
    *Retorna todos os apartamentos
    * @return <type>
    */
   public function getAllApt(){
      $this->abriConexao();
      $query = "SELECT id,apt_numero,atp_id, apt_ocupado FROM apt_apartamentos";
      return mysql_query($query);
      //  or die ("Erro ao tentar pegar os apartamentos validos".mysql_error());
   }

   /**
    *Pega todos os apartamentos nao ocupados
    * @return <type>
    */
   public function getValidApt(){
      $this->abriConexao();
      $query = "SELECT apt_numero,atp_id, apt_ocupado FROM apt_apartamentos WHERE apt_ocupado = '0'";
      return mysql_query($query);
      //  or die ("Erro ao tentar pegar os apartamentos validos".mysql_error());
   }

   /**
    *Pega todos os apartamentos com reservas ativas
    * @return <type>
    */
   public function getActiveApt(){
      $this->abriConexao();
      $query = "SELECT res.id,apt.apt_numero,cli.cli_nome
                FROM apt_apartamentos as apt,res_reserva as res, cli_cliente as cli
                WHERE apt.id = res.apt_id AND cli.id = res.cli_id AND res.res_status = '2'";
      return mysql_query($query);

   }

   /**
    *Checa se o apartamento ta ocupado
    * @param <type> $apt_numero
    * @return <type>
    */
   public function checkApt($apt_numero){
      $this->abriConexao();
      $query = "SELECT * FROM apt_apartamentos WHERE apt_numero = '$apt_numero' AND apt_ocupado = '0'";
      $query_check = mysql_query($query)
        or die("Erro ao checar numero do apartamentos: ".mysql_error());
      if (mysql_num_rows($query_check)> 0){
        return true;
      }
      else{
        return false;
      }
   }

   /**
    * Verifica se um apartamento esta disponivel numa determinada data
    * @param <type> $apt_id
    * @param <type> $res_datai
    * @param <type> $res_dataf
    * @return <type>
    */
   public function checkAptAvaDate($apt_id,$res_datai,$res_dataf){
       $this->abriConexao();
       $query = "SELECT * FROM apt_apartamentos as apt, res_reserva as res 
                 WHERE apt.id = res.apt_id AND (res_datai BETWEEN '$res_datai' AND '$res_dataf')  AND res.apt_id = '$apt_id'";
       $query_check = mysql_query($query)
        or die("Erro ao checar data das reservas: ".mysql_error());
       if (mysql_num_rows($query_check)> 0){
         return false;
       }
       else{
         return true;
       }

   }

    /**
     * Update nos dados da tabela servico
     * @param <type> $id
     * @param <type> $srv_nome
     * @param <type> $srv_valor
     */
   public function updateService($id,$srv_nome,$srv_valor){
		$this->abriConexao();
		$query = "UPDATE srv_servico SET srv_nome = '$srv_nome', srv_valor = '$srv_valor' WHERE id = '$id'";

        $query_update = mysql_query($query)
          or die("Erro update de servico: ".mysql_error());
   
   
   }

   /**
    *Pega os dados de um serviço a partir da id da reserva
    * @param <type> $res_id
    * @return <type>
    */
   public function getServicoByRes($res_id)
   {
      $this->abriConexao();
      $query = "SELECT srv.id,srv.srv_nome, srv.srv_valor
                FROM srv_servico as srv,des_despesas as des,res_reserva as res
                WHERE srv.id = des.srv_id AND des.res_id = res.id AND res.id = '$res_id'";
      return mysql_query($query);

   }

   /**
    *Cria uma nova Despesa para um cliente
    * @param <type> $res_id
    * @param <type> $srv_id
    */
   public function setNewDespesa($res_id,$srv_id){
       $this->abriConexao();
       $query = "INSERT INTO des_despesas(res_id,srv_id)
                 VALUES ('$res_id','$srv_id')";

       $query_cadastra = mysql_query($query)
         or die("Erro ao adicionar despesa do Cliente: ".mysql_error());

   }

    /**
    *Pega todas as depesas do Cliente
    * @param <type> $res_id
    * @return <type>
    */

   public function getAllDespesasOfClient($res_id){
      $this->abriConexao();
      $query = "SELECT des.srv_id FROM des_despesas as des,res_reserva as res
                WHERE res.id = des.res_id AND des.res_id='$res_id' AND des.status = '1'";

      return mysql_query($query);

   }
   /**
    * Deleta uma despesa do cliente, usado na parte de estorno de despesa
    * @param <type> $res_id
    */

   public function deleteDespesaOfCliente($res_id)
   {
        $this->abriConexao();
        $query = "DELETE FROM des_despesas WHERE id = '$res_id'";
        $select_query = mysql_query($query)
          or die ("Erro ao tentar deletar o servico".mysql_error());

   }

   /**
    * Deleta a despesa
    * @param <type> $id
    */
   public function deleteDespesa($id)
   {
      $this->abriConexao();
      $query = "DELETE FROM des-despesas WHERE id = '$id'";
      $select_query = mysql_query($query)
       or die ("Erro ao tentar deletar o despesa".mysql_error());

   }

   /**
    *Pega a taxa de ocupação numa data X
    * @param <type> $datax
    */
   public function ocupation($datax)
   {
       $this->abriConexao();
       $query = "SELECT count(id) FROM res_reserva as res
                 WHERE res.res_datai >= '$datax' AND res.res_dataf <= '$dataf' AND  res.res_status = 2)";
       $query_ocupation = mysql_query($query);

       $query2 = "SELECT count(id) FROM apt_apartamentos";
       $query_ap = mysql_query($query2);

       $row = mysql_fetch_row($query_ocupation);
       $row2 = mysql_fetch_row($query_ap);

       $ocupation = $row[0];
       $ap = $row2[0];

       $tax = $ocupation/$ap;

       return ($ocupation);
   }

   /**
    *Encontra o apartamento do Hospede X
    * @param <type> $id 
    */
   public function find($id)
   {
       $this->abriConexao();
       $query = "SELECT apt.apt_numero FROM res_reserva as res, apt_apartamentos as apt WHERE res.cli_id = '$id' AND res.res_status = 2 AND res.apt_id = apt.id";

       return mysql_query($query);

   }

}


?>





