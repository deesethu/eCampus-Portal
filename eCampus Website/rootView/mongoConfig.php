<?php

	function mongoConnect()
	{
		$connection = new Mongo("mongodb://user:pwd@ds047447.mongolab.com:47447/main_database");
		$mdb = $connection->selectDB('main_database');
		
		return $mdb;
		
	}
?>
