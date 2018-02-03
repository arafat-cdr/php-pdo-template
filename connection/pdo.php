<?php

class pdo_connection
{
	private $servername = "localhost";
	private $username   = "root";
	private $password   = "";
	private $dbname     = "db_shop";
	public  $con;
	public function __construct()
	{
		if(!isset($this->con))
		{

		try 
		 {
    		$this->con = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    		//set the PDO error mode to exception
    		$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		$this->con->exec("SET CHARACTER SET utf8");
    		echo "Connected successfully"; 
    	 }

		catch(PDOException $e)
    	 {
    		die("Connection failed: ".$e->getMessage());
    	 }

		}

	}

	public function insert_query($stmt)
	{
		$status = $stmt->execute();;
		
		if($status)
		{
			echo "Insert query Successfull<br/>";
			return $status;
		}
		else
		{
			echo "Insert query Fails <br/>";
			return false;
		}
	}

	public function select_query($stmt)
	{
		 $stmt->execute();
		if($stmt)
		{
			//echo "<br/>Select query Successfull<br/><br/>";
			return $stmt;
		}
		else
		{
			echo "<br/>Select query Fails <br/>";
			return false;
		}
	}

	public function update_query($stmt)
	{
		$status = $stmt->execute();

		if($status)
		{
			echo "Update query Successfull<br/>";
			return $status;
		}
		else
		{
			echo "Update query Fails <br/>";
			return false;
		}
	}

	public function delete_query($stmt)
	{
		$status = $stmt->execute();
		if($status)
		{
			echo "Delete query Successfull<br/>";
			return $status;
		}
		else
		{
			echo "Delete query Fails <br/>";
			return false;
		}
	}
}


?>