<?php
function sql(){
    $sql=new database();
	return $sql;
}
class database{
	public $databaseName;
	public $connection;
	public function connect($name){
		$this->databaseName=$name;
		@$arr=explode("://", $name);
		$this->connection=mysqli_connect($arr[0],$arr[1],$arr[2],$arr[3]);
		if (mysqli_connect_errno())
			die("Failed to connect to database server");
	}
	public function queryNumRow($query){
		if (@$queryResult=mysqli_query($this->connection,$query))
			return mysqli_num_rows($queryResult);
		else
			die("some error occured");
	}
	public function queryInsert($query){
		if(@$queryResult=mysqli_query($this->connection,$query))
			return 1;
		else
			die("some error occured");

	}
}
?>  