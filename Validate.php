<?php
//session_start();
if(!isset($_SESSION["eid"])){
    header("Location: Login.html");
}
if($_SESSION["emp"]!="emp"){
    echo "Unauthorized Access";
    //exit();
}
include("Apply.php");
$name = $_POST["ename"];
$id = $_POST["eid"];
$beginDate = $_POST["dt"];
$nod = $_POST["count"];
$reason = $_POST["desc"];
if($name===""){
    echo("Name field empty");
    exit();
}
if($id===""){
    echo("ID Invalid");
    exit();
}
if($beginDate==="" || $beginDate<=date("Y-m-d",time())){
    $date = date("Y-m-d",time());
    echo("Invalid Date");
    exit();
}
if($nod<=0 || $nod===""){
    echo("Invalid Data");
    exit();
}
if($reason===""){
    echo("Reason not specified");
    exit();
}
try{
    $db = mysqli_connect("localhost","root","","Org");
    $table = "Employee";
    $query = "SELECT * from $table WHERE eid='$id'";
    $result=mysqli_query($db,$query);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $date = $row["dates"];
            $count = $row["count"];
            if(($count+$nod)>10){
                echo("Leave limit exhausted");
                exit();
            }
            $count = $count+$nod;
            $datestr="";
            if($date===" "){
                $datestr = $beginDate."+".$nod;
            }
            else{
                $datestr = $date.",".$beginDate."+".$nod; 
            }
            $stmt = "UPDATE $table SET dates='$datestr',count='$count' WHERE eid='$id'";
            $res = mysqli_query($db,$stmt);
            if($res){
                echo("Applied Successfully");
            }
            else{
                print_r($res);
                echo("Failure ".$stmt);
                exit();
            }

        }
    }
    mysqli_close($db);
}
catch(Exception $e){
    echo "Exception Caught: ".$e;
}

?>