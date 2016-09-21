<?php session_start();
if(!isset($_SESSION["uname"]))
	header('Location: http://localhost/ecampus/index.php');
include ("mongoConfigBvrit.php");
$mdb = mongoConnect();
$userDetails = $mdb->selectCollection("userDetails");


	$obj["username"] = $_POST["name"];
	$obj["email"] = $_POST["email"];
	$obj["branchCode"] = $_POST["branch"];
	$obj["year"] = $_POST["year"];
	$obj["mobile"] = $_POST["mobile"];
	$obj["gender"] = $_POST["gender"];
	$update=$userDetails->update(array('username' => $_SESSION["uname"]), array('$set' => array("username"=>$obj["username"],"email"=>$obj["email"],"branchCode"=>$obj["branch"],"year"=>$obj["year"],"mobile"=>$obj["mobile"],"gender"=>$obj["gender"])));
	$_SESSION["uname"]=$obj["username"];
    if($update==1){
		header('Location: http://localhost/ecampus/userview/user1.php');
	}
	
   /* $cursor = $userDetails->find(array("username"=>$_SESSION["uname"]));
foreach($cursor as $obj)
{
    print_r($obj);
    echo("<br/>");
}*/
?>	







