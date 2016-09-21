<?php

include("mongoConfig.php");

$mdb=mongoConnect();

$universities = $mdb->selectCollection('universities');

$univDetails=array("uid"=>"u001","universityName"=>"JNTUH");
$universities->insert($univDetails);
$univDetails=array("uid"=>"u002","universityName"=>"JNTUK");
$universities->insert($univDetails);
$univDetails=array("uid"=>"u003","universityName"=>"OU");
$universities->insert($univDetails);
$univDetails=array("uid"=>"u004","universityName"=>"VITU");
$universities->insert($univDetails);
?>