<?php
	function sqlConnect()
	{
		$sql = mysql_pconnect("localhost","schwarzenegger","191088");
		return $sql;
	}

	function sqlQuery($query, $msg=null)
	{
		$query_result = mysql_query() or die ($msg . ": " . mysql_error());
		return $query_result;
	}

	function sqlArray($query_result)
	{
		$array = mysql_fetch_array($query_result);
		return $array;
	}
	

	function sqlClose($sql)
	{
		mysql_close($sql);		
	}
?>
