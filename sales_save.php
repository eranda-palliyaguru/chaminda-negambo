<?php
session_start();
include('connect.php');
date_default_timezone_set("Asia/Colombo"); 

$a1 = $_POST['name'];
$f = $_POST['qty'];
$e = $_POST['dis'];
$price = $_POST['price'];
$c = $_POST['invoice'];
$type_q = $_POST['type_q'];

$result = $db->prepare("SELECT * FROM product WHERE product_id = '$a1' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
            $b = $row['name'];
			$d = $row['sell'];
			$g = $row['code'];
			$cost = $row['cost'];
			$type = $row['type'];
		}





if($price>0){
	$d=$price;
}

$e=$d/100*$e;

$d=$d-$e;

$profit=$d-$cost;
$profit=$profit*$f;

$d=$d*$f;
$e=$e*$f;

$date=date("Y-m-d");
// query
$sql = "INSERT INTO sales_list (product_id,name,invoice_no,price,dic,qty,code,profit,type,qty_type,date) VALUES (:a,:b,:c,:d,:e,:f,:g,:pro,:type,:type_q,:date)";
$ql = $db->prepare($sql);
$ql->execute(array(':a'=>$a1,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':pro'=>$profit,':type'=>$type,':type_q'=>$type_q,':date'=>$date));
header("location: sales.php?id=$c");


?>