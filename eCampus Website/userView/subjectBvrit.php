<?php
include ('mongoConfigBvrit.php');
$mdb=mongoConnect();

$subjects=$mdb->selectCollection("subjects");
$subDetails=array("sid"=>"s001","subjectName"=>"DLD","subjectInfo"=>"Digital Logic Design","branchName"=>"Computer Science and Engineering","branchAbbv"=>"CSE","branchCode"=>"b001","year"=>"2");
$subjects->insert($subDetails);
$subDetails=array("sid"=>"s002","subjectName"=>"ES","subjectInfo"=>"Environmental Science","branchName"=>"Chemical Engineering","branchAbbv"=>"CHEM","branchCode"=>"b002","year"=>"1");
$subjects->insert($subDetails);
$subDetails=array("sid"=>"s003","subjectName"=>"SE","subjectInfo"=>"Software Engineering","branchName"=>"Computer Science and Engineering","branchAbbv"=>"CSE","branchCode"=>"b001","year"=>"3");
$subjects->insert($subDetails);
$subDetails=array("sid"=>"s004","subjectName"=>"PS","subjectInfo"=>"Probability and Statistics","branchName"=>"Mechanical Engineering","branchAbbv"=>"MECH","branchCode"=>"b003","year"=>"3");
$subjects->insert($subDetails);
?>