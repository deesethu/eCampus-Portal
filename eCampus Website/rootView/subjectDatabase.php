<?php
include ('mongoConfig.php');
$mdb=mongoConnect();

$subjects=$mdb->selectCollection("subjects");
$subDetails=array("uid"=>"u001","universityName"=>"JNTUH","colgid"=>"c001","collegeName"=>"BVRIT","sid"=>"s001","subjectName"=>"DLD","subjectInfo"=>"Digital Logic Design","branchName"=>"Computer Science and Engineering","branchAbbv"=>"CSE","branchCode"=>"b001","year"=>"2");
$subjects->insert($subDetails);
$subDetails=array("uid"=>"u002","universityName"=>"JNTUH","colgid"=>"c002","collegeName"=>"VNR","sid"=>"s002","subjectName"=>"ES","subjectInfo"=>"Environmental Science","branchName"=>"Chemical Engineering","branchAbbv"=>"CHEM","branchCode"=>"b002","year"=>"1");
$subjects->insert($subDetails);
$subDetails=array("uid"=>"u003","universityName"=>"OU","colgid"=>"c003","collegeName"=>"CBIT","sid"=>"s003","subjectName"=>"SE","subjectInfo"=>"Software Engineering","branchName"=>"Computer Science and Engineering","branchAbbv"=>"CSE","branchCode"=>"b001","year"=>"3");
$subjects->insert($subDetails);
$subDetails=array("uid"=>"u004","universityName"=>"JNTUH","colgid"=>"c004","collegeName"=>"DVR","sid"=>"s004","subjectName"=>"PS","subjectInfo"=>"Probability and Statistics","branchName"=>"Mechanical Engineering","branchAbbv"=>"MECH","branchCode"=>"b003","year"=>"3");
$subjects->insert($subDetails);
?>