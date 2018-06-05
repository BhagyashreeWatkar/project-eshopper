<?php
 require_once 'db_connect.php';
 abstract class db_helper extends db_connect implements db_general_function
 {
 	function insert($table,$columns,$values)
 	{
 		$sql ="insert into $table ($columns) values ($values)";
 		//echo $sql;
 		return $this->conn->query($sql) or die($this->conn->error);
 	}



    function update($table,$records,$condition)
    {

    	$sql="update $table set $records where $condition";

    	return $this->conn->query($sql) or die($this->conn->error);
    }
 	function delete($table,$condition)
 	{
 		$sql="delete from $table where $condition";
 		//echo $sql;

 		return $this->conn->query($sql) or die($this->conn->error);
 	}
 	function select($coloum,$table,$condition)
 	{
 		//echo "test123";
 		// echo $coloum;
 		// echo $table;
 		// echo $condition;

 		$abc="select $coloum from $table where $condition";
 		//echo $abc;
 		//print_r($this->conn);

 		$result=mysqli_query($this->conn, $abc) or die($this->conn);
 		// echo "<pre>";
 		// print_r($result);
 		// echo "</pre>";

 		if($result->num_rows>0)
 		{
 			while($ans=$result->fetch_array(MYSQLI_ASSOC))
 			{
 				//echo 1;
 				// echo "<pre>";
 				// print_r($ans);
 				// echo "</pre>";
 				$data[]=$ans;
 			}
 			// echo "<pre>";
 			// print_r($data);
 			// echo "</pre>";
 			return $data;
 		}
 		else
 		{
 			//echo 0;
 			return 0;
 		}
 	}
 }
 ?>