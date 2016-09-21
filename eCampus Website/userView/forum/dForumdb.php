<?php

include("mongoConfigForum.php");

$mdb=mongoConnect();

$dFcategories = $mdb->selectCollection('dFcategories');
$dFpm = $mdb->selectCollection('dFpm');
$dFtopics = $mdb->selectCollection('dFtopics');
$dFusers = $mdb->selectCollection('dFusers');

$dFcat = array("id"=>"1","name"=>"CAT1","description"=>"category1","position"=>"1");
$dFcategories->insert($dFcat);
$dFcat = array("id"=>"2","name"=>"CAT2","description"=>"category2","position"=>"2");
$dFcategories->insert($dFcat);
$dFcat = array("id"=>"3","name"=>"CAT3","description"=>"category3","position"=>"3");
$dFcategories->insert($dFcat);

$dFpmess = array("id"=>"1","id2"=>"1","title"=>"PM","user1"=>"1","user2"=>"1","message"=>"hello","timestamp"=>"100","user1read"=>"no","user2read"=>"no");
$dFpm->insert($dFpmess);
$dFpmess = array("id"=>"1","id2"=>"2","title"=>"PMess","user1"=>"2","user2"=>"2","message"=>"hai","timestamp"=>"100","user1read"=>"no","user2read"=>"no");
$dFpm->insert($dFpmess);

$dFtopic = array("parent"=>"1","id"=>"1","id2"=>"1","title"=>"topic1","message"=>"message","authorid"=>"1","timestamp"=>"100","timestamp2"=>"200");
$dFtopics->insert($dFtopic);
$dFtopic = array("parent"=>"1","id"=>"2","id2"=>"2","title"=>"topic2","message"=>"message sent","authorid"=>"2","timestamp"=>"100","timestamp2"=>"300");
$dFtopics->insert($dFtopic);

$dFuser = array("id"=>"1","username"=>"kavya","password"=>"1234567","email"=>"kavya924u@gmail.com","avatar"=>"","signup_date"=>"27");
$dFusers->insert($dFuser);
$dFuser = array("id"=>"2","username"=>"deepak","password"=>"1234567","email"=>"dpk.2391@gmail.com","avatar"=>"","signup_date"=>"27");
$dFusers->insert($dFuser);

?>