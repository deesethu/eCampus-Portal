<?php

include("mongoConfig.php");

$mdb=mongoConnect();

$colleges = $mdb->selectCollection('colleges');

$colgDetails=array("uid"=>"u001","cid"=>"c001","collegeName"=>"BVRIT");
$colleges->insert($colgDetails);
$colgDetails=array("uid"=>"u002","cid"=>"c002","collegeName"=>"VNR");
$colleges->insert($colgDetails);
$colgDetails=array("uid"=>"u003","cid"=>"c003","collegeName"=>"CBIT");
$colleges->insert($colgDetails);
$colgDetails=array("uid"=>"u002","cid"=>"c004","collegeName"=>"MVSR");
$colleges->insert($colgDetails);

?>