<?php

	function mongoConnect()
	{
		$connection = new Mongo("mongodb://username:password1@ds049337.mongolab.com:49337/bvrit");
		$mdb = $connection->selectDB('bvrit');
		
		return $mdb;
		
	}
?>
